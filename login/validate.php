<?php
include("../db/dboperations.php");

$type;
$email;
$password;
$active;
if(isset($_POST['radio'])) {
    $type = $_POST['radio'];
}
if(isset($_POST['inputEmail'])) {
    $email = $_POST['inputEmail'];
}
if(isset($_POST['inputPassword'])) {
    $password = $_POST['inputPassword'];
}
if(isset($_POST['inputSimId'])) {
    $simId = $_POST['inputSimId'];
}

if ($type == 2 && validate_prof($email, $password) == 1) {
    echo "emil". $email;
    $_SESSION["email"] = $email;
    //header('Location: ../admin.php');
    echo "email" . $_SESSION["email"];
}

if ($type == 1 && validate_class($email, $password, $simId) == 1) {
    $_SESSION["email"] = $email;
    
    $_SESSION["simId"] = $simId;
    header('Location: http://www.google.com.hk');
}
?>