<?php


namespace App\Http\Person;

use App\Data\PersonDTO;
use App\Http\HttpHandlerAbstract;
use App\Repository\Fiscal\FiscalRepositoryInterface;
use App\Service\Fiscal\FiscalServiceInterface;
use App\Service\Person\PersonServiceInterface;
use Exception;

class PersonHttpHanler extends HttpHandlerAbstract {
    public function insertPerson(PersonServiceInterface $personService, $formData){
        if (isset($formData['edit'])) {
            $this->handleEditProcess($personService, $formData);
        } else {
            $this->render("person/insert_person", null, ['error' => null]);
        }
    }

    public function handleEditProcess(PersonServiceInterface $personService, $formData) {
            
        try {
            $person = $this->dataBinder->bind($formData, PersonDTO::class);
            $result = $personService->insertPerson($person);

            $this->redirect('/dimensionApp/insert_bon.php');
        } catch (Exception $ex) {
            $this->render('person/insert_person', null, ['error' => $ex->getMessage()]);
        }
    }
        
     public function deletePerson(PersonServiceInterface $personService, FiscalServiceInterface$fiscalService, $formData){
        if (isset($formData['edit'])) {
            $this->handleDeleteProcess($personService,$fiscalService, $formData);
        } else {
            
            $persons = $personService->getAll();
            $this->render("person/delete_person", ['persons' => $persons], ['error' => null]);
        }
    } 
    public function handleDeleteProcess(PersonServiceInterface $personService, FiscalServiceInterface $fiscalService, $formData) {
            
        try {
            $person = $this->dataBinder->bind($formData, PersonDTO::class);
            $fiscalService->delete($person->getId());
            $result = $personService->deletePerson($person);

            $this->redirect('/dimensionApp/delete_person.php');
        } catch (Exception $ex) {
            $this->render('person/insert_person', null, ['error' => $ex->getMessage()]);
        }
    }
        
        
    
    
}
