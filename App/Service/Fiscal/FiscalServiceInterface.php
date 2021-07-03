<?php

namespace App\Service\Fiscal;

interface FiscalServiceInterface {

    public function edit(\App\Data\FiscalDTO $fiscalDTO);

    public function getAllbyPerson($personId, $date);

    public function getOne($ean);
    
    public function delete($personId);
}
