<?php

namespace Basecamp;

/**
 * Class StorageSession.
 */
class StorageSession
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_id('AtHe3hAtuP');
            session_start();
        }

        // seed session with basecamp key if it isn't present
        if (!isset($_SESSION['basecamp'])) {
            $this->clear();
        }
    }

    /**
     * Get stored info (ETag).
     *
     * @param $hash
     *
     * @return mixed return ETag string, otherwise return false
     */
    public function get($hash)
    {
        if (isset($_SESSION['basecamp'][$hash])) {
            return $_SESSION['basecamp'][$hash];
        } else {
            return false;
        }
    }

    /**
     * Save info (ETag).
     *
     * @param $hash
     * @param $etag
     *
     * @return mixed
     */
    public function put($hash, $etag)
    {
        $_SESSION['basecamp'][$hash] = $etag;
    }

    /**
     * Delete info.
     *
     * @param $hash
     */
    public function delete($hash)
    {
        unset($_SESSION['basecamp'][$hash]);
    }

    /**
     * Delete all stored hashes.
     */
    public function clear()
    {
        $_SESSION['basecamp'] = [];
    }

    /**
     * Create hash.
     *
     * @param mixed
     *
     * @return string
     */
    public function createHash()
    {
        $data = '';
        $arg_list = func_get_args();
        foreach ($arg_list as $arg) {
            switch (gettype($arg)) {
                case 'array':
                    $data .= serialize($arg);
                    break;
                case 'array':
                    $data .= spl_object_hash($arg);
                    break;
                default:
                    $data .= serialize($arg);
                    break;
            }
        }

        return md5($data);
    }
}
