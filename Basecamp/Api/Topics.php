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
     * @param int $page
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
     * @param int $projectId
     * @param int $page
     *
     * @return array
     */
    public function allByProject($projectId, $page = 1)
    {
        $data = $this->get('/projects/'.$projectId.'/topics.json', [
            'page' => $page,
        ]);

        return $data;
    }

    /**
     * @param int $projectId
     * @param int $topicId
     *
     * @return array
     */
    public function archive($projectId, $topicId)
    {
        $data = $this->put(sprintf('/projects/%d/topics/%d/archive.json', $projectId, $topicId), []);

        return $data;
    }

    /**
     * @param int $projectId
     * @param int $topicId
     *
     * @return array
     */
    public function activate($projectId, $topicId)
    {
        $data = $this->put(sprintf('/projects/%d/topics/%d/activate.json', $projectId, $topicId), []);

        return $data;
    }
}
