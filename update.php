
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("dbconn.php");

if(isset($_GET['id'])){
  $id = $_GET['id'];



if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $nin = $_POST['nin'];
    $vid = $_POST['vid'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $sql = " UPDATE register SET fname='$fname', lname='$lname',nin='$nin',vid='$vid', email='$email',phone='$phone', gender='$gender',age='$age',address='$address' WHERE id=' $id '";
    $query = mysqli_query($conn, $sql);

    echo $sql? header("location:index.php") : "<Script>alert('Something Went Wrong')</Script>" ;
}



$result = mysqli_query($conn,  "SELECT * FROM `register` WHERE id= '" .$_GET['id']. "'");
$row= mysqli_fetch_array($result);
if (!$row) {
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
    <title>Update Voter's Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="footer.css" class="">

</head>
<body>

<div class="bg-success p-2 text-white">
    <img src="nec_logo_final.jpg" alt="">
    <h1 align="center"> NATIONAL ELECTORIAL COMMISSION <h1>
        <h3 align="center">(NEC)</h3>
    </div>
    <div class="bg-success p-2 text-white" style="--bs-bg-opacity: .5;">
        <div class="mx-auto p-2" style="width: 200px;">
</div>

<p class="fw-light">The 2023 elections commences pretty soon, and for this reason, we as the governing body of this electorial process wants to make sure that everyone
    at or above the age of 18 attains a voter ID. We encourage everyone at or above this age to come to our various centers to collect their ID, and check if their 
    information is correct.
</p>
    
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Update Info</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-black">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">VOTERS' REGISTRATION FORM</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="mb-3">
            <label for="first-name" class="col-form-label">First Name:</label>
            <input type="text" name="fname" class="form-control" value="<?php echo $row['fname'] ?>" id="first-name" required   >
          </div>
          <div class="mb-3">
            <label for="last-name"  class="col-form-label">Last Name:</label>
            <input type="text" name="lname" class="form-control"value="<?php echo $row['lname'] ?>" id="last-name" required>
          </div>
          <div class="mb-3">
            <label for="nin" class="col-form-label">NIN:</label>
            <input type="text" name="nin" class="form-control" value="<?php echo $row['nin'] ?>" id="nin" readonly>
          </div>
          <div class="mb-3">
            <label for="nin" class="col-form-label">Voter ID:</label>
            <input type="text" name="vid" class="form-control" value="<?php echo $row['vid'] ?>" id="vid" readonly>
          </div>
          <div class="mb-3">
            <label for="email"  class="col-form-label">EMAIL:</label>
            <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>" id="email">
          </div>
          <div class="mb-3">
            <label for="phone" class="col-form-label">Phone:</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $row['phone'] ?>" id="phone">
          </div>
          <div class="mb-3">
            <label for="gender" class="col-form-label">Gender:</label><br>
            MALE<input type="radio" name="gender" required>
            FEMALE<input type="radio" name="gender" required>
          </div>
          <div class="mb-3">
            <label for="age"  class="col-form-label">Age:</label>
            <input type="text" name="age" class="form-control" value="<?php echo $row['age'] ?>" id="age" required>
          </div>
          <div class="mb-3">
            <label for="address"  class="col-form-label">Address:</label>
            <input type="text" name="address" class="form-control" value="<?php echo $row['address'] ?>" id="address" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="update" value="Update" class="btn btn-primary">
      </div>
    </div>
  </div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>


