<?php
function box1(){
include "db_pdo.php";
$out = "";
//Box 1 --->Här nedan bör du skriva din kod--->
//Frågan till databasen, den hämtar all info från avgang där datumen är 2017-09-20 och sorterar
//efter tid och sedan väljer de 4 första med start på plats 0 i arrayen
$sql=$pdo->prepare('SELECT * FROM avgang where datum = "2017-09-20" ORDER BY tid ASC LIMIT 0, 4');

//Exekvera frågan till databasen
$sql->execute();

//Hämta alla objekt från databasen som svar på sql-frågan och lagra i en array
$avgangar=$sql->fetchAll(PDO::FETCH_OBJ);

//Skapa tabell
$out.='<table>';

//Skapa tabellens första rad och rubriker
$out.='<tr><th>Flygnr:</th><th>Destination:</th><th>Avgång:</th><th>Gate:</th></tr>';

//går igenom arrayen och skriver ut rätt info på rätt plats i tabellen
foreach ($avgangar as $avgang) {
  $out.='<tr>';
  $out.='<td>';
  $out.=$avgang->flygnr;
  $out.='</td>';
  $out.='<td>';
  $out.=$avgang->airport;
  $out.='</td>';
  $out.='<td>';
  $out.=$avgang->tid;
  $out.='</td>';
  $out.='<td>';
  $out.=$avgang->gate;
  $out.='</td>';
  $out.='</tr>';
}

//Stäng tabellen
$out.='</table>';

//Returnerna $out till huvudkoden(index.php)
return $out;
//--> efter denna rad ska du inte lägga till eller redigera kod--->
}
?>
