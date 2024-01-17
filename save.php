<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8mb4_unicode_ci">
        <title>
            save
        </title>
    </head>

    <body> 
        <?php
        require './inc/db.php';

        // Session-Variablen freigeben und Session beenden
        session_unset();
        session_destroy();
        ?>
        
        <hr>
        <p>Die Umfrage wurde erfolgreich gespeichert!</p>
        <hr><br><br><br>
        <!-- report.php aufrufen -->
        <a href="report.php">Report</a>

    </body>
</html>