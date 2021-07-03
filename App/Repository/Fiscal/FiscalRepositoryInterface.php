<?php

namespace App\Repository\Fiscal;

use App\Data\FiscalDTO;

interface FiscalRepositoryInterface {
    
    public function createBon(FiscalDTO $DTO);
    
    public function getLasrInsertId();
    
    public function findAllByPerson($personId, $date);
    
    public function delete($personId);
    
}
