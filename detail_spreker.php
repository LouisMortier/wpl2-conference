<?php
date_default_timezone_set('Europe/Brussels');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("scripts/database.php");
if(isset($_GET['id'])){
}
$sqlToonSpreker = "SELECT idsprekers, voornaam, naam, sp.afbeelding, bio, lanidID FROM sprekers sp INNER JOIN sessies ss ON sp.idsprekers = ss.likecounter WHERE idsprekers = '?'";


if(!$resToonSpreker = $mysqli->query($sqlToonSpreker)){
    echo "Oeps, een query foutje op DB voor opzoeken gekozen spreker";
    print("<p>Error: ".$mysqli->error."</p>");
    exit();
}



$stmtSpreker = $mysqli->prepare($sqlToonSpreker);

    $stmtSpreker->execute();

    $resultSpreker = $stmtSpreker->get_result();

    $rowSpreker = $resultSpreker->fetch_assoc();




// if(isset($_GET["id"])==true){
//     $sqlToonSpreker = "SELECT idsprekers, voornaam, naam, sp.afbeelding, bio, lanidID FROM sprekers sp INNER JOIN sessies ss ON sp.idsprekers = ss.sprekerID";

// if(!$resToonSpreker = $mysqli->query($sqlToonSpreker)){
//     echo "Oeps, een query foutje op DB voor opzoeken alle playlist";
//     print("<p>Error: ".$mysqli->error."</p>");
//     exit();
// }
// }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Multi Mania</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
      integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Lalezar&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style/style.css" />
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">
          <img
            src="img/multilogoicon.svg"
            width="100"
            height="100"
            class="d-inline-block align-center"
            alt=""
          />
          <span class="brandtitle">MULTI MANIA</span>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="overzicht_spreker.php">Speakers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="overzicht_zalen.php">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sponsors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tickets</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input
              class="form-control mr-sm-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn   my-2 my-sm-0" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>
      </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <?php
                    if(isset($_GET['id'])){
                    print($rowSpreker['sp.afbeelding']);
                    print("<p>HELP</p>");
                    }
                    ?>
                </div>
            </div>
        </div>
</main>

</body>