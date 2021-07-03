<?php

namespace App\Http\Fiscal;

use App\Data\FiscalDTO;
use App\Http\HttpHandlerAbstract;
use App\Service\Articles\ArticleServiceInterface;
use App\Service\Fiscal\FiscalServiceInterface;
use App\Service\Person\PersonServiceInterface;
use Exception;

class BonHttpHandler extends HttpHandlerAbstract {

    public function edit(FiscalServiceInterface $fiscalService, PersonServiceInterface $personService, array $formData = []) {
        if (isset($formData['edit'])) {
            $this->handleEditProcess($fiscalService, $personService, $formData);
        } else {
            $persons = $personService->getAll();
            $bons = $this->dataBinder->bind($formData, FiscalDTO::class);
            $this->render("fiscals/edit_bon", ['persons' => $persons, 'bons' => $bons], ['error' => null]);
        }
    }

    public function handleEditProcess(FiscalServiceInterface $fiscalService, PersonServiceInterface $personService, $formData) {
        $persons = $personService->getAll();
            
        try {
            $persons = $personService->getAll();
            $bons = $this->dataBinder->bind($formData, FiscalDTO::class);
            $personId = $formData['person_id'];
            $_SESSION['personId'] = $personId;
            $result = $fiscalService->edit($bons);

            $this->render('fiscals/edit_bon', ['persons' => $persons, 'bons' => $bons], ['error' => null]);
        } catch (\Exception $ex) {
            $this->render('fiscals/edit_bon', ['persons' => $persons, 'bons' => null], ['error' => $ex->getMessage()]);
        }
    }

    public function export(ArticleServiceInterface $articleService, $formData) {
        if (isset($formData['export'])) {
            $date = $formData['date'];
            $articleService->getAll($date);
        } else {
            $this->render('articles/export', null, ['error' => null]);
        }
    }

    public function showBons(FiscalServiceInterface $fiscalService, PersonServiceInterface $personService, $formData) {
        $persons = $personService->getAll();

        if (isset($formData['show'])) {
            $date = $formData['date'];
            $id = $formData['person'];
            $_SESSION['personId'] = $id;
            $bons = $fiscalService->getAllbyPerson($id, $date);

            $this->render('fiscals/show_bon', ['persons' => $persons, 'bons' => $bons], ['error' => null]);
        } else {
            $this->render('fiscals/show_bon', ['persons' => $persons], ['error' => null]);
        }
    }
    public function showMenuPage() {
        $this->render('fiscals/menu_page');
    }

}
