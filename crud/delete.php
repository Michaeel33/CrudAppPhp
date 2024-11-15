<?php
require '../classes/Database.php';
require '../classes/PersonalData.php';


$database = new Database();
$db = $database->getConnection();

// Skontrolujeme, či máme ID záznamu v URL
if (isset($_GET['id'])) {

    $personalData = new PersonalData($db);
    $personalData->perId = $_GET['id'];


    if ($personalData->delete()) {
        echo "Record deleted successfully!";
        header("Location: index.php");
        exit;
    } else {
        echo "Unable to delete the record!";
    }
} else {
    echo "No ID parameter provided!";
    exit;
}
