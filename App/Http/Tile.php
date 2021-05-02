<?php

namespace App\Http;

use App\Service\Tiles\TileServiceInterface;
use \App\Http;

class Tile extends Http\UserHttpHandlerAbstract {

    /**
     *
     * @var \App\Service\Tiles\TileServiceInterface
     */
    private $tileService;

    public function __construct(\Core\Template $template,
            \Core\DataBinder $dataBinder,
            \App\Service\Tiles\TileServiceInterface $tileService) {
        parent::__construct($template, $dataBinder);
        $this->tileService = $tileService;
    }

    public function edit($getData, $formData) {
        if (isset($formData['edit_cell'])) {

            if (isset($getData['article'])) {
                $this->handleEditProcces($getData, $formData);
                exit;
            }
            $cell = $formData['cell'];
            // $tilesInCell = $this->getArticlesInCell($cell);
            $this->redirect("edit_article.php?cell=$cell");
        } else {
            if (isset($getData['output'])) {
                $tileDTO = $this->tileService->getTileInfoByInput($getData['output']);
                $tileDTO->setCellFromInput($getData['cellOutput']);
                $this->render('tiles/edit_cell', [$tileDTO], null);
            } else {
                $this->render('tiles/edit_cell', null, null);
            }
        }
    }

    public function edit_article($getData, $formData) {

        if (isset($formData['edit_article'])) {

            $this->handleEditProcces($getData, $formData);
        } if(isset($formData['edit_cell'])){
            $cell = $formData['cell'];
            $this->getArticlesInCell($cell);
        }
        else {
            $cell = $getData['cell'];
            $this->getArticlesInCell($cell);
        }
    }

    public function find($getData, $formData) {

        if (isset($formData['search'])) {
            $this->handleFindProcess($formData);
        } else {
            $this->render('tiles/find', null, [null]);
        }
    }

    public function handleFindProcess($formData) {
        $tileArray[] = $formData['tileNumber'];
        if (strlen($formData['tileNumber']) == 3 || strlen($formData['tileNumber']) == 4) {
            $cellInDigits = $this->digitsToLettersAdress($formData['tileNumber']);
            $tileString = $this->tileService->getTilesStringByCell($cellInDigits) ["sap_num"];
            $tileString = trim($tileString);
            $tileArray = explode(' ', $tileString);

        }

        try {
            foreach ($tileArray as $tileNum) {
                /** @var \App\Data\CellsDTO $cells */
                /** @var \App\Data\TileDTO $tile */
                $array = [];
                $tile = $this->tileService->getTileInfoByInput($tileNum);
                $cells = $this->tileService->getTileAdressBySap($tile->getSapNum());
                foreach ($cells as $cell) {
                    $array[] = $cell;
                }

                $tile->setCells($array);
                $array = [];
                $output [] = $tile;
            }
            $this->render('tiles/find', $output, [null]);
        } catch (\Exception $ex) {
            $this->render('tiles/find', null, [$ex->getMessage()]);
        }
    }

    function digitsToLettersAdress($tileNumber) {
        if (strlen($tileNumber) == 3 || strlen($tileNumber) == 4) {
            $tileAdress = $tileNumber;
            $lastCharIndex = strlen($tileAdress) - 1;
            $firstChar = substr($tileAdress, 0, 1);
            $lastChar = substr($tileAdress, -1);
            if ($firstChar == '1') {
                $tileAdress[0] = 'a';
            } elseif ($firstChar == '2') {
                $tileAdress[0] = 'b';
            } elseif ($firstChar == '3') {
                $tileAdress[0] = 'c';
            } elseif ($firstChar == '4') {
                $tileAdress[0] = 'd';
            } elseif ($firstChar == '5') {
                $tileAdress[0] = 'e';
            } elseif ($firstChar == '6') {
                $tileAdress[0] = 'o';
            }
            if ($lastChar == '1') {
                $tileAdress[$lastCharIndex] = 'a';
            } elseif ($lastChar == '2') {
                $tileAdress[$lastCharIndex] = 'b';
            } elseif ($lastChar == '3') {
                $tileAdress[$lastCharIndex] = 'c';
            } elseif ($lastChar == '4') {
                $tileAdress[$lastCharIndex] = 'd';
            } elseif ($lastChar == '5') {
                $tileAdress[$lastCharIndex] = 'e';
            } elseif ($lastChar == '6') {
                $tileAdress[$lastCharIndex] = 'f';
            }
            $tileAdress = ucfirst($tileAdress);
            return $tileAdress;
        }
        
    }

    public function handleEditProcces($getData, $formData) {
        
        try {
            /** @var App\Data\TileDTO $tileDTO */
            if (isset($getData['article'])) {
                $tileDTO = $this->tileService->getTileInfoByInput($getData['article']);
                $cellInDigits = $this->digitsToLettersAdress($formData['cell']);
            } else {

                $tileDTO = $this->tileService->getTileInfoByInput($formData['article']);

                $cellInDigits = $this->digitsToLettersAdress($getData['cell']);
                

            }
            $tileDTO->setCellFromInput($cellInDigits);
            $sapNum = $tileDTO->getSapNum();
            $result = $this->tileService->changeArticleAdress($tileDTO->getCellFromInput(), $tileDTO->getSapNum());
            if ($result !== 1) {
                throw new \Exception("Неподходящи данни за запис!");
            }
            $this->redirect("edit.php?output=$sapNum&cellOutput=$cellInDigits");
        } catch (\Exception $ex) {
            $this->render('tiles/edit_article', null, [$ex->getMessage()]);
        }
    }

    public function getArticlesInCell($cell) {
        $cellInDigits = $this->digitsToLettersAdress($cell);
        $tileString = $this->tileService->getTilesStringByCell($cellInDigits)["sap_num"];

        $tileString = trim($tileString);
        $tileArray = explode(' ', $tileString);

        try {
            foreach ($tileArray as $tileNum) {
                /** @var \App\Data\TileDTO $tile */

                $tile = $this->tileService->getTileInfoByInput($tileNum);
                $tile->setCellFromInput($cellInDigits);

                $output [] = $tile;
            }

            $this->render('tiles/edit_article', $output, [null]);
        } catch (\Exception $ex) {
            $tile = new \App\Data\TileDTO();
            $tile->setCellFromInput($cellInDigits);
            $tile->setSapNum($ex->getMessage());
            $output [] = $tile;
            $this->render('tiles/edit_article', $output, [$ex->getMessage()]);
        }
    }

}
