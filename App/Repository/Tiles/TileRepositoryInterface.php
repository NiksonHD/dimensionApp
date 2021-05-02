<?php

namespace App\Repository\Tiles;

interface TileRepositoryInterface {

    public function findTileAdressBySap(string $sapNum);

    public function findTileInfoByEan(string $ean);

    public function findTileInfoBySap(string $sapNum);
    
    public function findTilesStringByCell(string $cell);
    
    public function editArticleAdress($cell, $article);
}
