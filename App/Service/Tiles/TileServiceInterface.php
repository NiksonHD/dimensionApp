<?php


namespace App\Service\Tiles;





interface TileServiceInterface {

    public function getTileAdressBySap(string $sapNum);
    
    public function getTileInfoByInput(string $input);
    
    public function getTilesStringByCell(string $input);
    
    public function changeArticleAdress($cell, $article);
    
    
    
    
}
