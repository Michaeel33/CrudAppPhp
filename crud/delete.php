<?php
require '../classes/Database.php';
require '../classes/PersonalData.php';
require '../ViewHtml/deleteView.php';

$database = new Database();
$db = $database->getConnection();

$personalData = new PersonalData($db);
$personalData->perId = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

if ($personalData->delete()) {
    $message = "Record was deleted.";
} else {
    $message = "Unable to delete record.";
}

$view = new DeleteView();
$view->render($message);
?>