<?php
include("../db/newdbconn.php");

$type = 0;
$email;
$password;
$active;

if (isset($_POST['submit'])) {
    if(isset($_POST['radio'])) {
        $type = $_POST['radio'];
    }
    if(isset($_POST['inputEmail'])) {
        $email = $_POST['inputEmail'];
    }
    if(isset($_POST['inputPassword'])) {
        $password = $_POST['inputPassword'];
    }
}
if (validate($email, $password, $type) == 1) {
    setcookie("email", $email);
    header('Location: '."google.com");
}

?>