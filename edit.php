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
      //hämta datan från länken så att rätt tabellpost redigeras och sätt in dem i variablar
      $landID=$_GET['land'];
      $kodID=$_GET['airport'];

  if(isset($_POST['update'])){
    //Hämta och lagra datan från formuläret.
    $uppdateratLand = $_POST['update_land'];
    $uppdateradKod = $_POST['update_kod'];
    $landID = $_POST['id'];


    //Skapa och förbered en sql fråga
    $sql=$pdo->prepare("UPDATE land SET airport='$uppdateradKod', land='$uppdateratLand' WHERE land='$landID'");
    //Exekvera frågan till databasen
    $sql->execute();
    //Skicka användaren tillbaka till index.php
    header("Location: index.php");
    die();
  }
  ?>
  //Skriv ut formuläret för att uppdatera och skicka datan via POST i vad vi har valt att kalla update
  <h3>Redigera land</h3>
      <form action="edit.php" method="post">
        Land:         <input type="text" name="update_land" value="<?php echo $landID?>"><br>
        Flygplatskod: <input type="text" name="update_kod" value="<?php echo $kodID?>"><br>
              <input type="hidden" name="id" value="<?php echo $landID?>">
              <input type="submit" name="update" value="Ändra">
      </form>

</body>
</html>
