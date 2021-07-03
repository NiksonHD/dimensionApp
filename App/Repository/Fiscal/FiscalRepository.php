<?php

namespace App\Repository\Fiscal;

use App\Data\DatabaseAbstract;
use App\Data\FiscalDTO;
use App\Repository\Fiscal\FiscalRepositoryInterface;
use Database\DatabaseInterface;

class FiscalRepository extends DatabaseAbstract implements FiscalRepositoryInterface {

    /**
     * 
     * @var DatabaseInterface
     * 
     *      
     */
    protected $db;

    public function __construct(DatabaseInterface $db) {
        $this->db = $db;
    }

    public function createBon(FiscalDTO $DTO) {
        $result = $this->db->query("INSERT INTO fiscal_bons(number, person_id)"
                        . "VALUES (?,?)"
                )->execute([$DTO->getBonNumber(),
            $DTO->getPersonId()]);

        return $result->rowCount();
    }

    public function getLasrInsertId() {
        
    }

    public function findAllByPerson($personId, $date) {
      return  $result = $this->db->query(
                                "SELECT 
                                number as bonNumber, 
                                person_id as person, 
                                fiscal_bons.update_date as updateDate,
                                person.name as person
                                FROM fiscal_bons 
                                INNER JOIN person ON fiscal_bons.person_id = person.id
                                AND fiscal_bons.person_id = ?
                                AND fiscal_bons.update_date LIKE ?;  ")
                            ->execute([
                            $personId,
                            $date])->fetch(FiscalDTO::class);

        
    }

    public function delete($personId) {
        return $this->db->query("
                DELETE FROM fiscal_bons WHERE person_id = ?
            ")->execute([$personId]);
    }

}
