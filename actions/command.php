<?php

namespace PowerDistribution\Access;

use Doctrine\DBAL\DriverManager;

class Command {

    private $queryBuilder = null;

    public function __construct( $conn) 
    {
        $this->queryBuilder = $conn->createQueryBuilder();
    }

    public function getQueryBuilder()
    {
        return $this->queryBuilder;
    }

    public function saveDrawing($table, $post, $project_id=1, $graphic_data=1)
    {
        $this->queryBuilder = $this->queryBuilder->insert($table)
        ->values(
            array(
                'project_id' => '?',
                'graphic_id' => '?',
                'data' => '?'
            )
        )
        ->setParameter(0, $project_id)
        ->setParameter(1, $graphic_data)
        ->setParameter(2, json_encode($post));

        $this->queryBuilder->execute();
    }

}