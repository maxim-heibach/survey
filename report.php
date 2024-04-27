<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8mb4_unicode_ci">
        <title>
            report
        </title>
    </head>

    <body>
        <?php
        require "./inc/db.php";
        ?>
        
        <!-- Auswertung -->
        <h1>Auswertung</h1>
        <p>Angemeldete Personen: <?php printf($angemeldet);?></p>
        <p>Anonyme Personen: <?php printf($anonymous);?></p>    
        <p>Gesamt an der Umfrage teilgenommene Personen: <?php printf($gesamt);?></p>

    </body>
</html>