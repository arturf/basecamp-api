<?php
namespace Basecamp\Api;

/**
 * Uploads API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/uploads.md
 */
class Uploads extends AbstractApi
{
    /**
     * Get upload.
     *
     * @param integer $projectId
     * @param integer $uploadId
     *
     * @return object
     */
    public function show($projectId, $uploadId)
    {
        $data = $this->get('/projects/' . $projectId . '/uploads/' . $uploadId . '.json');

        return $data;
    }

    /**
     * Create uploads.
     *
     * @param integer $projectId
     * @param array $params
     *
     * @return object
     */
    public function create($projectId, array $params)
    {
        $data = $this->post('/projects/' . $projectId . '/uploads.json', $params);

        return $data;
    }
}
