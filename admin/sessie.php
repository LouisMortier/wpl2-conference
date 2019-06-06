<?php
date_default_timezone_set("Europe/Brussels");
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require('../scripts/database.php');

$sql = "SELECT idsessie, titel, start, omschrijving, afbeelding, zaalID, sprekerID FROM sessies";
if (!$result = $mysqli->query($sql)) {
    echo "Sorry, the website is experiencing problems.";
    exit;
}




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
    <link rel="stylesheet" href="../style/style.css" />
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">
          <img
            src="../img/multilogoicon.svg"
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
              <a class="nav-link" href="../index.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../overzicht_spreker.php">Speakers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../overzicht_zalen.php">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sponsors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tickets</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">ADMIN</a>
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
    <section id="overview">
        <h1>Alle sessies</h1>
        <a href="add_sessie_gui.php" class="btn btn-primary">ADD</a>
        <p><br /></p>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Titel</th>
                <th>Starttijd</th>
                <th id="omschrijving">Omschrijving</th>
                <th>Zaal</th>
                <th>Spreker</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php


            // Voor de resultaatset $result, zolang er een record is, gaan we elke record alsarray ophalen.
            while ($sessie = $result->fetch_assoc()) {
                $sesID = $sessie["idsessie"];
                echo"<tr>";
                echo"<td>".$sesID."</td>";
                echo"<td class='boldinfo'>".$sessie['titel']."</td>";
                echo"<td>".$sessie['start']."</td>";
                echo"<td id='omschrijving'>".$sessie['omschrijving']."</td>";
                if($sessie['zaalID']==100){
                    echo "<td class='boldinfo'>Pixel 1</td>";
                }else if($sessie['zaalID']==101){
                    echo "<td class='boldinfo'>Pixel 2</td>";
                }else if($sessie['zaalID']==102){
                    echo "<td class='boldinfo'>Pixel 3</td>";
                }else if($sessie['zaalID']==103){
                    echo "<td class='boldinfo'>Pixel 4</td>";
                }else if($sessie['zaalID']==104){
                    echo "<td class='boldinfo'>Pixel 5</td>";
                }

                if($sessie['sprekerID']==2001){
                    echo "<td>Aral Balkan</td>";
                }else if($sessie['sprekerID']==2002){
                    echo "<td>Michael O'Neill</td>";
                }else if($sessie['sprekerID']==2003){
                    echo "<td>Ton Frederiks</td>";
                }else if($sessie['sprekerID']==2004){
                    echo "<td>Frederic Lierman</td>";
                }else if($sessie['sprekerID']==2005){
                    echo "<td>Brent Wilkey</td>";
                }else if($sessie['sprekerID']==2006){
                    echo "<td>Jeremy Thorp</td>";
                }else if($sessie['sprekerID']==2007){
                    echo "<td>Geert Coppens</td>";
                }else if($sessie['sprekerID']==2008){
                    echo "<td>GRID VFX</td>";
                }else if($sessie['sprekerID']==2009){
                    echo "<td>Ben Piquard</td>";
                }else if($sessie['sprekerID']==2010){
                    echo "<td>Keith Peters</td>";
                }else if($sessie['sprekerID']==2011){
                    echo "<td>Nicky Lauwerijssen</td>";
                }else if($sessie['sprekerID']==2012){
                    echo "<td>Brendan Ciecko</td>";
                }else if($sessie['sprekerID']==2013){
                    echo "<td>Xsens</td>";
                }else if($sessie['sprekerID']==2014){
                    echo "<td>Bart Chanet</td>";
                }else if($sessie['sprekerID']==2015){
                    echo "<td>Eboy</td>";
                }else if($sessie['sprekerID']==2016){
                    echo "<td>Serge Jespers</td>";
                }else if($sessie['sprekerID']==2017){
                    echo "<td>Christoph Rooms</td>";
                }else if($sessie['sprekerID']==2018){
                    echo "<td>Donna Fenn</td>";
                }else if($sessie['sprekerID']==2019){
                    echo "<td>Klaasjan Tukker</td>";
                }else if($sessie['sprekerID']==2020){
                    echo "<td>Branden Hall</td>";
                }else if($sessie['sprekerID']==2021){
                    echo "<td>Gill Cleeren</td>";
                }else if($sessie['sprekerID']==2022){
                    echo "<td>Jasper Hesseling</td>";
                }else if($sessie['sprekerID']==2023){
                    echo "<td>Doherty Fraser</td>";
                }else if($sessie['sprekerID']==2024){
                    echo "<td>Katrijn Faket</td>";
                }else if($sessie['sprekerID']==2025){
                    echo "<td>ADNERDS</td>";
                }else if($sessie['sprekerID']==2027){
                    echo "<td>Veerle Pieters</td>";
                }else if($sessie['sprekerID']==2028){
                    echo "<td>Little Miss Robot Ghent</td>";
                }else if($sessie['sprekerID']==2029){
                    echo "<td>Floris Vos</td>";
                }



                echo "<td><a href='delete_sessie.php?id=".$sesID."'>delete</a>  - <a href='update_sessie_gui.php?id=".$sesID."'>edit</a> </td>";
                echo "</tr>";
            }?>
            </tbody>
        </table>
    </section>
</main>
</body>
</html>