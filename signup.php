<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
  <h1>SIGN UP TO NEC SL STAFF PORTAL
  </h1>

  <form method="POST" action="signup_conf.php">
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
    <div >
      <div >
        <label for="comfirmpassword">Comfirm Password:</label>
      </div>
      <div >
        <input type="password" name="comfirm_password" id="comfirmpassword">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign Up</button>
  </form>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

</body>

</html>