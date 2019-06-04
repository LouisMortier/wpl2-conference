<?php
date_default_timezone_set('Europe/Brussels');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("scripts/database.php");

$sqlToonSessie = 
"SELECT ss.idsessie, ss.titel, ss.start, ss.omschrijving, ss.afbeelding, ss.zaalID, ss.sprekerID, 
(SELECT sp.voornaam FROM sprekers sp INNER JOIN sessies ss ON ss.sprekerID = sp.idsprekers WHERE ss.idsessie = ?) as voornaam,
(SELECT sp.afbeelding FROM sprekers sp INNER JOIN sessies ss ON ss.sprekerID = sp.idsprekers WHERE ss.idsessie = ?) as afb,
(SELECT sp.naam FROM sprekers sp INNER JOIN sessies ss ON ss.sprekerID = sp.idsprekers WHERE ss.idsessie = ?) as naam
FROM sessies ss INNER JOIN sprekers sp ON sp.idsprekers = ss.sprekerID 
WHERE ss.idsessie = ?";

if(isset($_GET['id'])){
    $gekozenID = $_GET['id'];
}
else{
    $gekozenID = -1;
}

$stmtInfo = $mysqli->prepare($sqlToonSessie);

$stmtInfo->bind_param("iiii", $parID1, $parID2, $parID3, $parID4);
    $parID1 = $gekozenID;
    $parID2 = $gekozenID;
    $parID3 = $gekozenID;
    $parID4 = $gekozenID;


$stmtInfo->execute();
$resultInfo = $stmtInfo->get_result();
$rowinfosessie = $resultInfo->fetch_assoc();

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
            <li class="nav-item">
              <a class="nav-link" href="admin/sessie.php">ADMIN</a>
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
        <a href="overzicht_zalen.php"><button type="button" class="btn btn-secondary">Back</button></a>
        </div>
        <div id="card">
            <div class="row">
                    <?php
                    if($rowinfosessie['afbeelding']==null){
                        $ssAfb = "banner_img_04.png";
                    }

                    if($rowinfosessie['zaalID']==100){
                      $ssRoom = "Pixel 1 - Auditorium";
                    }
                    else if($rowinfosessie['zaalID']==101){
                      $ssRoom = "Pixel 2";
                    }else if($rowinfosessie['zaalID']==102){
                      $ssRoom = "Pixel 3";
                    }else if($rowinfosessie['zaalID']==103){
                      $ssRoom = "Pixel 4";
                    }else if($rowinfosessie['zaalID']==104){
                      $ssRoom = "Pixel 5";
                    }


                    $ssNaam = $rowinfosessie['voornaam']." ".$rowinfosessie['naam'];
                    $ssID = $rowinfosessie['idsessie'];
                    $ssTitle = $rowinfosessie['titel'];
                    $ssStart = $rowinfosessie['start'];
                    $ssBio = $rowinfosessie['omschrijving'];

                    
                    print('<section id="sesheader" class="col-12">');
                    print('<div>');
                    print('<h1>'.$ssTitle.'</h1>');
                    print('<h2>'.$ssNaam.'</h2>');
                    print('</div>');
                    print('</section>');

                    print('<section id="sesmain" class="col-12">');
                    print('<div class="row">');
                    print('<div class="col-6 offset-6 text-right" id="sesbio">');
                    print('<h4>'.$ssRoom.', '.$ssStart.'</h4>');
                    print('<p>'.$ssBio.'</p>');
                    print('<p>'.$ssBio.'</p>');
                    print('</div>');
                    print('<div class="col-12" id="sesafb">');
                    print('<img src="img/sessions/'.$ssAfb.'" class="img-fluid"/>');
                    print('');
                    print('</div>');
                    print('</div>');
                    print('</section>');

                    
                    ?>
                </div>
            </div>
        </div>
        </div>
        </div>
</main>

</body>