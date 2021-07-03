<?php


namespace App\Service\Fiscal;

use App\Data\FiscalDTO;

class FiscalService implements FiscalServiceInterface{
    /**
     * 
     * @var \App\Repository\Fiscal\FiscalRepositoryInterface
     */
    
    private $fiscalRepository;
    public function __construct(\App\Repository\Fiscal\FiscalRepositoryInterface $fiscalRepository) {
        $this->fiscalRepository = $fiscalRepository;
    }

    
    public function edit(FiscalDTO $fiscalDTO) {
        return $this->fiscalRepository->createBon($fiscalDTO);
    }

   
    public function getOne($ean) {
        
    }

    public function getAllbyPerson($persnoId, $date) {
        $regexDate = '%'.$date . '%';
        return $this->fiscalRepository->findAllByPerson($persnoId, $regexDate);
    }

    public function delete($personId) {
     return $this->fiscalRepository->delete($personId);   
    }

}
