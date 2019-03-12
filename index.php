<!--Mediateknik B Webproduktion Fortsättning 2019-03-08
    Linda Stenvi Staf 900814
    Jens Wallin 840629-->

    <!--Vi har utgått ifrån materialet som följde med instruktionerna för Labb2.
        I index.php har vi includerat de 4 olika boxarnas filer, box1.php, box2.php, osv.
        så att det går att hämta funktioner och data som finns i dessa filer. Detta är gjort inom phptaggar.
        Inom de vanliga html taggarna har vi ritat upp strukturen för indexsidan med de olika boxarna
        anropade i en kvadratisk form.
        I varje boxfunktion har vi inkluderat db_pdo.php som har anslutningsinformationen till databasen.
        Det finns också sql-kod i boxfunktionerna som använder anslutningsinformationen så att datan från
        databasen går att skapa, läsa, ändra, och ta bort poster i tabeller på databasen. Detta görs på
        olika php-sidor som har som uppgift att skapa, läsa, ändra, och ta bort poster i databasen.

      -->

<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="lab1.css">
    <!-- Labb2 MTB 2019 (RD)-->

  </head>
  <body>

    <?php
        //Includefiler för att inkludera kod från de fyra boxarna.
        include_once "box1.php";
        include_once "box2.php";
        include_once "box3.php";
        include_once "box4.php";
    ?>

    <div id="layout"> <!-- denna görs för att kunna styra layouten i css. -->

        <div id="header"> <!--denna görs för att kunna dela upp och specifiera
           den i gridlayouten i css. -->

          <header>
              <h1>FlightAdmin</h1>
          </header>

        </div>

       <div id="main">
            <!-- Ruta 1 (vänsterövre)-->
              <div class="square">
                <div class="content">
                  <?php
                  echo Box1();
                  ?>
                </div>
              </div>

            <!-- Ruta 2 (högerövre) -->
            <div class="square">
                <div class="content">
                  <?php
                  echo Box2();
                ?>
                </div>
            </div>

            <!-- Ruta 3 (nedrevänster) -->
            <div class="square">
                <div class="content">
                  <?php
                    echo Box3();
                  ?>
                </div>
            </div>
            <!-- Ruta 4 (nedrehöger) -->
              <div class="square">
                    <div class="content">
                      Skriv in belopp och visa passagerare och kreditkortsnummer.
                      <form action="index.php" method="post">
                         Belopp: <input type="text" name="belopp"><br>
                         <input type="submit" id="submit" name="submit" value="Sök">
                      </form>
                        <?php

                        if(isset($_POST['submit'])){ //om submitknappen är tryckt
                          $belopp = $_POST['belopp']; //lägg inskrivet belopp i $belopp
                          echo box4($belopp); //kör box4 funktionen och skicka med $belopp
                        }

                        ?>
                    </div>
              </div>
        </div>
        
  </body>
</html>
