<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8mb4_unicode_ci">
        <title>
            index
        </title>
    </head>

    <body>
        <h1>Umfrage zum Studium</h1>

        <p>Bitte gib deinen Namen ein oder lasse das Feld Name frei und du nimmst anonym an der Umfrage teil.</p>
        
        <!-- Namen eingeben -->
        <form action="survey.php">
            <label for="Name">Dein Name: </label>
            <input type="text" size="30" name="Name">
            <!-- eingegebenen Namen an survey.php übergeben und survey.php aufrufen -->
            <input type="submit" value="Umfrage starten">
        </form>
    </body>
</html>