<?php
function box4($belopp=0){

include "db_pdo.php";
$out = "";
//Definera frågan till databasen
$sql=$pdo->prepare("SELECT * FROM bokning INNER JOIN passagerare ON bokning.passagerarid = passagerare.pid WHERE pris = $belopp");

//Exekvera frågan till databasen
$sql->execute();

//Hämta alla objekt från databasen som svar på sql-frågan och lagra i en array
$bokningArray=$sql->fetchAll(PDO::FETCH_OBJ);

//Skapa tabell
$out.='<table>';

//Skapa tabellens första rad och rubriker
$out.='<tr><th>PassagerarID:</th><th>Förnamn:</th><th>Efternamn:</th><th>Kreditkortsnummer:</th><th>Pris:</th></tr>';

//går igenom arrayen och skriver ut rätt info på rätt plats i tabellen
foreach ($bokningArray as $belopp) {
  $out.='<tr>';
  $out.='<td>';
  $out.=$belopp->passagerarid;
  $out.='</td>';
  $out.='<td>';
  $out.=$belopp->fornamn;
  $out.='</td>';
  $out.='<td>';
  $out.=$belopp->efternamn;
  $out.='</td>';
  $out.='<td>';
  $out.=$belopp->kredikortnr;
  $out.='</td>';
  $out.='<td>';
  $out.=$belopp->pris;
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
