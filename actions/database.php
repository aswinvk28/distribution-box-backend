<?php

$connectionParams = array(
    'path' => '/home/project/database/power_distribution_box.db',
    'user' => 'admin',
    'password' => 'admin',
    'host' => 'localhost',
	'driver' => 'pdo_sqlite',
	'memory' => FALSE
);

$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);
