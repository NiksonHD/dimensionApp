<?php

session_start();

spl_autoload_register(function($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);

    include_once __DIR__ . '/' . $className . '.php';
});
$dataBinder = new \Core\DataBinder();
$template = new \Core\Template();
$dbInfo = parse_ini_file("Config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db = new \Database\PDODatabase($pdo);
$userRepository = new \App\Repository\UserRepository($db);
$articleRepository = new \App\Repository\Article\ArticleRepository($db);
$encryptionService = new \App\Service\Encryption\ArgonEncryptionService();
$articleService = new \App\Service\Articles\ArticleService($articleRepository);
$userService = new App\Service\UserService($userRepository, $encryptionService);
$articleHttpHandler = new \App\Http\article\ArticleHttpHandler($template, $dataBinder,$articleService );
$userHttpHandler = new \App\Http\UserHttpHandler($template, $dataBinder);
//$tile = new \App\Http\Tile($template, $dataBinder,$tileService);
//$tileHttpHandler = new \App\Http\Tiles\TileHttpHandler($template, $dataBinder,$tileService);