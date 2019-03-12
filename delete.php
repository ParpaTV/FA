<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<?php
  //inkludera databasanropet som ansluter till databasen
  include "db_pdo.php";
  //Hämta querystring värdet
  $landID=$_GET['land'];
  //Skapa och förbered en sql fråga
  $sql=$pdo->prepare("DELETE FROM land WHERE land='$landID'");
  //Exekvera frågan till databasen
  $sql->execute();
  //Skicka användaren till index.php
  header("Location: index.php");
  die();
?>

</body>

</html>
