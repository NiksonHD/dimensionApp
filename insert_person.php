<?php


require_once './common.php';
/** @var \App\Http\Person\PersonHttpHanler $personHttpHandler */

$personHttpHandler->insertPerson($personService, $_POST);