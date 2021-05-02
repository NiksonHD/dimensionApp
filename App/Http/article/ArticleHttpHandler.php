<?php

namespace App\Http\article;

use App\Data\ArticleDimensionsDTO;
use App\Http\UserHttpHandlerAbstract;
use App\Service\Articles\ArticleServiceInterface;
use App\Service\UserServiceInterface;

class ArticleHttpHandler extends UserHttpHandlerAbstract {

    public function edit($articleService, array $formData = []) {
        if (isset($formData['edit'])) {
            $this->handleEditProcess($articleService, $formData);
        } else {
            $article = $this->dataBinder->bind($formData, ArticleDimensionsDTO::class);
//            var_dump($article);exit;
            $this->render("articles/edit_article", $article, ['error' => null]);
        }
    }

    public function handleEditProcess(ArticleServiceInterface $articleService, $formData) {

        try {
            $article = $this->dataBinder->bind($formData, ArticleDimensionsDTO::class);
            $result = $articleService->edit($article);
            $this->render('articles/edit_article', $result, ['error' => null]);
        } catch (\Exception $ex) {
            $this->render('articles/edit_article', null, ['error' => $ex->getMessage()]);
        }
    }

    public function export(ArticleServiceInterface $articleService, $formData) {
        if (isset($formData['export'])) {
            $date = $formData['date'];
            $articleService->getAll($date);
        } else {
            $this->render('articles/export', null, ['error' => null]);
        }
    }

    public function showMenuPage() {
        $this->render('articles/menu_page');
    }

    public function deleteArticleDimensions(ArticleServiceInterface $articleService, $formData) {
        if (isset($formData['delete'])) {
            try {
                            $article = $this->dataBinder->bind($formData, ArticleDimensionsDTO::class);
                $deletedArticle = $articleService->deleteOne($article);
                $this->render('articles/delete', $deletedArticle, [null]);
            } catch (\Exception $ex) {
                $this->render('articles/delete', null, ['error' => $ex->getMessage()]);
            }
        } else {
            $this->render('articles/delete', null, [null]);
        }
    }
    public function findOne(ArticleServiceInterface $articleService, $formData){
         if (isset($formData['find'])) {
             $ean = $formData['ean'];
             try{
             $article = $articleService->getOne($ean); 
             $this->render('articles/find_one', $article, ['error' => null]);
             } catch (\Exception $ex){
                              $this->render('articles/find_one', null, ['error' => $ex->getMessage()]);

             }
             
             
         }
         else{
             $this->render('articles/find_one', null, ['error'=>null]);
         }
    }

}
