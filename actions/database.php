<?php

namespace PowerDistribution\Access;

class Database 
{
    private static $conn;
    public $config;
    
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

        static::$config = parse_ini_file(dirname(__FILE__) . '../site.ini');
    }

    public function getConfig() 
    {
        return static::$config;
    }

    public static function getConnection()
    {
        return static::$conn;
    }
}