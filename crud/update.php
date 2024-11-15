<?php
require '../classes/Database.php';
require '../classes/PersonalData.php';

$database = new Database();
$db = $database->getConnection();

$personalData = new PersonalData($db);


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $personalData->readOne($id);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $personalData->perId = $_GET['id'];
    $personalData->firstName = $_POST['firstName'];
    $personalData->lastName = $_POST['lastName'];
    $personalData->ulica = $_POST['ulica'];
    $personalData->mesto = $_POST['mesto'];
    $personalData->psc = $_POST['psc'];


    if ($personalData->update()) {

        header("Location: index.php");
        exit;
    } else {
        echo "<p>Error updating the record.</p>";
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
<h1>Update Personal Data</h1>


<form method="post">
    <label for="firstName">First Name</label>
    <input type="text" name="firstName" value="<?= htmlspecialchars($personalData->firstName) ?>" required>

    <label for="lastName">Last Name</label>
    <input type="text" name="lastName" value="<?= htmlspecialchars($personalData->lastName) ?>" required>

    <label for="ulica">Street</label>
    <input type="text" name="ulica" value="<?= htmlspecialchars($personalData->ulica) ?>" required>

    <label for="mesto">City</label>
    <input type="text" name="mesto" value="<?= htmlspecialchars($personalData->mesto) ?>" required>

    <label for="psc">PSC</label>
    <input type="text" name="psc" value="<?= htmlspecialchars($personalData->psc) ?>" required>

    <input type="submit" value="Update">
</form>
</body>
</html>
