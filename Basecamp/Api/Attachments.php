<?php
namespace Basecamp\Api;

/**
 * Attachments API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/attachments.md
 */
class Attachments extends AbstractApi
{
    /**
     * Get attachments.
     *
     * @return array
     */
    public function all()
    {
        $data = $this->get('/attachments.json');

        return $data;
    }

    /**
     * Get project's attachments.
     *
     * @param integer $projectId
     *
     * @return array
     */
    public function projectAll($projectId)
    {
        $data = $this->get('/projects/' . $projectId . '/attachments.json');

        return $data;
    }

    /**
     * Get attachment.
     *
     * @param integer $projectId
     * @param integer $attachmentId
     *
     * @return object
     */
    public function show($projectId, $attachmentId)
    {
        $data = $this->get('GET /projects/' . $projectId . '/attachments/' . $attachmentId . '.json');

        return $data;
    }

    /**
     * Create attachment.
     *
     * @param string $binary
     *
     * @return object
     */
    public function create($binary)
    {
        $data = $this->post('/attachments.json', ['binary' => $binary]);

        return $data;
    }
}
