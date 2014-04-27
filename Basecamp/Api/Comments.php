<?php
namespace Basecamp\Api;

/**
 * Comments API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/comments.md
 */
class Comments extends AbstractApi
{
    /**
     * New comment for message.
     *
     * @param integer $projectId
     * @param integer $messageId
     * @param array $params
     *
     * @return object
     */
    public function createMessageComment($projectId, $messageId, array $params)
    {
        $data = $this->post('/projects/' . $projectId . '/messages/' . $messageId . '/comments.json', $params);

        return $data;
    }

    /**
     * New comment for todos.
     *
     * @param integer $projectId
     * @param integer $messageId
     * @param array $params
     *
     * @return object
     */
    public function createTodoComment($projectId, $messageId, array $params)
    {
        $data = $this->post('/projects/' . $projectId . '/todos/' . $messageId . '/comments.json', $params);

        return $data;
    }

    /**
     * Delete the comment.
     *
     * @param integer $projectId
     * @param integer $commentId
     *
     * @return object
     */
    public function remove($projectId, $commentId)
    {
        $data = $this->delete('/projects/' . $projectId . '/comments/' . $commentId . '.json');

        return $data;
    }
}
