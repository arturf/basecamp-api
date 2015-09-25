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
     * @param int $projectId
     * @param int $uploadId
     *
     * @return object
     */
    public function show($projectId, $uploadId)
    {
        $data = $this->get('/projects/'.$projectId.'/uploads/'.$uploadId.'.json');

        return $data;
    }

    /**
     * Create uploads.
     *
     * @param int   $projectId
     * @param array $params
     *
     * @return object
     */
    public function create($projectId, array $params)
    {
        $data = $this->post('/projects/'.$projectId.'/uploads.json', $params);

        return $data;
    }
}
