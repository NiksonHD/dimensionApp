<?php




namespace App\Data;


class ErrorDTO {
        
    private $massege;
    
    public function __construct($massege) {
        $this->massege = $massege;
    }

    public function getMassege(): string {
        return $this->massege;
    }
    
}


