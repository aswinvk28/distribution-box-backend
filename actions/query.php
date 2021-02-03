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

    public function selectAllFromCartesian()
    {
        $this->queryBuilder = $this->queryBuilder->select('*')->from('cartesian');
        return $this->queryBuilder->execute()->fetchAll();
    }

    public function selectAllFromTemplatedInputs($rowName = '')
    {
        $this->queryBuilder = $this->queryBuilder->select('*')->from('templated_inputs')
        ->where("ti.row_name = '{$rowName}'");
        return $this->queryBuilder->execute()->fetchAll();
    }

    public function selectAllFromTemplatedOutputs($rowName = '')
    {
        $this->queryBuilder = $this->queryBuilder->select('*')->from('templated_outputs')
        ->where("to.row_name = '{$rowName}'");
        return $this->queryBuilder->execute()->fetchAll();
    }

    public function selectAllFromTemplatedAddons($rowName = '')
    {
        $this->queryBuilder = $this->queryBuilder->select('*')->from('templated_addons', ta)
        ->where("ta.row_name = '{$rowName}'");
        return $this->queryBuilder->execute()->fetchAll();
    }

}