<?php

/*
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

namespace Database;

/**
 *
 * @author nikson
 */
interface StatementInterface {
    
    
public function execute(array $params = []): ResultSetInterface;
    
    
    
}
