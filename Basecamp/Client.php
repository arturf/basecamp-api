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

/**
 * Class Client.
 */
class Client
{
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
}
