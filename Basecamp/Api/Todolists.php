<?php
namespace Basecamp\Api;

/**
 * Todolists API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/todolists.md
 */
class Todolists extends AbstractApi
{
    /**
     * Active todolists for all projects.
     *
     * @return array
     */
    public function all()
    {
        $data = $this->get('/todolists.json');

        return $data;
    }

    /**
     * Completed todolists for all projects.
     *
     * @return array
     */
    public function completed()
    {
        $data = $this->get('/todolists/completed.json');

        return $data;
    }

    /**
     * Active todolists for project.
     *
     * @param integer $projectId
     *
     * @return array
     */
    public function allByProject($projectId)
    {
        $data = $this->get('/projects/' . $projectId . '/todolists.json');

        return $data;
    }

    /**
     * Completed todolists for this project.
     *
     * @param integer $projectId
     *
     * @return array
     */
    public function completedByProject($projectId)
    {
        $data = $this->get('/projects/' . $projectId . '/todolists/completed.json');

        return $data;
    }

    /**
     * Get todolist.
     *
     * @param integer $projectId
     * @param integer $todolistId
     *
     * @return object
     */
    public function show($projectId, $todolistId)
    {
        $data = $this->get('/projects/' . $projectId . '/todolists/' . $todolistId . '.json');

        return $data;
    }

    /**
     * All todolists with todos assigned to the specified person.
     *
     * @param integer $userId
     *
     * @return array
     */
    public function assigned($userId)
    {
        $data = $this->get('/people/' . $userId . '/assigned_todos.json');

        return $data;
    }

    /**
     * Create todolist.
     *
     * @param integer $projectId
     * @param array $params
     *
     * @return object
     */
    public function create($projectId, array $params)
    {
        $data = $this->post('/projects/' . $projectId . '/todolists.json', $params);

        return $data;
    }

    /**
     * Update todolist.
     *
     * @param integer $projectId
     * @param integer $todolistId
     * @param array $params
     *
     * @return object
     */
    public function update($projectId, $todolistId, array $params)
    {
        $data = $this->put('/projects/' . $projectId . '/todolists/' . $todolistId . '.json', $params);

        return $data;
    }

    /**
     * Delete todolist.
     *
     * @param integer $projectId
     * @param integer $todolistId
     *
     * @return object
     */
    public function remove($projectId, $todolistId)
    {
        $data = $this->delete('/projects/' . $projectId . '/todolists/' . $todolistId . '.json');

        return $data;
    }
}
