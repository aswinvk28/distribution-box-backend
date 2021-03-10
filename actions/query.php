<?php

namespace PowerDistribution\Access;

class Query {

    private $queryBuilder = null;
    
    public function __construct($conn) 
    {
        $this->queryBuilder = $conn->createQueryBuilder();
    }

    public function getQueryBuilder()
    {
        return $this->queryBuilder;
    }

    public function selectAllFrom($table_name='templated')
    {
        $this->queryBuilder = $this->queryBuilder->select('*')->from($table_name);
        return $this->queryBuilder->execute()->fetchAll();
    }

    public function selectAllFromTemplated($rowName = '')
    {
        $this->queryBuilder = $this->queryBuilder->select('*')->from('templated', 'ti')
        ->where("ti.row_name = '{$rowName}'");
        return $this->queryBuilder->execute()->fetchAll();
    }

    public function selectAllFromCartesian($rowName = '')
    {
        $this->queryBuilder = $this->queryBuilder->select('*')->from('cartesian', 'ca')
        ->where("ca.row_name = '{$rowName}'");
        return $this->queryBuilder->execute()->fetchAll();
    }

}