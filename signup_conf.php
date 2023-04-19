<?php

session_start();

include("dbconn.php");
include("function.php");



if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid Email is Required");
}

if (strlen($_POST["password"]) < 8) {
    echo"<script>alert('Password must be at least eight characters');</script>"; 
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    echo"<script>alert('Password must contain at least one letter');</script>"; 
}


if (!preg_match("/[0-9]/", $_POST["password"])) {
    echo"<script>alert('Password must contain at least one number');</script>"; 
}

if ($_POST["password"] !== $_POST["comfirm_password"]) {
    echo"<script>alert('Password Must Match');</script>";
}




$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO `staff_login`(`id`, `email`, `password`) VALUES (Null, '$email', '$password')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo $sql? header("Location: signup_alert.php"): "<Script>alert('Successful')</Script>" ;
    exit;
}

else {
    die("Location:signup.php");
}

?>