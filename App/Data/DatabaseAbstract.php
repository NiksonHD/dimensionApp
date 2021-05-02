<?php


namespace App\Data;

use Database\DatabaseInterface;
use Core\DataBinderInterface;

 class DatabaseAbstract {
    
      /**
     * @var DatabaseInterface
     */
      protected $db;
      /**
       *
       * @var \Core\DataBinderInterface
       */
      
      protected $dataBinder;

      public function __construct(\Database\DatabaseInterface $db, \Core\DataBinderInterface $dataBinder) {
          $this->db = $db;
          $this->dataBinder = $dataBinder;
      }

}
