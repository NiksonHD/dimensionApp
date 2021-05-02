<?php

namespace App\Data;

class TileDTO {

    /**
     *
     * @var int
     */
    private $id;

    /**
     *
     * @var CellsDTO[]
     */
    
    
    private $cells;

    /**
     *
     * @var string
     */
    
    
    
    private $sapNum;
    /**
     *
     * @var string
     */
    private $articleName;
    
    /**
     * string
     */
    private $ean;
    
    
    /**
     * string
     */
    private $quantity;
    
    /**
     * string
     */
    private $updateDate;
    
    /**
     * string
     */
    private $cellFromInput;
    public function getCellFromInput() {
        return $this->cellFromInput;
    }

    public function setCellFromInput($cellFromInput) {
        $this->cellFromInput = $cellFromInput;
    }

    

    public function getId() {
        return $this->id;
    }

    public function getCells(): array {
        return $this->cells;
    }

    public function getSapNum() {
        return $this->sapNum;
    }

    public function getArticleName() {
        return $this->articleName;
    }

    public function getEan() {
        return $this->ean;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getUpdateDate() {
        return $this->updateDate;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCells(array $cells) {
        $this->cells = $cells;
    }

    public function setSapNum($sapNum) {
        $this->sapNum = $sapNum;
    }

    public function setArticleName($articleName) {
        $this->articleName = $articleName;
    }

    public function setEan($ean) {
        $this->ean = $ean;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setUpdateDate($updateDate) {
        $this->updateDate = $updateDate;
    }



}
