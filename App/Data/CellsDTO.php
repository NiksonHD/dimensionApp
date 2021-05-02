<?php

/*
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

namespace App\Data;

/**
 * Description of CellsDTO
 *
 * @author nikson
 */
class CellsDTO {
    /**
     *
     * @var string
     */
    private $adress;
    /**
     *
     * @var string
     */
    
    private $comment;
    /**
     *
     * @var string
     */
    private $updateDate;

    
    public function getAdress() {
        return $this->adress;
    }

    public function getComment() {
        return $this->comment;
    }

    public function getUpdateDate() {
        return $this->updateDate;
    }

    public function setAdress($adress) {
        $this->adress = $adress;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function setUpdateDate($updateDate) {
        $this->updateDate = $updateDate;
    }


   
    
    
    
}
