<?php

namespace Src\Services;

use Src\Utils\Database;

abstract class BaseService {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
}
