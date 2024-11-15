<?php
require '../classes/Database.php';
require '../classes/PersonalData.php';

$database = new Database();
$db = $database->getConnection();

$personalData = new PersonalData($db);
$stmt = $personalData->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Data</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<h1>System pre ziskavanie adries - Posta</h1>
<a href="create.php">Add New Entry</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Street</th>
        <th>City</th>
        <th>PSC</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['perId'] ?></td>
            <td><?= $row['firstName'] ?></td>
            <td><?= $row['lastName'] ?></td>
            <td><?= $row['ulica'] ?></td>
            <td><?= $row['mesto'] ?></td>
            <td><?= $row['psc'] ?></td>
            <td>
                <a href="update.php?id=<?= $row['perId'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['perId'] ?>">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
