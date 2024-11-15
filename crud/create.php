<?php
require '../classes/Database.php';
require '../classes/PersonalData.php';

$database = new Database();
$db = $database->getConnection();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $personalData = new PersonalData($db);
    $personalData->firstName = $_POST['firstName'];
    $personalData->lastName = $_POST['lastName'];
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Personal Data</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<h1>Add New Personal Data</h1>
<form method="POST">
    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" required>
    <br>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required>
    <br>

    <label for="ulica">Street:</label>
    <input type="text" id="ulica" name="ulica" required>
    <br>

    <label for="mesto">City:</label>
    <input type="text" id="mesto" name="mesto" required>
    <br>

    <label for="psc">Postal Code:</label>
    <input type="text" id="psc" name="psc" required>
    <br>

    <input type="submit" value="Add Entry">
</form>
<br>
<a href="index.php">Back to list</a>
</body>
</html>
