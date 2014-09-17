<?php
namespace Basecamp\Api;

use Basecamp\Client;
use Buzz\Client\Curl;
use Buzz\Message\Request;
use Buzz\Message\Response;

/**
 * Class AbstractApi.
 */
abstract class AbstractApi
{
    const BASE_URL = 'https://basecamp.com/';
    const API_VERSION = '/api/v1';

    protected $client = null;
    private $timeout = 10;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    final protected function get($resource, array $params = [])
    {
        $resource = empty($params) ? $resource : ($resource . (false === strpos($resource, '?') ? '?' : '&') . http_build_query($params, '', '&'));

        $response = $this->request(Request::METHOD_GET, $resource);

        return $response;
    }

    final protected function post($resource, array $params)
    {
        $response = $this->request(Request::METHOD_POST, $resource, $params);

        return $response;
    }

    final protected function put($resource, array $params)
    {
        $response = $this->request(Request::METHOD_PUT, $resource, $params);

        return $response;
    }

    final protected function delete($resource)
    {
        $response = $this->request(Request::METHOD_DELETE, $resource);

        return $response;
    }

    private function request($method, $resource, $params = [])
    {
        $message = new Request($method, $resource, self::BASE_URL . $this->client->getAccountData()['accountId'] . self::API_VERSION);
        $message->setHeaders([
            'User-Agent: ' . $this->client->getAccountData()['appName'],
            'Content-Type: application/json',
        ]);

        if (!empty($params)) {
            // When attaching files set content as is
            if (array_key_exists('binary', $params)) {
                $message->setContent($params['binary']);
            } else {
                $message->setContent(json_encode($params));
            }
        }

        $response = new Response();

        $bc = new Curl();
        $bc->setTimeout($this->timeout);

        if (!empty($this->client->getAccountData()['login']) && !empty($this->client->getAccountData()['password'])) {
            $bc->setOption(CURLOPT_USERPWD, $this->client->getAccountData()['login'] . ':' . $this->client->getAccountData()['password']);
        } elseif (!empty($this->client->getAccountData()['token'])) {
            $message->addHeader('Authorization: Bearer ' . $this->client->getAccountData()['token']);
        }

        $bc->send($message, $response);
        $data = new \stdClass();

        switch ($response->getStatusCode()) {
            case 201:
                $data = json_decode($response->getContent());
                $data->message = 'Created';
                break;
            case 204:
                $data->message = 'Resource succesfully deleted';
                break;
            case 304:
                $data->message = '304 Not Modified';
                break;
            case 400:
                $data->message = '400 Bad Request';
                break;
            case 403:
                $data->message = '403 Forbidden';
                break;
            case 404:
                $data->message = '404 Not Found';
                break;
            case 415:
                $data->message = '415 Unsupported Media Type';
                break;
            case 429:
                $data->message = '429 Too Many Requests. ' . $response->getHeader('Retry-After');
                break;
            case 500:
                $data->message = '500 Hmm, that isn’t right';
                break;
            case 502:
                $data->message = '502 Bad Gateway';
                break;
            case 503:
                $data->message = '503 Service Unavailable';
                break;
            case 504:
                $data->message = '504 Gateway Timeout';
                break;
            default:
                $data = json_decode($response->getContent());
                break;
        }

        return $data;
    }
}
