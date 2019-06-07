<?php
date_default_timezone_set('Europe/Brussels');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("../scripts/database.php");

print("<pre>");
print_r($_POST);
print("</pre>");

if(isset($_POST["submit"])==true){
$sql = "UPDATE `sessies` SET titel=?, `start`=?, omschrijving=?, zaalID=?, sprekerID=? WHERE idsessie=?";

    $stmt = $mysqli->prepare($sql);
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

    $affected_rows = $stmt->affected_rows;

    if(count($stmt->error_list)){
        print("<pre>");
        print_r($stmt->error_list);
        print("</pre>");
    }else{
        if($affected_rows>0){
            echo "gelukt";
            header("location: sessies.php");
        }else{
            echo "Did not insert any data.";
        }
    }
    $stmt->close();
}else{
    print("error: u kwam niet via het formulier");
}


