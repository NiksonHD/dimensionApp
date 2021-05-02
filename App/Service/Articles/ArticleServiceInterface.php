<?php

namespace App\Service\Articles;

use App\Data\ArticleDimensionsDTO;

interface ArticleServiceInterface {

public function edit(ArticleDimensionsDTO $articleDTO);

public function getAll($date);

public function getOne($ean);

public function getOneByEan();

public function deleteOne(ArticleDimensionsDTO $articleDTO );

    
}
