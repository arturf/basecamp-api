<?php
namespace Basecamp\Api;

/**
 * People API.
 *
 * @link https://github.com/basecamp/bcx-api/blob/master/sections/people.md
 */
class People extends AbstractApi
{
    /**
     * All people on the account.
     *
     * @return array
     */
    public function all()
    {
        $data = $this->get('/people.json');

        return $data;
    }

    /**
     * Get person.
     *
     * @param integer $userId
     *
     * @return object
     */
    public function show($userId)
    {
        $data = $this->get('/people/' . $userId . '.json');

        return $data;
    }

    /**
     * Delete person.
     *
     * @param integer $userId
     *
     * @return object
     */
    public function remove($userId)
    {
        $data = $this->delete('/people/' . $userId . '.json');

        return $data;
    }
}
