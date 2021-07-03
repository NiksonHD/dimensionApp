<?php



namespace App\Repository\Person;

use App\Data\DatabaseAbstract;

class PersonRepository extends DatabaseAbstract implements PersonRepositoryInterface {
    /**
     * 
     * @var \Database\DatabaseInterface
     */
    protected $db;
    public function __construct(\Database\DatabaseInterface $db) {
        $this->db = $db;
    }

    
    public function findAll() {
        return $this->db->query("SELECT id, name as personName from person")
                ->execute()->fetch(\App\Data\PersonDTO::class);
        
    }

    public function addPerson(\App\Data\PersonDTO $DTO) {
      $result = $this->db->query(" 
                    INSERT into person (name)
                    VALUES (?)
              ")->execute([$DTO->getPersonName()]);
      return $result->rowCount();
    }

    public function findOne($personName) {
        return $this->db->query('SELECT '
                . ' id, name FROM person WHERE name = ?')
                ->execute([$personName])
                ->fetchOne(\App\Data\PersonDTO::class);
    }

    public function delete(\App\Data\PersonDTO $DTO) {
        return $this->db->query("
                DELETE FROM person WHERE id = ?
            ")->execute([$DTO->getId()]);
    }

    public function getLasrInsertId() {
        $result = $this->db->query('
            Select id FROM person ORDER BY id DESC LIMIT 1
                ')->execute()
                ->fetchAssoc();
        return $result;
        
        
    }

}
