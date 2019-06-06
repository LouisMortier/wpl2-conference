<?php


date_default_timezone_set('Europe/Brussels');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("../scripts/database.php");
/*print("<pre>");
print_r($_POST);
print("</pre>");*/

    $stmt = $mysqli->prepare("UPDATE sessies SET likecounter=? WHERE sprekerID=? SET foreign_key_checks = 0;");
    if($mysqli->error!==""){
        print("<p>Error: ".$mysqli->error."</p>");
    }
    $stmt->bind_param("ii", $likes, $id);

    $likes = $_GET['like'];
    $likes=$likes + 1;
    $id=$_GET['id'];

    $stmt->execute();

    if(count($stmt->error_list)){
        print("<pre>");
        print_r($stmt->error_list);
        print("</pre>");
    }
    $stmt->close();
    //print("gelukt");
    header('Location: ' . $_SERVER['HTTP_REFERER']);



