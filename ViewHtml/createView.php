<?php

class CreateView {
    public function render() {
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
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>
            <br>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>
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
        <?php
    }
}
?>