<?php

namespace Basecamp\Api;

/**
 * Todos API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/todos.md
 */
class Todos extends AbstractApi
{
    /**
     * Get todo.
     *
     * @param int $projectId
     * @param int $todoId
     *
     * @return object
     */
    public function show($projectId, $todoId)
    {
        $data = $this->get('/projects/'.$projectId.'/todos/'.$todoId.'.json');

        return $data;
    }

    /**
     * Create todo.
     *
     * @param int   $projectId
     * @param int   $todolistId
     * @param array $params
     *
     * @return object
     */
    public function create($projectId, $todolistId, array $params)
    {
        $data = $this->post('/projects/'.$projectId.'/todolists/'.$todolistId.'/todos.json', $params);

        return $data;
    }

    /**
     * Update todo.
     *
     * @param int   $projectId
     * @param int   $todoId
     * @param array $params
     *
     * @return object
     */
    public function update($projectId, $todoId, array $params)
    {
        $data = $this->put('/projects/'.$projectId.'/todos/'.$todoId.'.json', $params);

        return $data;
    }

    /**
     * Delete todo.
     *
     * @param int $projectId
     * @param int $todoId
     *
     * @return object
     */
    public function remove($projectId, $todoId)
    {
        $data = $this->delete('/projects/'.$projectId.'/todos/'.$todoId.'.json');

        return $data;
    }
}
