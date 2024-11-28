<?php
require '../classes/Database.php';
require '../classes/PersonalData.php';
require '../ViewHtml/UpdateView.php';

$database = new Database();
$db = $database->getConnection();

$personalData = new PersonalData($db);
$personalData->perId = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $personalData->firstname = $_POST['firstname'];
    $personalData->lastname = $_POST['lastname'];
    $personalData->ulica = $_POST['ulica'];
    $personalData->mesto = $_POST['mesto'];
    $personalData->psc = $_POST['psc'];

    if ($personalData->update()) {
        echo "Record was updated.";
        header("Location: index.php");
        exit;
    } else {
        echo "Unable to update record.";
    }
} else {
    $personalData->readOne($personalData->perId);
}

$view = new UpdateView();
$view->render($personalData);
?>