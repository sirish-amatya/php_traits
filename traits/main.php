<?php
include(__DIR__.'/PresentableTrait.php');
include(__DIR__.'/PersonModel.php');
include(__DIR__.'/BasePresenter.php');
include(__DIR__.'/PersonPresenter.php');

$person = new PersonModel('Sirish', 'Amatya');
$person->addMobile('123', '321312123');
echo $person->present()->fullName();
echo "\n";
echo $person->present()->completeMobile();
