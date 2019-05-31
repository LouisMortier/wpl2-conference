<?php
$mysqli= new mysqli('localhost', 'multimania', 'multi_mania', 'conference');

if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";
    exit;
}
else{
    //echo "gelukt";
}