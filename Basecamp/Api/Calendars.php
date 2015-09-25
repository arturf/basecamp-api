<?php

namespace Basecamp\Api;

/**
 * Calendars API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/calendars.md
 */
class Calendars extends AbstractApi
{
    /**
     * Get calendars.
     *
     * @return array
     */
    public function all()
    {
        $data = $this->get('/calendars.json');

        return $data;
    }

    /**
     * Get calendar.
     *
     * @param int $calendarId
     *
     * @return object
     */
    public function show($calendarId)
    {
        $data = $this->get('/calendars/'.$calendarId.'.json');

        return $data;
    }

    /**
     * Create calendar.
     *
     * @param array $params
     *
     * @return object
     */
    public function create(array $params)
    {
        $data = $this->post('/calendars.json', $params);

        return $data;
    }

    /**
     * Update calendar.
     *
     * @param int   $calendarId
     * @param array $params
     *
     * @return object
     */
    public function update($calendarId, array $params)
    {
        $data = $this->put('/calendars/'.$calendarId.'.json', $params);

        return $data;
    }

    /**
     * Delete calendar.
     *
     * @param int $calendarId
     *
     * @return object
     */
    public function remove($calendarId)
    {
        $data = $this->delete('/calendars/'.$calendarId.'.json');

        return $data;
    }
}
