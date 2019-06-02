<?php
date_default_timezone_set('Europe/Brussels');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("scripts/database.php");

$sqlToonSessie = 
"SELECT ss.idsessie, ss.titel, ss.start, ss.omschrijving, ss.afbeelding, ss.zaalID, ss.sprekerID, 
(SELECT voornaam FROM sprekers sp INNER JOIN sprekers sp ON ss.sprekerID = sp.idsprekers WHERE sprekerID = ?) as voornaam,
(SELECT sp.naam FROM sprekers sp INNER JOIN sprekers sp ON ss.sprekerID = sp.idsprekers WHERE sprekerID = ?) as naam
FROM sessies ss INNER JOIN sprekers sp ON sp.idsprekers = ss.sprekerID 
WHERE idsessie = ?";

if(isset($_GET['id'])){
    $gekozenID = $_GET['id'];
}
else{
    $gekozenID = -1;
}

$stmtInfo = $mysqli->prepare($sqlToonSessie);

$stmtInfo->bind_param("i", $parID1);
    $parID1 = $gekozenID;

$stmtInfo->execute();
$resultInfo = $stmtInfo->get_result();
$rowinfospreker = $resultInfo->fetch_assoc();

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
        <div class="backbtn">
        <a href="overzicht_spreker.php"><button type="button" class="btn btn-secondary">Back</button></a>
        </div>
        <div id="sprekercard">
            <div class="row">
                <div class="col-4">
                    <?php
                    if($rowinfosessie['afbeelding']==null){
                        $spAfb = "placeholder.svg";
                    }
                    else if($rowinfosessie['afbeelding']=="26mm.jpg"){
                        $spAfb = "26m.jpg";
                    }
                    else{
                        $spAfb = $rowinfosessie['afbeelding'];
                    }
                    
                    $spLikes = $rowinfosessie['likes'];
                    $spID = $rowinfosessie['idsprekers'];
                    
                    print('<header>');
                    print('<img src="img/speakers/x500/'.$spAfb.'" class="img-fluid col-12"/>');
                    print('</header>');
                    print('<div class="row justify-content-end" id="buttns">');
                    print('<div class="col-8">');
                    print('<div class="row">');
                    print('<div class="buttn col-3 text-center">');
                    print("<a href='likecode.php?id=".$spID."'><i class='far fa-heart'></i></a>");
                    print('</div>');
                    print('<div class="buttn col-3 text-center">');
                    print("<a href='#facebook'><i class='fab fa-facebook-f'></i></a>");
                    print('</div>');
                    print('<div class="buttn col-3 text-center">');
                    print("<a href='#twitter'><i class='fab fa-twitter'></i></a>");
                    print('</div>');
                    print('</div>');
                    print('</div>');
                    print('<h5 class="col-3">'.$spLikes.' likes</h5>');
                    
                    print('</div>');
                    ?>
                </div>
                <div class="col-8">
                    <?php
                    $spNaam = $rowinfosessie['voornaam']." ".$rowinfosessie['naam'];
                    if(($rowinfosessie['lanidID']) == 1){
                        $spLand = "België";
                    }else if(($rowinfosessie['lanidID']) == 2){
                        $spLand = "Nederland";
                    }else if(($rowinfosessie['lanidID']) == 3){
                        $spLand = "Verenigd Koninkrijk";
                    }else if(($rowinfosessie['lanidID']) == 4){
                        $spLand = "Verenigde Staten";
                    }
                    $spBio = $rowinfosessie['bio'];
                    
                    print('<h1 class="col-12">'.$spNaam.'</h1>');
                    print('<h2 class="col-12">'.$spLand.'</h2><br />');
                    print('<br /><h4 class="col-12">Bio</h4>');
                    print('<p class="col-12">'.$spBio.'</p><br />');
                    print('<br /><h4 class="col-12">Socials</h4>');
                    print('<p class="col-12">'.$spBio.'</p><br />');
                    
                    ?>
                </div>
            </div>
        </div>
        </div>
        </div>
</main>

</body>