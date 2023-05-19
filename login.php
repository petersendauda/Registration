<?php
session_start();

include("dbconn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Authenticate the user
    $query = "SELECT * FROM staff_login WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        if ($password == $data["password"]) {
            // Password is correct, create session
            $_SESSION["id"] = $data["id"];
            echo $query? header("Location: index.php"): "<Script>alert('Login Successful');</Script>";
            die();
        } else {
            // Password is incorrect
            echo"<script>alert('Wrong Email or Password');</script>";
        }
    } else {
        // User not found
        echo"<script>alert('Wrong Email or Password');</script>";
    }
}

// If user is already logged in, redirect to index
// if (isset($_SESSION["id"])) {
//     header("Location: index.php");
//     die();
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
  <h1>LOGIN TO NEC SL STAFF PORTAL
  </h1>

  <form method="POST" action="">
    <div >
      <div >
        <label for="email">Email:</label>
      </div><br>
      <div >
        <input type="email" name="email" id="email">
      </div>
    </div>
    <div >
      <div >
        <label for="inputPassword6">Password:</label>
      </div>
      <div >
        <input type="password" name="password" id="inputPassword6">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>

  <p>DO NOT HAVE AN ACCOUNT? YOU CAN 
    <a href="signup.php">SIGNUP TO NEC PORTAL</a>
</P>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

</body>

</html>