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
				echo '<pre>';
				print_r($_POST);
				echo '</pre>';
				
				if (!isset($_POST['agb'])) {
					echo "Sie müssen unserer AGB zustimmen! </br></br>";
				} else {
					echo "Sie haben unserer AGB zugestimmt. </br></br>";
				}
				
				echo "Folgende Werte wurden eingegeben: </br></br>";
				
				switch ($_POST['titel']) {
					case 'doc':
					echo "Titel: Dr. </br>";
					break;
					case 'mag':
					echo "Titel: Mag. </br>";
					break;
					case 'dipl':
					echo "Titel: DI. </br>";
					break;
					case 'ohne':
					echo "Titel: </br>";
					break;
					default;
					break;
				}
				if (null == ($_POST['vorname']) ) {
					echo "Vorname: Pflichtfeld nicht eingegeben!";
				} else {
					echo "Vorname: " .$_POST['vorname'];
				}
				echo "</br>";
				if (null == ($_POST['nachname']) ) {
					echo "Nachname: Pflichtfeld nicht eingegeben!";
				} else {
					echo "Nachname: " .$_POST['nachname'];
				}
				echo "</br>";
				if (isset($_POST['gender'])) {
					if ($_POST['gender'] == 'Mann') {
						echo "Geschlecht: ".$_POST['gender'];
					} 
					else {
						echo "Geschlecht: ".$_POST['gender'];
					} 
				} 
				else {
					echo "Geschlecht: Pflichtfeld nicht eingegeben!";
				}
				echo "</br>";
				echo "PLZ: ".$_POST['plz'];
				echo "</br>";
				echo "Ort: ".$_POST['ort'];
				echo "</br>";
				echo "Straße: ".$_POST['straße'];
				echo "</br>";
				echo "Tel.Nr.: ".$_POST['tel'];
				echo "</br>";
				if (is_numeric($_POST['Tag']) == true && is_numeric($_POST['Monat']) == true && is_numeric($_POST['Jahr']) == true)	{
					if (checkdate($_POST['Tag'], $_POST['Monat'], $_POST['Jahr']) == true) {
						echo "Geburtsdatum: ".$_POST['Jahr']. "-" .$_POST['Monat']. "-" .$_POST['Tag'];
					} 
					else {
						echo "Geburtsdatum: Pflichtfeld nicht eingegeben oder ein falsches Datum angegeben!";
					} 
				}
				else {
					echo "Geburtsdatum: Pflichtfeld nicht eingegeben oder ein falsches Datum angegeben!";
				}
				echo "</br>";
				echo "Anmerkung: ".$_POST['besondere'];
				echo "</br>";
				echo "Sprache: ";
				if (isset($_POST['englisch'])) {
					echo "Englisch ";
				}
				if (isset($_POST['deutsch'])) {
					echo "Deutsch ";
				}
				if (isset($_POST['franzoesisch'])) { //WARUM FRANZÖSISCH?
					echo "Französisch ";
				}
				echo "</br>";
				echo "</br>";
				if (!isset($_POST['newsletter'])) {
					echo "Sie wollen keinen Newsletter zugeschickt bekommen.";
				} else {
					echo "Sie wollen unseren Newsletter zugeschickt bekommen.";
				}
			?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
	<script src="/javascript/main.js"></script>
</body>
</html>
