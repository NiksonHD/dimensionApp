<?php

namespace App\Repository\Person;

interface PersonRepositoryInterface {
    
    
public function findAll();

public function addPerson(\App\Data\PersonDTO $DTO);
 
public function findOne($personName);

public function delete(\App\Data\PersonDTO $DTO);

public function getLasrInsertId();

}
