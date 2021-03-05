<?php

namespace PowerDistribution\Access;

use Doctrine\DBAL\DriverManager;

class Command {

    private $queryBuilder = null;

    public function __construct($conn) 
    {
        $this->queryBuilder = $conn->createQueryBuilder();
    }

    public function getQueryBuilder()
    {
        return $this->queryBuilder;
    }

    public function saveDrawing($table, $post, $row_name, $project_id=1, $graphic_data=1)
    {
        $this->queryBuilder = $this->queryBuilder->insert($table)
        ->values(
            array(
                'project_id' => '?',
                'graphic_id' => '?',
                'row_name' => '?',
                'data' => '?'
            )
        )
        ->setParameter(0, $project_id)
        ->setParameter(1, $graphic_data)
        ->setParameter(2, $row_name)
        ->setParameter(3, json_encode($post));

        $this->queryBuilder->execute();
    }

    public function saveParameters($table, $value, $row_name, $project_id=1, $graphic_data=1)
    {
        $this->queryBuilder = $this->queryBuilder->insert($table)
        ->values(
            array(
                'project_id' => '?',
                'graphic_id' => '?',
                'row_name' => '?',
                'data' => '?'
            )
        )
        ->setParameter(0, $project_id)
        ->setParameter(1, $graphic_data)
        ->setParameter(2, $row_name)
        ->setParameter(3, $value);

        $this->queryBuilder->execute();
    }

}