<?php

namespace Basecamp;

/**
 * Class Storage.
 */
class Storage
{
    /**
     * Factory for storage classes.
     *
     * @param $storage
     *
     * @return $mixed
     */
    public static function get($storage = 'session')
    {
        return new StorageSession();
    }
}
