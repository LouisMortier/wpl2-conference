<?php
date_default_timezone_set("Europe/Brussels");
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include('../scripts/database.php');

// print("<pre>");
// print_r($_POST);
// print("</pre>");

    // maak een statement en bind de variabelen
    $stmt = $mysqli->prepare("INSERT INTO `sessies`( `titel`, `start`, `omschrijving`, `afbeelding`, `zaalID`, `sprekerID`) VALUES (?,?,?,?,?,?)");

    if($mysqli->error){
        echo"<p>prepared statement failed: ".$mysqli->error."</p>";
        die;
    }

    $stmt->bind_param("sissii",$sesTitel ,$sesStart ,$sesBio ,$sesAfb ,$sesZaalID ,$sesSprekerID);

    $sesTitel = $_POST['titel'];
    $sesStart = $_POST['start'];
    $sesBio = $_POST['bio'];
    $sesAfb = $_POST['afb'];
    $sesZaalID = $_POST['zaal'];
    $sesSprekerID = $_POST['spreker'];

    $stmt->execute();

    $affected_rows = $stmt->affected_rows;

    if(count($stmt->error_list)){
        print("<pre>");
        print_r($stmt->error_list);
        print("</pre>");
    }else{
        if($affected_rows>0){
            header("location: sessie.php");
        }else{
            echo "Error: U hebt deze pagina niet bereikt via de juiste verwijzing.";
        }
      }
    $stmt->close();
      
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Multi Mania</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
      integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lalezar&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style/style.css" />
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">
          <img src="img/multilogoicon.svg" width="100" height="100" class="d-inline-block align-center" alt="" />
          <span class="brandtitle">MULTI MANIA</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn   my-2 my-sm-0" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>
      </nav>
    </header>
  </body>
</html>