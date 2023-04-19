<?php

session_start();

include("dbconn.php");
include("function.php");


if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid Email is Required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `staff_login` WHERE id= $id";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        return $data; 
    }
}
header("Location: login.php");
die;

// $email = $_POST['email'];
// $password = $_POST['password'];
// if (!empty($email) && !empty($password)) {
    


// $id = $_SESSION['id'];
// $query = "SELECT * FROM `staff_login` WHERE  WHERE id= $id";
// $result = mysqli_query($conn, $query);

// if ($result) {

//     if ($result && mysqli_num_rows($result) > 0) {
//         $data = mysqli_fetch_assoc($result);
//         // return $data; 
//         if ($data['password'] === $password) {

//             $_SESSION['id'] = $data['id'];
//             echo $sql? header("Location: index.php"): "<Script>alert('Successful')</Script>" ;
//             exit;   
//         }
//      }
//     }


// }

// else {
//     die("Location:login.php");
// }

?>