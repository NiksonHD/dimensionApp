<?php

namespace App\Data;

class FiscalDTO {

    private const BON_MIN_LENGTH = 1;
    private const BON_MAX_LENGTH = 13;
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
    private $bonNumber;
    /**
     * 
     * @var string
     */
    private $person;
    /**
     * 
     * @var int
     */
    private $personId;
    public function getPersonId(): ?int {
        return $this->personId;
    }

    public function setPersonId(int $personId): FiscalDTO{
        $this->personId = $personId;
        return $this;
    }

        private $updateDate;
    public function getId(): string {
        return $this->id;
    }

    public function getBonNumber() {
        return $this->bonNumber;
    }

    public function getPerson(): ?string{
        return $this->person;
    }

    public function getUpdateDate() {
        return $this->updateDate;
    }

    public function setId(string $id): FiscalDTO {
        $this->id = $id;
        return $this;
    }

    public function setBonNumber(string $bonNumber): FiscalDTO {
        DTOvalidator::validate(self::BON_MIN_LENGTH, self::BON_MAX_LENGTH, 'text', $bonNumber, "въвеждане");
        $this->bonNumber = $bonNumber;
        return $this;
    }

    public function setPerson($person): FiscalDTO {
        $this->person = $person;
        return $this;
    }

    public function setUpdateDate($updateDate){
        $this->updateDate = $updateDate;
        return $this;
    }

}
