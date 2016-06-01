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
     * @param integer $projectId            
     * @param integer $todoId            
     *
     * @return object
     */
    public function show($projectId, $todoId, array $params = [])
    {
        $data = $this->get('/projects/' . $projectId . '/todos/' . $todoId . '.json', $params);
        
        return $data;
    }

    /**
     * All todos for a given project and todolist
     *
     * @param integer $projectId            
     * @param integer $todolistId            
     *
     * @return array
     */
    public function allByTodolist($projectId, $todolistId)
    {
        // /projects/1/todolists/1/todos
        $data = $this->get('/projects/' . $projectId . '/todolists/' . $todolistId . '/todos.json');
        
        return $data;
    }

    /**
     * Create todo.
     *
     * @param integer $projectId            
     * @param integer $todolistId            
     * @param array $params            
     *
     * @return object
     */
    public function create($projectId, $todolistId, array $params)
    {
        $data = $this->post('/projects/' . $projectId . '/todolists/' . $todolistId . '/todos.json', $params);
        
        return $data;
    }

    /**
     * Update todo.
     *
     * @param integer $projectId            
     * @param integer $todoId            
     * @param array $params            
     *
     * @return object
     */
    public function update($projectId, $todoId, array $params)
    {
        $data = $this->put('/projects/' . $projectId . '/todos/' . $todoId . '.json', $params);
        
        return $data;
    }

    /**
     * Delete todo.
     *
     * @param integer $projectId            
     * @param integer $todoId            
     *
     * @return object
     */
    public function remove($projectId, $todoId)
    {
        $data = $this->delete('/projects/' . $projectId . '/todos/' . $todoId . '.json');
        
        return $data;
    }
}
