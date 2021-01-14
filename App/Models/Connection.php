<?php 
namespace App\Models;

class Connection
{
    private $connection;
    private static $instance = null;

    private function __construct()
    {
        $dsn = "mysql:dbname={$_ENV['DB_NAME}; host={$_ENV['DB_HOST'] }";
        try{
        } catch (PDOException $e) {
            echo 'Fallo la conexion : '. $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new Connection;
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return self::getInstance()->connection;
    }
}