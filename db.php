<?php
// Verbindung mit Datenbank aufbauen. 
$link=@mysqli_connect("localhost","root","","survey");


// nur für survey.php und save.php
if(basename($_SERVER['PHP_SELF'])=="survey.php" or basename($_SERVER['PHP_SELF'])=="save.php") {
    // Prepared Statement initialisieren
    $db=mysqli_stmt_init($link);
    // Variablen
    $name=$_SESSION["name"];
}


// survey.php, Datenbankabfragen mit Prepared Statements
if(basename($_SERVER['PHP_SELF'])=="survey.php") {
    
    // Prüfen ob Name in "user_table"
    @mysqli_stmt_prepare($db, "SELECT Name FROM user_table WHERE Name=?");
    @mysqli_stmt_bind_param($db,'s', $name);
    @mysqli_stmt_execute($db);
    
    // Name wie oft in user_table?
    @mysqli_stmt_store_result($db);
    $nameAnzahl=@mysqli_stmt_num_rows($db);

    // Name in "user_table" hinzufügen, wenn noch nicht vorhanden
    if($nameAnzahl==0) {
        @mysqli_stmt_prepare($db, "INSERT INTO user_table (Name) VALUES (?)");
        @mysqli_stmt_bind_param($db,'s', $name);
        @mysqli_stmt_execute($db);
    }

    // Datenbankverbindung schließen
    @mysqli_stmt_close($db);
    @mysqli_close($link);
}


// save.php, Datenbankabfragen mit Prepared Statements
if(basename($_SERVER['PHP_SELF'])=="save.php") {
    
    // Variablen
    $Q1=$_POST['Q1']; 
    $Q2=$_POST['Q2']; 
    $Q3=$_POST['Q3']; 
    $Q4=$_POST['Q4']; 
    $Q5=$_POST['Q5']; 
    $datum=date('Y.m.d');

    // UserId bestimmen
    @mysqli_stmt_prepare($db, "SELECT Id FROM user_table WHERE Name=?");
    @mysqli_stmt_bind_param($db,'s', $name);
    @mysqli_stmt_execute($db);
    @mysqli_stmt_bind_result($db, $userId);
    @mysqli_stmt_fetch($db);

    // Daten in "survey_table" speichern
    @mysqli_stmt_prepare($db, "INSERT INTO survey_table (UserId, Datum, Q1, Q2, Q3, Q4, Q5) VALUES (?, ?, ?, ?, ?, ?, ?)");
    @mysqli_stmt_bind_param($db,'issssss', $userId, $datum, $Q1, $Q2, $Q3, $Q4, $Q5);        
    @mysqli_stmt_execute($db);

    // Datenbankverbindung schließen
    @mysqli_stmt_close($db);
    @mysqli_close($link);
}


// report.php, Prepared Statements nicht notwendig
if(basename($_SERVER['PHP_SELF'])=="report.php") {

    // Anzahl angemeldete Personen
    $angemeldetQuery=@mysqli_query($link, "SELECT COUNT(Id) FROM survey_table WHERE UserId!=1");
    $angemeldet=@mysqli_fetch_row($angemeldetQuery)['0'];
      
    // Anzahl anonyme Personen
    $anonymousQuery=@mysqli_query($link, "SELECT COUNT(Id) FROM survey_table WHERE UserId=1");
    $anonymous=@mysqli_fetch_row($anonymousQuery)['0'];
        
    // Gesamtanzahl an Personen
    $gesamtQuery=@mysqli_query($link, "SELECT COUNT(Id) FROM survey_table");
    $gesamt=@mysqli_fetch_row($gesamtQuery)['0'];

    // Datenbankverbindung schließen
    @mysqli_close($link);
}
?>