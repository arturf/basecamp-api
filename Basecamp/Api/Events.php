<?php
namespace Basecamp\Api;

/**
 * Events API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/events.md
 */
class Events extends AbstractApi
{
    /**
     * Global events.
     *
     * @param string $since Date and time in "2012-03-24T11:00:00-06:00" format.
     * @param integer $page
     *
     * @return array
     */
    public function all($since, $page = 1)
    {
        $data = $this->get('/events.json', [
            'since' => $since,
            'page' => $page,
        ]);

        return $data;
    }

    /**
     * Project events.
     *
     * @param integer $projectId
     * @param string $since Date and time in "2012-03-24T11:00:00-06:00" format.
     * @param integer $page
     *
     * @return array
     */
    public function allByProject($projectId, $since, $page = 1)
    {
        $data = $this->get('/projects/' . $projectId . '/events.json', [
            'since' => $since,
            'page' => $page,
        ]);

        return $data;
    }

    /**
     * Person events.
     *
     * @param integer $userId
     * @param string $since Date and time in "2012-03-24T11:00:00-06:00" format.
     * @param integer $page
     *
     * @return array
     */
    public function allByPerson($userId, $since, $page = 1)
    {
        $data = $this->get('/people/' . $userId . '/events.json', [
            'since' => $since,
            'page' => $page,
        ]);

        return $data;
    }
}
