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
//$articleRepository = new \App\Repository\Article\ArticleRepository($db);
$fiscalRepository = new \App\Repository\Fiscal\FiscalRepository($db);
$personRepository = new \App\Repository\Person\PersonRepository($db);
$encryptionService = new \App\Service\Encryption\ArgonEncryptionService();
//$articleService = new \App\Service\Articles\ArticleService($articleRepository);
$personService = new \App\Service\Person\PersonService($personRepository);
$fiscalService = new \App\Service\Fiscal\FiscalService($fiscalRepository);
//$userService = new App\Service\UserService($userRepository, $encryptionService);
//$articleHttpHandler = new \App\Http\article\ArticleHttpHandler($template, $dataBinder,$articleService );
$fiscalHttpHandler = new \App\Http\Fiscal\BonHttpHandler($template, $dataBinder, $fiscalService, $personService);
$personHttpHandler = new App\Http\Person\PersonHttpHanler($template, $dataBinder, $personService,$fiscalService);
//$userHttpHandler = new \App\Http\UserHttpHandler($template, $dataBinder);
//$tile = new \App\Http\Tile($template, $dataBinder,$tileService);
//$tileHttpHandler = new \App\Http\Tiles\TileHttpHandler($template, $dataBinder,$tileService);