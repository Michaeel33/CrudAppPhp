<?php
require '../classes/Database.php';
require '../classes/PersonalData.php';

$database = new Database();
$db = $database->getConnection();

if (isset($_GET['id'])) {
    // Načítaj záznam z databázy podľa ID
    $personalData = new PersonalData($db);
    $personalData->perId = $_GET['id'];

    $stmt = $personalData->read();  // Predpokladáme, že read() metóda načíta záznam podľa ID
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Predvyplni formulár údajmi
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $ulica = $row['ulica'];
        $mesto = $row['mesto'];
        $psc = $row['psc'];
    } else {
        echo "Record not found!";
        exit;
    }
} else {
    echo "No ID parameter provided!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aktualizovanie údajov po odoslaní formuláru
    $personalData->firstName = $_POST['firstName'];
    $personalData->lastName = $_POST['lastName'];
    $personalData->ulica = $_POST['ulica'];
    $personalData->mesto = $_POST['mesto'];
    $personalData->psc = $_POST['psc'];

    if ($personalData->update()) {
        echo "Record updated successfully!";
        header("Location: index.php");  // Presmerovanie na hlavný zoznam po úspešnej aktualizácii
        exit;
    } else {
        echo "Unable to update the record!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Personal Data</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<h1>Edit Personal Data</h1>
<form method="POST">
    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" value="<?= htmlspecialchars($firstName); ?>" required>
    <br>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" value="<?= htmlspecialchars($lastName); ?>" required>
    <br>

    <label for="ulica">Street:</label>
    <input type="text" id="ulica" name="ulica" value="<?= htmlspecialchars($ulica); ?>" required>
    <br>

    <label for="mesto">City:</label>
    <input type="text" id="mesto" name="mesto" value="<?= htmlspecialchars($mesto); ?>" required>
    <br>

    <label for="psc">Postal Code:</label>
    <input type="text" id="psc" name="psc" value="<?= htmlspecialchars($psc); ?>" required>
    <br>

    <input type="submit" value="Update">
</form>
</body>
</html>
