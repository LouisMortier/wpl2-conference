<?php
date_default_timezone_set('Europe/Brussels');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("../scripts/database.php");

print("<pre>");
print_r($_POST);
print("</pre>");

if(isset($_POST["submit"])==true){
$sql = "UPDATE `sessies` SET titel=?, `start`=?, omschrijving=?, afbeelding=?, zaalID=?, sprekerID=? WHERE idsessie=?";

    $stmt = $mysqli->prepare($sql);
    if($mysqli->error!==""){
        print("<p>Error: ".$mysqli->error."</p>");
    }
    $stmt->bind_param("ssssiii", $titel, $start, $bio, $afb, $zaal, $spreker,$idsessie);

    $titel=$_POST['title'];
    $start=$_POST['start'];
    $bio=$_POST['bio'];
    $afb=$_POST['afb'];
    $zaal=$_POST['zaal'];
    $spreker=$_POST['spreker'];

    $idsessie=$_POST['idsessie'];

    $stmt->execute();

    $affected_rows = $stmt->affected_rows;
    
    $stmt->close();

    header("location: sessie.php");
}else{
    print("error: u kwam niet via het formulier");
}


