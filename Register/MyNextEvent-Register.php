<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<title>Formular</title>
	<meta name="description" content="Kurzbeschreibung">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="/css/main.css" rel="stylesheet">
	<link href="/css/responsive.css" rel="stylesheet">
</head>

<body>

            <?php
            
            if(isset($_POST["benutzername"]) && isset($_POST["password"]) && isset($_POST["geburtsdatum"]) && isset($_POST["gender"]) && isset($_POST["ort"]) ){
                
                $user = $_POST["benutzername"];
                $pw = $_POST["password"];
                $geb = $_POST["datum"];
                $geschlecht = $_POST["gender"];
                $ort = $_POST["ort"];
                
                $db = new PDO("mysql:host=nbsgames.at;dbname=MyNextEvent", "BF", "bachschwellfamily");
                $state = "INSERT INTO benutzer(Benutzername,Passwort,Geburtsdatum,FK_Geschlecht_ID,FK_Rechte_ID) 
                VALUES (:user, :password, :geb, :geschlecht, 2)";
                $execute = $db->prepare($state);
                $execute->bindParam(':user', $user);
                $execute->bindParam(':password', $pw);
                $execute->bindParam(':geb', $geb);
                $execute->bindParam(':geschlecht', $geschlecht);
                $execute->execute();

				if (null == $user ) {
					echo "Benutzername: Pflichtfeld nicht eingegeben!";
				} else {
					echo "Benutzername: " .$user;
				}
				echo "</br>";
				if (null == $pw ) {
					echo "Passwort: Pflichtfeld nicht eingegeben!";
				} else {
					echo "Passwort: " .$pw;
				}
				echo "</br>";
					if ($geschlecht == 'Mann') {
						echo "Geschlecht: ".$geschlecht;
					}
					else {
						echo "Geschlecht: ".$geschlecht;
					}
				echo "</br>";
				echo "Ort: ".$ort;
				echo "</br>";
				if (is_numeric($_POST['Tag']) == true && is_numeric($_POST['Monat']) == true && is_numeric($_POST['Jahr']) == true)	{
						echo "Geburtsdatum: ".$_POST['Tag']. "-" .$_POST['Monat']. "-" .$_POST['Jahr'];
				} else {
					echo "Datum: Pflichtfeld nicht eingegeben oder falscher Wert!";
                }
            }
			?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="/javascript/main.js"></script>
</body>
</html>
