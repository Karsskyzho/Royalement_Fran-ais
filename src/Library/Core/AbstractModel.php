<?php

namespace Library\Core;

use Library\Database\Connection;

abstract class AbstractModel {
    protected Connection $db;

    public function __construct()
    {
        $config = require 'config/database.php';
        $this->db = new Connection($config);
    }
}