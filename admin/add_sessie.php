<?php
date_default_timezone_set("Europe/Brussels");
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include('../scripts/database.php');

print("<pre>");
print_r($_POST);
print("</pre>");

    if(isset($_POST["submit"])=='true'){

      print("<pre>");
print_r($_POST);
print("</pre>");

      $stmt = $mysqli->prepare("INSERT INTO `sessies`( `titel`, `start`, `omschrijving`, `afbeelding`, `zaalID`, `sprekerID`) VALUES (?,?,?,?,?,?)");

    if($mysqli->error){
        echo"<p>prepared statement failed: ".$mysqli->error."</p>";
        die;
    }

    $stmt->bind_param("sissii",$sesTitel ,$sesStart ,$sesBio ,$sesAfb ,$sesZaalID ,$sesSprekerID);

    $sesTitel = $_POST['titel'];
    $sesStart = $_POST['start'];
    $sesBio = $_POST['bio'];
    $sesAfb = 'null';
    $sesZaalID = $_POST['zaal'];
    $sesSprekerID = $_POST['spreker'];

    $stmt->execute();

    $affected_rows = $stmt->affected_rows;

    if(count($stmt->error_list)){
        print("<pre>");
        print_r($stmt->error_list);
        print("</pre>");
    }else{
        if($affected_rows>0){
            header("location: sessie.php");
        }else{
            echo "Error: U hebt deze pagina niet bereikt via de juiste verwijzing.";
        }
      }
    $stmt->close();
    }
      
?>