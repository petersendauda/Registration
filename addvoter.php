<?php
include("dbconn.php");

if (isset($_POST['submit'])) {
      // $id = $_POST['id'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $nin = $_POST['nin'];
      $vid = $_POST['vid'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $gender = $_POST['gender'];
      $age = $_POST['age'];
      $address = $_POST['address'];


    $sql= "INSERT INTO register(id, fname, lname, nin, vid, email, phone, gender, age, address) 
    VALUES (Null,'$fname','$lname','$nin','$vid','$email','$phone','$gender','$age','$address')";
    $result = mysqli_query($conn, $sql);
    
      if ($result) {

            header("Location: index.php");
    }
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Voter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
    
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Register New Voters</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-black">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">VOTERS' REGISTRATION FORM</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="mb-3">
            <label for="first-name" class="col-form-label">First Name:</label>
            <input type="text" name="fname" class="form-control" id="first-name" required   >
          </div>
          <div class="mb-3">
            <label for="last-name"  class="col-form-label">Last Name:</label>
            <input type="text" name="lname" class="form-control" id="last-name" required>
          </div>
          <div class="mb-3">
            <label for="nin" class="col-form-label">NIN:</label>
            <input type="text" name="nin" class="form-control" id="nin" required>
          </div>
          <div class="mb-3">
            <label for="nin" class="col-form-label">Voter ID:</label>
            <input type="text" name="vid" class="form-control" id="vid" required>
          </div>
          <div class="mb-3">
            <label for="email"  class="col-form-label">EMAIL:</label>
            <input type="text" name="email" class="form-control" id="email">
          </div>
          <div class="mb-3">
            <label for="phone" class="col-form-label">Phone:</label>
            <input type="text" name="phone" class="form-control" id="phone">
          </div>
          <div class="mb-3">
            <label for="gender" class="col-form-label">Gender:</label><br>
            MALE<input type="radio" name="gender" value="male" required>
            FEMALE<input type="radio" name="gender" value="female" required>
          </div>
          <div class="mb-3">
            <label for="age"  class="col-form-label">Age:</label>
            <input type="text" name="age" class="form-control" id="age" required>
          </div>
          <div class="mb-3">
            <label for="address"  class="col-form-label">Address:</label>
            <input type="text" name="address" class="form-control" id="address" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" value="submit" class="btn btn-primary">Register</button>
      </div>
    </div>
  </div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>


