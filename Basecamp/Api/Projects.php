<?php
namespace Basecamp\Api;

/**
 * Projects API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/projects.md
 */
class Projects extends AbstractApi
{
    /**
     * All active projects.
     *
     * @return array
     */
    public function active()
    {
        $data = $this->get('/projects.json');

        return $data;
    }

    /**
     * All archived projects.
     *
     * @return array
     */
    public function archived()
    {
        $data = $this->get('/projects/archived.json');

        return $data;
    }

    /**
     * Get project.
     *
     * @param integer $projectId
     *
     * @return object
     */
    public function show($projectId)
    {
        $data = $this->get('/projects/' . $projectId . '.json');

        return $data;
    }

    /**
     * Create project.
     *
     * @param array $params
     *
     * @return object
     */
    public function create(array $params)
    {
        $data = $this->post('/projects.json', $params);

        return $data;
    }

    /**
     * Update project.
     *
     * @param integer $projectId
     * @param array $params
     *
     * @return object
     */
    public function update($projectId, array $params)
    {
        $data = $this->put('/projects/' . $projectId . '.json', $params);

        return $data;
    }

    /**
     * Delete project.
     *
     * @param integer $projectId
     *
     * @return object
     */
    public function remove($projectId)
    {
        $data = $this->delete('/projects/' . $projectId . '.json');

        return $data;
    }
}
