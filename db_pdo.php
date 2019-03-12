<?php
//PDO anslutning till databas
try{
    // 127.0.0.1 är localhost, databasen, användarnamn, lösenord
    //Redigera nedanför denna rad --->
    $pdo=new PDO('mysql:host=mariadb.sh.se;dbname=19jewa','19jewa','Easel tree reach Chili');
    //Redigera inte efter denna rad<---
  } catch (PDOException $e){
    die('Kan inte ansluta till databasen. Kontrollera anslutningsinformationen i filen <b><i>db_pdo.php</i></b>');
  }
 ?>
