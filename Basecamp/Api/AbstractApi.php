<?php
namespace Basecamp\Api;

use Basecamp\Client;
use Buzz\Message\Request;

/**
 * Class AbstractApi.
 */
abstract class AbstractApi
{
    protected $client = null;
    private $timeout = 10;
    protected $page_size = 50;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    final protected function get($resource, array $params = [])
    {
        $resource = empty($params) ? $resource : ($resource . (false === strpos($resource, '?') ? '?' : '&') . http_build_query($params, '', '&'));
        $response = $this->client->request(Request::METHOD_GET, $resource, [], $this->timeout);

        // Fetch next pages
        $page = 2;
        $response_count = count($response);
        while ($response_count == $this->page_size) {
          $next_params = empty($params) ? ['page' => $page] : array_merge($params, ['page' => $page]);
          $next_resource = ($resource . (false === strpos($resource, '?') ? '?' : '&') . http_build_query($next_params, '', '&'));
          $next_response = $this->client->request(Request::METHOD_GET, $next_resource, [], $this->timeout);
          if (!empty($next_response)) {
            $response = array_merge($response, $next_response);
          }
          $response_count = count($next_response);
          $page++;
        }

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
