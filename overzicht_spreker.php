<?php
date_default_timezone_set('Europe/Brussels');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once("scripts/database.php");


$sqlBrowseSprekers = "SELECT DISTINCT idsprekers, voornaam, naam, sp.afbeelding, lanidID, (SELECT DISTINCT likecounter FROM sessies ss INNER JOIN sprekers sp ON ss.sprekerID = sp.idsprekers) as likes FROM sprekers sp INNER JOIN sessies ss ON sp.idsprekers = ss.sprekerID";

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
            <a class="navbar-brand" href="index.php">
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
                <div class="col-1 offset-1"><a href="#">Newest</a></div>
                <div class="col-1"><a href="#">Most likes</a></div>
                <div class="col-1"><a href="#">Most popular</a></div>
            </div>
        </section>
</header>
<main>
    <div class="container">
        <div class="row">
            <?php
                while ($row = $resBrowseSprekers->fetch_assoc()) {
                    $spVoornaam = $row['voornaam'];
                    $spNaam = $row['naam'];
                    $spID = $row['idsprekers'];
                    $spLikes = $row['likes'];

                    if($row['afbeelding']==null){
                        $spAfbeelding = "placeholder.svg";
                    }
                    else if($row['afbeelding']=="26mm.jpg"){
                        $spAfbeelding = "26m.jpg";
                    }
                    else{
                        $spAfbeelding = $row['afbeelding'];
                    }

                    print('<article class="col-3" id="spreker">');
                        print('<div class="infocard">');
                        print('<header>');
                            print('<a href="detail_spreker.php?id=' . $spID . '">');
                            
                                print('<img src="img/speakers/x250/' . $spAfbeelding . '" class="img-fluid w-100" />');
                            
                            print('</a>');
                            print('</header>');
                            print('<div id="sprekercard" class="row">');
                            if($spNaam == "Little Miss Robot Ghent"){
                                print('<h5 class="col-8">'.$spVoornaam.''.$spNaam.'</h5>');
                            }
                            else{
                                print('<h5 class="col-8">'.$spVoornaam.'<br />'.$spNaam.'</h5>');
                            }
                            print('<h5 class="col-4"><br />'.$spLikes.' likes</h5>');
                            print('</div>');
                            print('<div class="row">');
                                print('<div class="buttn col-2 text-center">');
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
<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h4>Footer menu one</h4>
                    <hr />
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum maiores nisi pariatur nobis mollitia tempore molestiae. Dicta, accusantium repellendus. Veniam aperiam quo laudantium hic modi vitae doloremque animi reiciendis optio!</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h4>Footer menu two</h4>
                    <hr />
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum maiores nisi pariatur nobis mollitia tempore molestiae. Dicta, accusantium repellendus. Veniam aperiam quo laudantium hic modi vitae doloremque animi reiciendis optio!</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h4>Footer menu three</h4>
                    <hr />
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum maiores nisi pariatur nobis mollitia tempore molestiae. Dicta, accusantium repellendus. Veniam aperiam quo laudantium hic modi vitae doloremque animi reiciendis optio!</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h4>Footer menu four</h4>
                    <hr />
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum maiores nisi pariatur nobis mollitia tempore molestiae. Dicta, accusantium repellendus. Veniam aperiam quo laudantium hic modi vitae doloremque animi reiciendis optio!</p>
                    <div class="row text-center" id="contact">
                        <div class="col-4"><a href="#"><i class="fab fa-facebook-square"></i></a></div>
                        <div class="col-4"><a href="#"><i class="fab fa-linkedin"></i></a></div>
                        <div class="col-4"><a href="#"><i class="fab fa-twitter-square"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
