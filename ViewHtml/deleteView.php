<?php

class deleteView {
    public function render($message) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Delete Personal Data</title>
            <link rel="stylesheet" href="../css/styles.css">
        </head>
        <body>
        <h1>Delete Personal Data</h1>
        <p><?= $message ?></p>
        <a href="index.php">Back to list</a>
        </body>
        </html>
        <?php
    }
}
?>