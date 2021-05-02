<?php

namespace App\Service\Tiles;

class TileService implements TileServiceInterface {

    /**
     *
     * @var \App\Repository\Tiles\TileRepositoryInterface
     */
    private $repository;

    public function __construct(\App\Repository\Tiles\TileRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function getTileAdressBySap(string $sapNum) {

        return $this->repository->findTileAdressBySap($sapNum);
    }

    public function getTileInfoByInput(string $input) {
        if ($input == ''||$input == 0 ) {
            throw new \Exception('Невалидни данни ! -> '.$input);
        }
        if ($this->repository->findTileInfoBySap($input) && strlen($input) == 1) {
                    return $this->repository->findTileInfoBySap($input);
        }
        if ($this->repository->findTileInfoBySap($input) && strlen($input) == 6) {
                    return $this->repository->findTileInfoBySap($input);
        }
        if ($this->repository->findTileInfoByEan($input) && strlen($input) == 13) {
                return $this->repository->findTileInfoByEan($input);
        }
            throw new \Exception('Невалидни данни! ->'.$input, 2);
        
    }

    public function getTilesStringByCell(string $input) {
        return $this->repository->findTilesStringByCell($input);
        
    }

    public function changeArticleAdress($cell, $article) {
        return $this->repository->editArticleAdress($cell, $article);
    }

}
