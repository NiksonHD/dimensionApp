<?php


namespace App\Repository\Tiles;

class TileRepository extends \App\Data\DatabaseAbstract implements TileRepositoryInterface {
    
    

    public function findTileAdressBySap(string $sapNum) {
        $sapNum= "%" . $sapNum. "%";
        $result =  $this->db->query("SELECT 
                        tile_cell as adress,  
                        update_date
                        
                        FROM tile_map
                        WHERE sap_num like ?
                        ")->execute([$sapNum])
                        ->fetchAssoc();
                
                foreach ($result as $row){
                    $cellAdress = $this->dataBinder->bind($row, \App\Data\CellsDTO::class);

                yield $cellAdress;
                }
    }

    public function findTileInfoBySap(string $sapNum) {
              return  $result = $this->db->query('SELECT 
                        article_num as sapNum,
                        article_name as articleName,
                        ean,
                        quantity,
                        update_date as updateDate
                        FROM 
                        articles_info 
                        WHERE article_num = ?
                        ')->execute([$sapNum])
                          ->fetchOne(\App\Data\TileDTO::class);
        
    }

    public function findTileInfoByEan(string $ean) {
       return $result = $this->db->query("SELECT 
                        article_num as sapNum,
                        article_name as articleName,
                        ean,
                        quantity,
                        update_date as updateDate
                        FROM 
                        articles_info 
                        WHERE ean = ?
                        ")->execute([$ean])
                        ->fetchOne(\App\Data\TileDTO::class);
        
    }

    public function findTilesStringByCell(string $cell) {
        return $result = $this->db->query("SELECT 
                                            sap_num 
                                            FROM 
                                            tile_map 
                                            WHERE 
                                            tile_cell = ?
                                            ")->execute([$cell])
                                                ->fetchAssoc()
                                                ->current();


        
    }

    public function editArticleAdress($cell, $article) {
         $result = $this->db->query("UPDATE tile_map
                                    SET sap_num = ?
                                    WHERE tile_cell = ?
                                           ")->execute([$article, $cell]);
         return $result->rowCount();
    }

}
