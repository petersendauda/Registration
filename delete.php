<?php
include('dbconn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql= "DELETE FROM `register` WHERE id= $id";
    $data = mysqli_query($conn, $sql);

    if ($data) {
        header("location: index.php");
    }
}

?>