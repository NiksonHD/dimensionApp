<?php



namespace App\Repository\Article;

interface ArticleRepositoryInterface {
    
public function createDimension(\App\Data\ArticleDimensionsDTO $DTO);

public function getLasrInsertId();

public function getOneById($id);

public function getOneByEan($ean);

public function findAll($date);

public function deleteOne(\App\Data\ArticleDimensionsDTO $DTO);
}
