<?php
date_default_timezone_set("Europe/Brussels");
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include('../scripts/database.php');

if (isset($_GET["id"]) == true) {
   $idsessie = $_GET["id"];
}else{
    echo "Querystring ontbreekt";
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
        <a class="navbar-brand" href="../index.php">
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
              <a class="nav-link" href="sessie.php">ADMIN</a>
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
    <section class="container">
        <h1>Update sessie</h1>
        <form method="post" action="update_sessie.php"  class="form-row">
            <div class="form-group col-12">
                <label for="title">ID</label>
                <input type="text" class="form-control" name="idsessie" readonly value="<?php print($idsessie)?>">
            </div>

            <div class="form-group col-8">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title">
            </div>

            <div class="form-group col-4">
                <label for="start">Starttijd</label>
                <input type="time" class="form-control" name="start">
                
            </div>

            <div class="form-group col-8">
                <label for="bio">Omschrijving</label>
                <input type="text" class="form-control" name="bio" placeholder="Omschrijving">
            </div>
            
            <div class="form-group col">
                        <label for="zaal">Zaal</label>
                        <select class="form-control" id="zaal" name="zaal">
                            <option value="100">Pixel 1</option>
                            <option value="101">Pixel 2</option>
                            <option value="102">Pixel 3</option>
                            <option value="103">Pixel 4</option>
                            <option value="104">Pixel 5</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="spreker">Spreker</label>
                        <select class="form-control" name="spreker">
                            <option value="2001">Aral Balkan</option>
                            <option value="2002">Micheal O'Neill</option>
                            <option value="2003">Ton Frederiks</option>
                            <option value="2004">Frederic Lierman</option>
                            <option value="2005">Brent Wilkey</option>
                            <option value="2006">Jeremy Thorp</option>
                            <option value="2007">Geert Coppens</option>
                            <option value="2008">GRID VFX</option>
                            <option value="2009">Ben Piquard</option>
                            <option value="2010">Keith Peters</option>
                            <option value="2011">Nicky Lauwerijssen</option>
                            <option value="2012">Brendan Ciecko</option>
                            <option value="2013">Xsens</option>
                            <option value="2014">Bart Chanet</option>
                            <option value="2015">Eboy</option>
                            <option value="2016">Serge Jespers</option>
                            <option value="2017">Christoph Rooms</option>
                            <option value="2018">Donna Fenn</option>
                            <option value="2019">Klaasjan Tukker</option>
                            <option value="2020">Branden Hall</option>
                            <option value="2021">Gill Cleeren</option>
                            <option value="2022">Jasper Hesseling</option>
                            <option value="2023">Doherty Fraser</option>
                            <option value="2024">Katrijn Faket</option>
                            <option value="2025">ADNERDS</option>
                            <option value="2027">Veerle Pieters</option>
                            <option value="2028">Little Miss Robot Ghent</option>
                            <option value="2029">Floris Vos</option>
                        </select>
                    </div>
            
            <div class="form-group col-12">
                <input type="submit" class="btn btn-secondary" name="submit" value="Update">
            </div>
        </form>
    </section>
</main>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>