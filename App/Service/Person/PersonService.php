<?php

namespace App\Service\Person;

use App\Repository\Person\PersonRepositoryInterface;

class PersonService implements PersonServiceInterface {

    /**
     * 
     * @var PersonRepositoryInterface
     */
    private $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository) {
        $this->personRepository = $personRepository;
    }

    public function getAll() {
        return $this->personRepository->findAll();
    }

    public function insertPerson(\App\Data\PersonDTO $DTO) {
        $person = $this->personRepository->findOne($DTO->getPersonName());
        if (!$person) {
            return $this->personRepository->addPerson($DTO);
        } else {
            throw new \Exception('Има записанo вече Заглавие: ' . $DTO->getPersonName());
        }
    }

    public function deletePerson(\App\Data\PersonDTO $DTO) {
        return $this->personRepository->delete($DTO);
    }

}
