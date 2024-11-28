<?php
require '../classes/Database.php';
require '../classes/PersonalData.php';
require '../ViewHtml/createView.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $personalData = new PersonalData($db);
    $personalData->firstname = $_POST['firstname'];
    $personalData->lastname = $_POST['lastname'];
    $personalData->ulica = $_POST['ulica'];
    $personalData->mesto = $_POST['mesto'];
    $personalData->psc = $_POST['psc'];

    if ($personalData->create()) {
        echo "New record added successfully!";
        header("Location: index.php");
        exit;
    } else {
        echo "Unable to add the new record!";
    }
}

$view = new CreateView();
$view->render();
?>