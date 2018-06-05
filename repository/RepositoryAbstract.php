<?php

namespace App\Repository;

use App\Config\ConnectionDB;

abstract class RepositoryAbstract
{
    protected $pdo;

    /**
     * RepositoryAbstract constructor.
     */
    public function __construct()
    {
        require_once '../config/ConnectionDB.php';
        $config = ConnectionDB::getInstance();
        $this->pdo = $config->pdo;
    }

    public abstract function findById($id);
}