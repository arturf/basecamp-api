<?php
namespace Basecamp\Api;

/**
 * Documents API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/documents.md
 */
class Documents extends AbstractApi
{
    /**
     * Shows documents for all projects.
     *
     * @return array
     */
    public function all()
    {
        $data = $this->get('/documents.json');

        return $data;
    }

    /**
     * Shows documents for specified project.
     *
     * @param integer $projectId
     *
     * @return array
     */
    public function allByProject($projectId)
    {
        $data = $this->get('/projects/' . $projectId . '/documents.json');

        return $data;
    }

    /**
     * Specified document.
     *
     * @param integer $projectId
     * @param integer $docId
     *
     * @return object
     */
    public function show($projectId, $docId)
    {
        $data = $this->get('/projects/' . $projectId . '/documents/' . $docId . '.json');

        return $data;
    }

    /**
     * Create a new document.
     *
     * @param integer $projectId
     * @param array $params
     *
     * @return object
     */
    public function create($projectId, array $params)
    {
        $data = $this->post('/projects/' . $projectId . '/documents.json', $params);

        return $data;
    }

    /**
     * Update document.
     *
     * @param integer $projectId
     * @param integer $docId
     * @param array $params
     *
     * @return object
     */
    public function update($projectId, $docId, array $params)
    {
        $data = $this->put('/projects/' . $projectId . '/documents/' . $docId . '.json', $params);

        return $data;
    }

    /**
     * Remove document.
     *
     * @param integer $projectId
     * @param integer $docId
     *
     * @return object
     */
    public function remove($projectId, $docId)
    {
        $data = $this->delete('/projects/' . $projectId . '/documents/' . $docId . '.json');

        return $data;
    }
}
