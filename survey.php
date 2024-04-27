<?php
session_start();

// eingegebenen Namen von index.php in $_SESSION["name"] speichern
$_SESSION["name"]=$_GET['Name']; 

// wenn $_SESSION["name"] = leer, dann durch "anonymous" ersetzen
if (empty($_SESSION["name"])) {         
    $_SESSION["name"]="anonymous"; 
}
        
require "./inc/db.php";

// $name nicht in "user_table" oder $name==anonymous
if($nameAnzahl==0 or $name=="anonymous") {

    // Formular ausfüllen
    echo "<h1>Fragen zu deinem Studium</h1>";
    
    echo "<form method='post' action='save.php'>";

        // Frage 1
        echo "<label for='Q1'>In welchem Jahr hast du mit dem Studium begonnen? </label><br><br>";
        echo "<select name='Q1'>";
            echo "<option value='2019'>2019</option>";
            echo "<option value='2020'>2020</option>";
            echo "<option value='2021'>2021</option>";
            echo "<option value='2022'>2022</option>";
        echo "</select><br><br>";
        
        // Frage 2
        echo "<label for='Q2'>Bist du mit deinem Studium bis jetzt zufrieden? </label><br><br>";
        echo "<input type='checkbox' id='JA' name='Q2' value='JA'>";
        echo "<label for='JA'> JA </label>";
        echo "<input type='checkbox' id='NEIN' name='Q2' value='NEIN'>";
        echo "<label for='NEIN'> NEIN </label><br><br>";

        // Frage 3
        echo "<label for='Q3'>Wie lange benötigst du für die Lösung einer B-Aufgabe? </label><br><br>";
        echo "<select name='Q3'>";                      
            echo "<option value='1 Monat'>1 Monat</option>";
            echo "<option value='2 Monate'>2 Monate</option>";
            echo "<option value='3 Monate'>3 Monate</option>";
            echo "<option value='4 Monate'>4 Monate</option>";
            echo "<option value='5 Monate'>5 Monate</option>";
            echo "<option value='6 Monate'>6 Monate</option>";
        echo "</select><br><br>";

        // Frage 4
        echo "<label for='Q4'>Welches ist dein Lieblingsmodul im Studium? </label><br><br>";
        echo "<input type='text' size='30' name='Q4'><br><br>";

        // Frage 5
        echo "<label for='Q5'>Warum hast du dich für dieses Studium entschieden? </label><br><br>";
        echo "<textarea name='Q5' cols='50' rows='7'></textarea><br><br>";

        // eingegebene Daten an save.php übergeben und save.php aufrufen
        echo "<input type='submit' value='absenden'>";
    
    echo "</form>";
        
// $name ist in "user_table" (außer "anonymous") -> anderen Namen wählen
} else {
    echo "Nutzer existiert schon, bitte anderen Namen wählen! <br><br>";
    echo "<form action='survey.php'>";
        echo "<label for='Name'>Dein Name: </label>";
        echo "<input type='text' size='30' name='Name'>";
        echo "<input type='submit' value='Umfrage starten'>";
    echo "</form>";
}
?>