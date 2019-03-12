<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
  <?php
    include "db_pdo.php";
  if(isset($_POST['create'])){
    //Hämta och lagra datan från formuläret.
    $skapatLand = $_POST['create_land'];
    $skapatKod = $_POST['create_kod'];

    //Skapa och förbered en sql fråga
    $sql=$pdo->prepare("INSERT INTO land (airport, land) VALUES ('$skapatKod', '$skapatLand')");
    //Exekvera frågan till databasen
    $sql->execute();
    //Skicka användaren till index.php
    header("Location: index.php");
  }
  ?>

  <?php
  //Om INTE update-knappen har aktiverats dvs om du kommer från startsidan
  if(!isset($_POST['create'])){
  //Sätt det som skickades med URL:n till $landID
  $landID=$_GET['create'];
  $kodID=$_GET['editb'];

  }

  ?>

  <h3>Redigera land</h3>
      <form action="create.php" method="post">
        Land:           <input type="text" name="create_land"><br>
        Flygplatskod:   <input type="text" name="create_kod"><br>
        <input type="submit" name="create" value="Skapa">
      </form>

</body>
</html>
