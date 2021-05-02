<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Database;

/**
 *
 * @author nikson
 */
interface ResultSetInterface {
    
public function fetch($className): \Generator;

public function fetchAssoc(): \Generator;

public function fetchOne($className);

public function rowCount();

public function fetchAssocExport();

    
}
