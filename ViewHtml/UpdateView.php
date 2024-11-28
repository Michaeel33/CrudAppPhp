<?php

class UpdateView {
    public function render($personalData) {
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
        <form method="POST">
            <input type="hidden" name="perId" value="<?= $personalData->perId ?>">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?= $personalData->firstname ?>" required>
            <br>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?= $personalData->lastname ?>" required>
            <br>

            <label for="ulica">Street:</label>
            <input type="text" id="ulica" name="ulica" value="<?= $personalData->ulica ?>" required>
            <br>

            <label for="mesto">City:</label>
            <input type="text" id="mesto" name="mesto" value="<?= $personalData->mesto ?>" required>
            <br>

            <label for="psc">Postal Code:</label>
            <input type="text" id="psc" name="psc" value="<?= $personalData->psc ?>" required>
            <br>

            <input type="submit" value="Update Entry">
        </form>
        <br>
        <a href="index.php">Back to list</a>
        </body>
        </html>
        <?php
    }
}
?>