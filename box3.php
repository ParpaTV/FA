<?php
function box3(){
include "db_pdo.php";
$out = "";
//Box 3 --->Här nedan bör du skriva din kod--->
//Frågan till databasen, den hämtar all info från avang där Flygplatsbeteckningen och land
// för 4 st valfria länder och sortera i fallande ordning efter landsnamet.
$sql=$pdo->prepare('SELECT * FROM passagerare WHERE klass = "ekonomi" LIMIT 0,4');

//Exekvera frågan till databasen
$sql->execute();

//Hämta alla objekt från databasen som svar på sql-frågan och lagra i en array
$passagerarnamn=$sql->fetchAll(PDO::FETCH_OBJ);

//Skapa tabell
$out.='<table>';

//Skapa tabellens första rad och rubriker
$out.='<tr><th>Förnamn:</th><th>Efternamn:</th><th>Klass:</th><th>Sittplats:</th></tr>';

//går igenom arrayen och skriver ut rätt info på rätt plats i tabellen
foreach ($passagerarnamn as $passagerare) {
  $out.='<tr>';
  $out.='<td>';
  $out.=$passagerare->fornamn;
  $out.='</td>';
  $out.='<td>';
  $out.=$passagerare->efternamn;
  $out.='</td>';
  $out.='<td>';
  $out.=$passagerare->klass;
  $out.='</td>';
  $out.='<td>';
  $out.=$passagerare->sittplats;
  $out.='</td>';
  $out.='</tr>';
}

//Stäng tabellen
$out.='</table>';

//Returnerna $out till huvudkoden(index.php)
return $out;
//--> efter denna rad ska du inte lägga till eller redigera kod--->
//--> efter denna rad ska du inte lägga till eller redigera kod--->
}
?>
