<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Database;

/**
 * Description of PDOPraparedStatement
 *
 * @author nikson
 */
class PDOPraparedStatement implements StatementInterface {

    /**
     * @var \PDOStatement
     */
    private $pdoStatement;

    public function __construct(\PDOStatement $pdoStatement) {
        $this->pdoStatement = $pdoStatement;
    }

    public function execute(array $params = array()): ResultSetInterface {
        $this->pdoStatement->execute($params);
        return new PDOResultSet($this->pdoStatement);
    }

}
