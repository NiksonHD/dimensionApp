<?php


require_once './common.php';
/** @var \App\Http\article\ArticleHttpHandler $articleHttpHandler */


$articleHttpHandler->findOne($articleService, $_POST);