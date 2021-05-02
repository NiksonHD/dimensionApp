<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Database;

/**
 * Description of PDODatabase
 *
 * @author nikson
 */
class PDODatabase implements DatabaseInterface {

    /**
     *
     * @var \PDO
     */
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getErrorInfo(): array {
        
    }

    public function query(string $query): StatementInterface {
        $stmt = $this->pdo->prepare($query);
        return new PDOPraparedStatement($stmt);
    }

}
