<?php

namespace App\Service\Person;


interface PersonServiceInterface {
    
    public function getAll();
    
    public function insertPerson(\App\Data\PersonDTO $DTO);
    
        public function deletePerson(\App\Data\PersonDTO $DTO);

}
