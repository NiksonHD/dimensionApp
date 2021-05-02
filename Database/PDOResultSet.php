<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Database;

/**
 * Description of PDOResultSet
 *
 * @author nikson
 */
class PDOResultSet implements ResultSetInterface {

    /**
     *
     * @var \PDOStatement
     */
    private $pdoStatement;

    public function __construct(\PDOStatement $pdoStatement) {
        $this->pdoStatement = $pdoStatement;
    }

    public function fetch($className): \Generator {
        while ($row = $this->pdoStatement->fetchObject($className)) {
            yield $row;
        }
    }
    
    

    public function fetchAssoc(): \Generator {
        while ($row = $this->pdoStatement->fetch(\PDO::FETCH_ASSOC)) {
            yield $row;
        }
    }

    public function fetchOne($className) {
                return $this->pdoStatement->fetchObject($className);

    }

    public function rowCount() {
        return $this->pdoStatement->rowCount();
    }

    public function fetchAssocExport() {
               return $this->pdoStatement->fetch(\PDO::FETCH_ASSOC);

    }

}
