<?php

namespace Basecamp\Api;

/**
 * Messages API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/messages.md
 */
class Messages extends AbstractApi
{
    /**
     * Specified message.
     *
     * @param int $projectId
     * @param int $messageId
     *
     * @return object
     */
    public function show($projectId, $messageId)
    {
        $data = $this->get('/projects/'.$projectId.'/messages/'.$messageId.'.json');

        return $data;
    }

    /**
     * Create message.
     *
     * @param int   $projectId
     * @param array $params
     *
     * @return object
     */
    public function create($projectId, array $params)
    {
        $data = $this->post('/projects/'.$projectId.'/messages.json', $params);

        return $data;
    }

    /**
     * Update message.
     *
     * @param int   $projectId
     * @param int   $messageId
     * @param array $params
     *
     * @return object
     */
    public function update($projectId, $messageId, array $params)
    {
        $data = $this->put('/projects/'.$projectId.'/messages/'.$messageId.'.json', $params);

        return $data;
    }

    /**
     * Delete message.
     *
     * @param int $projectId
     * @param int $messageId
     *
     * @return object
     */
    public function remove($projectId, $messageId)
    {
        $data = $this->delete('/projects/'.$projectId.'/messages/'.$messageId.'.json');

        return $data;
    }
}
