<?php

namespace App\Service\Articles;

class ArticleService implements ArticleServiceInterface {

    /**
     * 
     * @var \App\Repository\Article\ArticleRepositoryInterface
     */
    private $articleRepository;

    public function __construct(\App\Repository\Article\ArticleRepositoryInterface $articleRepository) {
        $this->articleRepository = $articleRepository;
    }

    public function edit(\App\Data\ArticleDimensionsDTO $articleDTO) {
        $ean = $this->articleRepository->getOneByEan($articleDTO->getEan());
        if (!$ean) {
            $this->articleRepository->createDimension($articleDTO);
            $id = $this->articleRepository->getLasrInsertId();
            foreach ($id as $idFached) {
                $articleId = $idFached['id'];
                return $this->articleRepository->getOneById($articleId);
            }
        } else {
            throw new \Exception('Има записан вече EAN ' . $articleDTO->getEan());
        }
    }

    public function getAll($date) {
        $regexDate = '%'.$date . '%';
        $result = $this->articleRepository->findAll($regexDate);
        
         header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename = dimensions.csv');
        $output = fopen("php://output", "w");
        
        
//        $output = fopen('/home/nikson/dimension_data.txt', "w");
        fputcsv($output, array('ean', 'width', 'length', 'height', 'weight'));
        foreach ($result as $line) {
        
            fputcsv($output, $line, "\t");
        }
                    fclose($output);
    }

    public function getOne($ean) {
        $DTO = $this->articleRepository->getOneByEan($ean);
        if($DTO){
        return $DTO;
        }else {
           throw new \Exception("Артикул с EAN: " . $ean . " не съществува!");
        }
        
        
        
        
        $result = $this->articleRepository->getOneByEan($ean);
        return $result;
    }

    public function getOneByEan() {
        return true;
    }

    public function deleteOne(\App\Data\ArticleDimensionsDTO $articleDTO) {
        $DTO = $this->articleRepository->getOneByEan($articleDTO->getEan());
        if($DTO){
        $this->articleRepository->deleteOne($DTO);
        return $DTO;
        }else {
           throw new \Exception("Артикул с EAN: " . $articleDTO->getEan() . " не съществува!");
        }
    }

}
