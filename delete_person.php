<?php


require_once './common.php';
/** @var \App\Http\Person\PersonHttpHanler $personHttpHandler */

$personHttpHandler->deletePerson($personService,$fiscalService, $_POST);