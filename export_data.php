<?php


require_once './common.php';
/** @var \App\Http\article\ArticleHttpHandler $articleHttpHandler */


$articleHttpHandler->export($articleService, $_POST);