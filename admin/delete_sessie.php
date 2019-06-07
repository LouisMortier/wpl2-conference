<?php

date_default_timezone_set('Europe/Brussels');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("../scripts/database.php");


if(isset($_GET["id"])==true){
    $stmt = $mysqli->prepare("DELETE FROM `sessies` WHERE idsessie = ?");
    if($mysqli->error!==""){
        print("<p>Error: ".$mysqli->error."</p>");
    }
    $stmt->bind_param("i", $idsessie);

    $idsessie = $_GET['id'];

    $stmt->execute();
    
    if(count($stmt->error_list)){
        print("<pre>");
        print_r($stmt->error_list);
        print("</pre>");
    }
    $stmt->close();
    
    header("location:sessie.php");
}else{
    print("error: u gaf geen querystring op");
}

?>
