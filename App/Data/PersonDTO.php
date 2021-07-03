<?php

namespace App\Data;

class PersonDTO{

    private const PERSON_MIN_LENGTH = 1;
    private const PERSON_MAX_LENGTH = 13;
    private const EAN_MAX_LENGTH = 13;
    private const EAN_MIN_LENGTH = 6;

    
    /**
     * 
     * @var string
     */
    private $id;

    /**
     * 
     * @var string
     */
    private $personName;
    
    public function getId(): string {
        return $this->id;
    }

    public function getPersonName(): string {
        return $this->personName;
    }

    public function setId(string $id) {
        $this->id = $id;
        return $this;
    }

    public function setPersonName(string $personName){
        DTOvalidator::validate(self::PERSON_MIN_LENGTH, self::PERSON_MAX_LENGTH, "text", $personName, 'Заглавие');
        $this->personName = $personName;
        return $this;
    }


}
