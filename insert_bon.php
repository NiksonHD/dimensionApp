<?php


require_once './common.php';
/** @var \App\Http\Fiscal\BonHttpHandler $ficalHttpHandler */

$fiscalHttpHandler->edit($fiscalService,$personService, $_POST);