<?php
namespace Basecamp\Api;

use Basecamp\Client;
use Buzz\Message\Request;

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

        $response = $this->client->request(Request::METHOD_GET, $resource, [], $this->timeout);

        return $response;
    }

    final protected function post($resource, array $params)
    {
        $response = $this->client->request(Request::METHOD_POST, $resource, $params, $this->timeout);

        return $response;
    }

    final protected function put($resource, array $params)
    {
        $response = $this->client->request(Request::METHOD_PUT, $resource, $params, $this->timeout);

        return $response;
    }

    final protected function delete($resource)
    {
        $response = $this->client->request(Request::METHOD_DELETE, $resource, [], $this->timeout);

        return $response;
    }

}
