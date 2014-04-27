<?php
namespace Basecamp\Api;

/**
 * CalendarsEvents API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/calendar_events.md
 */
class CalendarsEvents extends AbstractApi
{
    /**
     * Upcoming calendar events for the project.
     *
     * @param integer $projectId
     *
     * @return array
     */
    public function projectEvents($projectId)
    {
        $data = $this->get('/projects/' . $projectId . '/calendar_events.json');

        return $data;
    }

    /**
     * Past calendar events for the project.
     *
     * @param integer $projectId
     *
     * @return array
     */
    public function projectEventsPast($projectId)
    {
        $data = $this->get('/projects/' . $projectId . '/calendar_events/past.json');

        return $data;
    }

    /**
     * Specified project event.
     *
     * @param integer $projectId
     * @param integer $eventId
     *
     * @return object
     */
    public function projectEvent($projectId, $eventId)
    {
        $data = $this->get('/projects/' . $projectId . '/calendar_events/' . $eventId . '.json');

        return $data;
    }

    /**
     * New calendar event for a project.
     *
     * @param integer $projectId
     * @param array $params
     *
     * @return object
     */
    public function projectEventCreate($projectId, array $params)
    {
        $data = $this->post('/projects/' . $projectId . '/calendar_events.json', $params);

        return $data;
    }

    /**
     * Update the specific calendar event on a project.
     *
     * @param integer $projectId
     * @param integer $eventId
     * @param array $params
     *
     * @return object
     */
    public function projectEventUpdate($projectId, $eventId, array $params)
    {
        $data = $this->put('/projects/' . $projectId . '/calendar_events/' . $eventId . '.json', $params);

        return $data;
    }

    /**
     * Delete the project event.
     *
     * @param integer $projectId
     * @param integer $eventId
     *
     * @return object
     */
    public function projectEventDelete($projectId, $eventId)
    {
        $data = $this->delete('/projects/' . $projectId . '/calendar_events/' . $eventId . '.json');

        return $data;
    }

    /**
     * Upcoming calendar events for the calendar.
     *
     * @param integer $calendarId
     *
     * @return array
     */
    public function calendarEvents($calendarId)
    {
        $data = $this->get('/calendars/' . $calendarId . '/calendar_events.json');

        return $data;
    }

    /**
     * Past calendar events for the calendar.
     *
     * @param integer $calendarId
     *
     * @return array
     */
    public function calendarEventsPast($calendarId)
    {
        $data = $this->get('/calendars/' . $calendarId . '/calendar_events/past.json');

        return $data;
    }

    /**
     * Specified calendar event.
     *
     * @param integer $calendarId
     * @param integer $eventId
     *
     * @return object
     */
    public function calendarEvent($calendarId, $eventId)
    {
        $data = $this->get('/calendars/' . $calendarId . '/calendar_events/' . $eventId . '.json');

        return $data;
    }

    /**
     * New calendar event for a calendar.
     *
     * @param integer $calendarId
     * @param array $params
     *
     * @return object
     */
    public function calendarEventCreate($calendarId, array $params)
    {
        $data = $this->post('/calendars/' . $calendarId . '/calendar_events.json', $params);

        return $data;
    }

    /**
     * Update the specific calendar event on a calendar.
     *
     * @param integer $calendarId
     * @param integer $eventId
     * @param array $params
     *
     * @return object
     */
    public function calendarEventUpdate($calendarId, $eventId, array $params)
    {
        $data = $this->put('/calendars/' . $calendarId . '/calendar_events/' . $eventId . '.json', $params);

        return $data;
    }

    /**
     * Delete the calendar event.
     *
     * @param integer $calendarId
     * @param integer $eventId
     *
     * @return object
     */
    public function calendarEventDelete($calendarId, $eventId)
    {
        $data = $this->delete('/calendars/' . $calendarId . '/calendar_events/' . $eventId . '.json');

        return $data;
    }
}
