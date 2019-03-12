<?php
//Skapa en funktion som anropas från index.php
function box2(){
  //inkludera databasanropet
include "db_pdo.php";
$out = "";

//Frågan till databasen, den hämtar all info från land där Flygplatsbeteckningen och land finns. Sorterat fallande efter land
$sql=$pdo->prepare('SELECT * FROM land ORDER BY land ASC');

//Exekvera frågan till databasen
$sql->execute();

//Hämta alla objekt från databasen som svar på sql-frågan och lagra i en array
$landDBArray=$sql->fetchAll(PDO::FETCH_OBJ);

//Skapa tabell
$out.='<table>';

//Skapa tabellens rubrikrad
$out.='<tr><th>Land:</th><th>Kod:</th><th>Åtgärd</th></tr>';

//Går igenom arrayen och skriver ut rätt info på rätt plats i tabellen
foreach ($landDBArray as $landID) {
$out.='<tr>';
$out.='<td>';
$land=$landID->land; //här lagras landet så att vi kan använda den datan när vi länkar
$out.=$landID->land; //här visas landet från databasarrayen
$out.='</td>';
$out.='<td>';
$airport=$landID->airport; //här Flygplatskoden så att vi kan använda den datan när vi länkar
$out.=$landID->airport;//här visas landets Flygplatskod från databasarrayen
$out.='</td>';
$out.='<td>';
$out.="<a href='edit.php?land=$land&airport=$airport'>Redigera</a>"; //Här skrivs länken till redigeringssidan ut för det landet som är på den raden och skickar med datan för den raden
$out.='</td>';
$out.='<td>';
$out.="<a href='delete.php?land=$land'>Ta bort</a>";//Här skrivs länken till deletesidan ut för det landet som är på den raden och skickar med datan för den raden
$out.='</td>';
$out.='</tr>';
}

//Stäng tabellen
$out.='</table>';


$out.="<a href='create.php'>Lägg till nytt land</a>";//Här skrivs länken till skapa ny post i databasen ut

//Returnerna $out till huvudkoden(index.php)
return $out;
}
?>
