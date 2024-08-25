<?php
namespace Src\Utils;

use Predis\Client;

$client = new Client();

return $client;

class Redis {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $config = require __DIR__ . '/../../config/redis.php';
        try {
            $this->connection = new Client(
                "tcp://{$config['host']}:{$config['port']}"
            );
        } catch (\Exception $e) {
            die($e);
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): Client {
        return $this->connection;
    }

    public static function get($key) {
        $client = self::getInstance();
        return $client->getConnection()->get($key);
    }

    public static function set($key, $value, $ttl = 0) {
        $client = self::getInstance();
        // if ttl set, we should set ttl in seconds
        if ($ttl > 0) {
            return $client->getConnection()->set($key, $value, "EX", $ttl);
        }

        // set with no ttl
        return $client->getConnection()->set($key, $value);
    }
}

