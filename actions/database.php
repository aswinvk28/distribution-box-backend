<?php

namespace PowerDistribution\Access;

class Database 
{
    private static $conn;
    public static $config;
    private static $database;
    
    public function __construct()
    {
        $connectionParams = array(
            'path' => '/home/project/database/power_distribution_box.db',
            'user' => 'admin',
            'password' => 'admin',
            'host' => 'localhost',
            'driver' => 'pdo_sqlite',
            'memory' => FALSE
        );
        
        static::$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

        static::$config = parse_ini_file(PAGE_ROOT . '/site.ini');
    }

    public function getConfig() 
    {
        return static::$config;
    }

    public static function getConnection()
    {
        return static::$conn;
    }

    public static function createInstance()
    {
        static::$database = new Database();
    }

    public static function getInstance()
    {
        return static::$database;
    }
}