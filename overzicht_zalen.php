<?php
require_once("scripts/database.php");

$sqlSessies100 = "SELECT idsessie, titel, start, omschrijving, afbeelding, zaalID FROM sessies ss INNER JOIN zalen z ON ss.zaalID = z.idzalen WHERE ss.zaalID = 100";

if(!$resSessies100 = $mysqli->query($sqlSessies100)){
    echo "Oeps, een query foutje op DB voor opzoeken van sessies in zaalID 100";
    print("<p>Error: ".$mysqli->error."</p>");
    exit();
}


$sqlSessies101 = "SELECT idsessie, titel, start, omschrijving, afbeelding, zaalID FROM sessies ss INNER JOIN zalen z ON ss.zaalID = z.idzalen WHERE ss.zaalID = 101";

if(!$resSessies101 = $mysqli->query($sqlSessies101)){
    echo "Oeps, een query foutje op DB voor opzoeken van sessies in zaalID 101";
    print("<p>Error: ".$mysqli->error."</p>");
    exit();
}


$sqlSessies102 = "SELECT idsessie, titel, start, omschrijving, afbeelding, zaalID FROM sessies ss INNER JOIN zalen z ON ss.zaalID = z.idzalen WHERE ss.zaalID = 102";

if(!$resSessies102 = $mysqli->query($sqlSessies102)){
    echo "Oeps, een query foutje op DB voor opzoeken van sessies in zaalID 102";
    print("<p>Error: ".$mysqli->error."</p>");
    exit();
}


$sqlSessies103 = "SELECT idsessie, titel, start, omschrijving, afbeelding, zaalID FROM sessies ss INNER JOIN zalen z ON ss.zaalID = z.idzalen WHERE ss.zaalID = 103";

if(!$resSessies103 = $mysqli->query($sqlSessies103)){
    echo "Oeps, een query foutje op DB voor opzoeken van sessies in zaalID 103";
    print("<p>Error: ".$mysqli->error."</p>");
    exit();
}


$sqlSessies104 = "SELECT idsessie, titel, start, omschrijving, afbeelding, zaalID FROM sessies ss INNER JOIN zalen z ON ss.zaalID = z.idzalen WHERE ss.zaalID = 104";

if(!$resSessies104 = $mysqli->query($sqlSessies104)){
    echo "Oeps, een query foutje op DB voor opzoeken van sessies in zaalID 104";
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
                    <li class="nav-item">
                        <a class="nav-link" href="overzicht_spreker.php">Speakers</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="overzicht_zalen.php">Schedule <span class="sr-only">(current)</span></a>
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
        <main>
        <div class="container">
        <table id="zaal100" class="table table-striped">
        <thead>
            <tr>
                <th>Zaal 1</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $resSessies100->fetch_assoc()) {
                $sesTitle = $row['titel'];
                $sesStart = $row['start'];
                
                echo"<tr>";
                echo"<td>".$sesStart."</td>";
                echo"<td>".$sesTitle."</td>";
                echo"</tr>";
                echo"</tbody>";
            }
            ?>
        </table>

        <table id="zaal101" class="table table-striped">
        <thead>
            <tr>
                <th>Zaal 2</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $resSessies101->fetch_assoc()) {
                $sesTitle = $row['titel'];
                $sesStart = $row['start'];
                
                echo"<tr>";
                echo"<td>".$sesStart."</td>";
                echo"<td>".$sesTitle."</td>";
                echo"</tr>";
                echo"</tbody>";
            }
            ?>
        </table>

        <table id="zaal102" class="table table-striped">
        <thead>
            <tr>
                <th>Zaal 3</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $resSessies102->fetch_assoc()) {
                $sesTitle = $row['titel'];
                $sesStart = $row['start'];
                
                echo"<tr>";
                echo"<td>".$sesStart."</td>";
                echo"<td>".$sesTitle."</td>";
                echo"</tr>";
                echo"</tbody>";
            }
            ?>
        </table>

        <table id="zaal103" class="table table-striped">
        <thead>
            <tr>
                <th>Zaal 4</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $resSessies103->fetch_assoc()) {
                $sesTitle = $row['titel'];
                $sesStart = $row['start'];
                
                echo"<tr>";
                echo"<td>".$sesStart."</td>";
                echo"<td>".$sesTitle."</td>";
                echo"</tr>";
                echo"</tbody>";
            }
            ?>
        </table>

        <table id="zaal104" class="table table-striped">
        <thead>
            <tr>
                <th>Zaal 5</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $resSessies104->fetch_assoc()) {
                $sesTitle = $row['titel'];
                $sesStart = $row['start'];
                
                echo"<tr>";
                echo"<td>".$sesStart."</td>";
                echo"<td>".$sesTitle."</td>";
                echo"</tr>";
                echo"</tbody>";
            }
            ?>
        </table>


        </div>
        </main>


</body>





</html