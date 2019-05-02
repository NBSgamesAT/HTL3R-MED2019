<html>
<head><title></title></head>
<body>
<?php

if(isset($_POST["vorname"]) && isset($_POST["nachname"]) && isset($_POST["passwort"]) && isset($_POST["gender"]) && isset($_POST["geburtsdatum"]) ){
    
    $user = $_POST["vorname"] . " " . $_POST["nachname"];
    $pw = $_POST["passwort"];
    $geb = $_POST["geburtsdatum"];
    $geschlecht = $_POST["gender"];
    $ort = $_POST["ort"];
    
    $db = new PDO("mysql: host=nbsgames.at; dbname=MyNextEvent", "BF", "bachschwellfamily");
    $state = "INSERT INTO benutzer(Benutzername,Passwort,Geburtsdatum,FK_Geschlecht_ID,FK_Rechte_ID) 
    VALUES (:user, :password, :geb, :geschlecht, 2)";
    $execute = $db->prepare($state);
    $execute->bindParam(':user', $user);
    $execute->bindParam(':password', $pw);
    $execute->bindParam(':geb', $geb);
    $execute->bindParam(':geschlecht', $geschlecht);
    $execute->execute();
    
    
}

?>
</body>
</html>