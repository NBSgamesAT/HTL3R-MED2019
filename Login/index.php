<?php
session_start();
$SHOW_ERROR = false;
if(isset($_POST["submit"]) && $_POST["submit"] === "LOGIN"){
  if(isset($_POST["benutzername"]) && $_POST["benutzername"] != "" && isset($_POST["passwort"]) && $_POST["passwort"] != ""){
    $benutzername = $_POST["benutzername"];
    $passwort = $_POST["passwort"];
                
    $pdo = new PDO("mysql:host=nbsgames.at;dbname=MyNextEvent", "BF", "bachschwellfamily");
    $sql = "SELECT * FROM benutzer WHERE Benutzername = :benutzername AND Passwort = :passwort;";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":benutzername", $benutzername);
    $statement->bindParam(":passwort", $passwort);
                
    if($statement->execute()) {
    
      if($statement->fetch(PDO::FETCH_ASSOC) != FALSE) {
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $benutzername;
        header("Location: /index.php");
      } else {
        $_SESSION["logged_in"] = false;
        echo "<p>Die Zugangsdaten sind falsch!<p/>";
      }
    } 
  }
  else{
    $SHOW_ERROR = true;
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>MyNextEvent LOGIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3">
          <?php
            if($SHOW_ERROR){
              echo "<p>YOU MUST TYPE IN YOUR USERNAME AND PASSWORD</p>";
            }
          ?>
          <form method="POST">
            <input name="benutzername" placeholder="Benutzername" type="text"><br>
            <input name="passwort" placeholder="Passwort" type="password"><br>
            <input name="submit" type="Submit" value="LOGIN">
          </form>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
    <script src="/javascript/main.js"></script>
  </body>
</html>
