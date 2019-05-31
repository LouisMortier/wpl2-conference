<?php
require_once("scripts/database.php");

// //query voor mijn eigen playlists gaan maken
// $sqlMijnPlaylist = "SELECT playlistid, titel from savedplaylist s INNER JOIN playlist p ON s.playlistid = p.idplaylist";

//query voor alle playlists te gaan maken
$sqlBrowseSprekers = "SELECT DISTINCT idsprekers, voornaam, naam, sp.afbeelding, bio, lanidID FROM sprekers sp INNER JOIN sessies ss ON sp.idsprekers = ss.sprekerID";


// //query van mijn playlist uitvoeren om in NAV te plaatsen
// if(!$resNAVMijnplaylist = $mysqli->query($sqlMijnPlaylist)){
//     echo "Oeps, een query foutje op DB voor opzoeken eigen playlist";
//     print("<p>Error: ".$mysqli->error."</p>");
//     exit();
// }

//query uitvoeren voor alle playlists om in centrum pagina te plaatsen
//opvangen van de fouten


if(!$resBrowseSprekers = $mysqli->query($sqlBrowseSprekers)){
    echo "Oeps, een query foutje op DB voor opzoeken alle playlist";
    print("<p>Error: ".$mysqli->error."</p>");
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <title>Multi Mania</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lalezar&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">
                <img src="img/multilogoicon.svg" width="100" height="100" class="d-inline-block align-center" alt="">
                <span class="brandtitle">MULTI MANIA</span>
              </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="overzicht_spreker.php">Speakers <span class="sr-only">(current)</span></a>
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
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn   my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </nav>
        <section id="order">
            <div class="row">
                <div class="col-1 offset-1">Newest</div>
                <div class="col-1">Most likes</div>
                <div class="col-1">Most popular</div>
            </div>
        </section>
</header>
<main>
    <div class="container">
        <div class="row">
            <?php
                //zolang er resultaten zijn uit de query, steek je ze in de array 'row'
                while ($row = $resBrowseSprekers->fetch_assoc()) {
                    //eerst tijdelijke vars opvullen
                    $spVoornaam = $row['voornaam'];
                    $spNaam = $row['naam'];
                    $spBio = $row['bio'];
                    $spID = $row['idsprekers'];

                    if($row['afbeelding']==null){
                        $spAfbeelding = "500.png";
                    }
                    else if($row['afbeelding']=="26mm.jpg"){
                        $spAfbeelding = "26m.jpg";
                    }
                    else{
                        $spAfbeelding = $row['afbeelding'];
                    }

                    print('<article class="col-3" id="spreker">');
                        print('<div class="infocard">');
                            print('<a href="playlist.php?idplaylist=' . $spID . '">');
                            print('<header>');
                                print('<img src="img/speakers/x500/' . $spAfbeelding . '" class="img-fluid w-100" />');
                            print('</header>');
                            print('</a>');
                            print('<h5>'.$spVoornaam.' '.$spNaam.'</h5>');
                            print('<section>' . $spBio . '</section>');
                            print('<div class="row">');
                                print('<div class="col-2 text-center">');
                                    print("<a href='likecode.php?id=".$spID."'><i class='far fa-heart'></i></a>");
                                print('</div>');
                                print('<div class="col-9 offset-1">');
                                    print("<a href='detail_spreker.php?id=".$spID."'>More info</a>");
                                print('</div>');
                            print('</div>');
                        print('</div>');
                    print('</article>');
                }
            ?>
        </div>
    </div>
</main>
</body>
</html>
