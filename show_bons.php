<?php


require_once './common.php';
/** @var \App\Http\Fiscal\BonHttpHandler $fiscalHttpHandler */

$fiscalHttpHandler->showBons($fiscalService,$personService, $_POST);