<?php


date_default_timezone_set('Europe/Brussels');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("../scripts/database.php");
print("<pre>");
print_r($_POST);
print("</pre>");

if(isset($_POST["submit"])==true){
    $stmt = $mysqli->prepare("UPDATE sessies SET titel=?, start=?, omschrijving=?, zaalID=?, sprekerID=? WHERE idsessie=?");
    if($mysqli->error!==""){
        print("<p>Error: ".$mysqli->error."</p>");
    }
    $stmt->bind_param("sssiii", $titel, $start, $bio, $zaal, $spreker,$idsessie);

    $titel=$_POST['title'];
    $start=$_POST['start'];
    $bio=$_POST['bio'];
    $zaal=$_POST['zaal'];
    $spreker=$_POST['spreker'];

    $idsessie=$_POST['idsessie'];

    $stmt->execute();

    if(count($stmt->error_list)){
        print("<pre>");
        print_r($stmt->error_list);
        print("</pre>");
    }
    $stmt->close();
    print("gelukt");
    //header("location:sessie.php");
}else{
    print("error: u kwam niet via het formulier");
}


