<?php
/**
 * Created by PhpStorm.
 * User: Cougar
 * Date: 07.01.2018
 * Time: 11:55
 */

namespace App\Config;

use PDO;
use PDOException;

class ConnectionDB
{
    private static $instance;
    public $pdo;

    /**
     * @return ConnectionDB
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Singleton constructor.
     */
    private function __construct()
    {
        $config = (require_once('../config/config.php'))['db'];
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $config['login'], $config['pass'], $opt);
        } catch (PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}