<?php

namespace Database;

/**
 *
 * @author nikson
 */
interface DatabaseInterface {
    
    public function query(string $query): StatementInterface;
    
    public function getErrorInfo(): array;

    
}