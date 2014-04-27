<?php
namespace Basecamp\Api;

/**
 * Stars API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/stars.md
 */
class Stars extends AbstractApi
{
    /**
     * List all stars.
     *
     * @return array
     */
    public function all()
    {
        $data = $this->get('/stars.json');

        return $data;
    }

    /**
     * Star a project.
     *
     * @param integer $projectId
     *
     * @return object
     */
    public function star($projectId)
    {
        $data = $this->post('/projects/' . $projectId . '/star.json', []);

        return $data;
    }

    /**
     * Unstar a project.
     *
     * @param integer $projectId
     *
     * @return object
     */
    public function unstar($projectId)
    {
        $data = $this->delete('/projects/' . $projectId . '/star.json');

        return $data;
    }
}
