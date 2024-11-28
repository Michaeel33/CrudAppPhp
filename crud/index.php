<?php
require '../classes/Database.php';
require '../classes/PersonalData.php';
require '../ViewHtml/indexView.php';

$database = new Database();
$db = $database->getConnection();

$personalData = new PersonalData($db);
$stmt = $personalData->read();

$view = new IndexView();
$view->render($stmt);
?>