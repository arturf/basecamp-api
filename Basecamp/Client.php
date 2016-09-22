<?php

namespace Basecamp;

use Basecamp\Api\Accesses;
use Basecamp\Api\Attachments;
use Basecamp\Api\Calendars;
use Basecamp\Api\CalendarsEvents;
use Basecamp\Api\Comments;
use Basecamp\Api\Documents;
use Basecamp\Api\Events;
use Basecamp\Api\Messages;
use Basecamp\Api\People;
use Basecamp\Api\Projects;
use Basecamp\Api\Stars;
use Basecamp\Api\Todolists;
use Basecamp\Api\Todos;
use Basecamp\Api\Topics;
use Basecamp\Api\Uploads;
use Buzz\Client\Curl;
use Buzz\Message\Request;
use Buzz\Message\Response;

/**
 * Class Client.
 */
class Client
{
    const BASE_URL = 'https://basecamp.com/';
    const API_VERSION = '/api/v1';

    /**
     * Account data.
     *
     * @var array
     */
    private $accountData = null;

    /**
     * Class constructor.
     *
     * @param array $accountData Assotiative array
     *                           <code>
     *                           [
     *                           'accountId' => '', // Basecamp account ID
     *                           'appName' =>  '', // Application name (used as User-Agent header)
     *                           'token' =>    '', // OAuth token
     *                           'login' =>    '', // 37Signal's account login
     *                           'password' => '', // 37Signal's account password
     *                           ]
     *                           </code>
     */
    public function __construct(array $accountData)
    {
        $this->accountData = $accountData;
    }

    /**
     * Set access token.
     *
     * @param $value
     *
     * @return $this
     */
    public function setToken($value)
    {
        $this->accountData['token'] = $value;

        return $this;
    }

    /**
     * Create Curl client object.
     *
     * Override to use Buzz extensions, for example CachedCurl
     */
    public function createCurl()
    {
        return new Curl();
    }

    /**
     * Account data.
     *
     * @return array
     */
    public function getAccountData()
    {
        return $this->accountData;
    }

    /**
     * Accesses instance.
     *
     * @return Accesses
     */
    public function accesses()
    {
        return new Accesses($this);
    }

    /**
     * Attachments instance.
     *
     * @return Attachments
     */
    public function attachments()
    {
        return new Attachments($this);
    }

    /**
     * CalendarsEvents instance.
     *
     * @return CalendarsEvents
     */
    public function calendarsEvents()
    {
        return new CalendarsEvents($this);
    }

    /**
     * Calendars instance.
     *
     * @return Calendars
     */
    public function calendars()
    {
        return new Calendars($this);
    }

    /**
     * Comments instance.
     *
     * @return Comments
     */
    public function comments()
    {
        return new Comments($this);
    }

    /**
     * Documents instance.
     *
     * @return Documents
     */
    public function documents()
    {
        return new Documents($this);
    }

    /**
     * Events instance.
     *
     * @return Events
     */
    public function events()
    {
        return new Events($this);
    }

    /**
     * Messages instance.
     *
     * @return Messages
     */
    public function messages()
    {
        return new Messages($this);
    }

    /**
     * People instance.
     *
     * @return People
     */
    public function people()
    {
        return new People($this);
    }

    /**
     * Projects instance.
     *
     * @return Projects
     */
    public function projects()
    {
        return new Projects($this);
    }

    /**
     * Stars instance.
     *
     * @return Stars
     */
    public function stars()
    {
        return new Stars($this);
    }

    /**
     * Todolists instance.
     *
     * @return Todolists
     */
    public function todolists()
    {
        return new Todolists($this);
    }

    /**
     * Todos instance.
     *
     * @return Todos
     */
    public function todos()
    {
        return new Todos($this);
    }

    /**
     * Topics instance.
     *
     * @return Topics
     */
    public function topics()
    {
        return new Topics($this);
    }

    /**
     * Uploads instance.
     *
     * @return Uploads
     */
    public function uploads()
    {
        return new Uploads($this);
    }

    /**
     * clear the saved cache stored in session
     * useful when a user wants to get a full list of entries regardless of what was previously requested
     */
    public function clearCache()
    {
        $storage = Storage::get();
        $storage->clear();
    }

    /**
     * Make HTTP Request.
     *
     * @return mixed[]
     */
    public function request($method, $resource, $params = [], $timeout = 10)
    {
        $headers = [
            'User-Agent: ' . $this->getAccountData()['appName'],
            'Content-Type: application/json',
        ];

        $storage = Storage::get();
        $hash = $storage->createHash($method, $resource, $params);
        $etag = $storage->get($hash);

        if ($etag) {
            $headers[] = 'If-None-Match: ' . $etag;
        }

        $message = new Request($method, $resource, self::BASE_URL . $this->getAccountData()['accountId'] . self::API_VERSION);
        $message->setHeaders($headers);

        if (!empty($params)) {
            // When attaching files set content as is
            if (array_key_exists('binary', $params)) {
                $message->setContent($params['binary']);
            } else {
                $message->setContent(json_encode($params));
            }
        }

        $response = new Response();

        $bc = $this->createCurl();
        $bc->setTimeout($timeout);

        if (!empty($this->getAccountData()['login']) && !empty($this->getAccountData()['password'])) {
            $bc->setOption(CURLOPT_USERPWD, $this->getAccountData()['login'] . ':' . $this->getAccountData()['password']);
        } elseif (!empty($this->getAccountData()['token'])) {
            $message->addHeader('Authorization: Bearer ' . $this->getAccountData()['token']);
        }

        $bc->send($message, $response);

        $storage->put($hash, trim($response->getHeader('ETag'), '"'));

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
                $data->message = '500 Hmm, that isn�t right';
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
