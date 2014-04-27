<?php
namespace Basecamp\Api;

/**
 * Topics API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/topics.md
 */
class Topics extends AbstractApi
{
    /**
     * Get all topics.
     *
     * @param integer $page
     *
     * @return array
     */
    public function all($page = 1)
    {
        $data = $this->get('/topics.json', [
            'page' => $page,
        ]);

        return $data;
    }

    /**
     * Get project topics.
     *
     * @param integer $projectId
     * @param integer $page
     *
     * @return array
     */
    public function allByProject($projectId, $page = 1)
    {
        $data = $this->get('/projects/' . $projectId . '/topics.json', [
            'page' => $page,
        ]);

        return $data;
    }
}
