<?php
session_start();

include("dbconn.php");
include("function.php");

$data = check_login($conn);


if ($result) {
   $row = mysqli_fetch_array($result);

}

$gender = array();
$sql = "SELECT gender, COUNT(*) as amount FROM register 
GROUP BY gender";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
   $gender[] = array("x" => $row["gender"], "y" => $row["amount"]);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>voters' register</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="footer.css" class="">

   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

   <!-- PIE CHART -->
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', { 'packages': ['corechart'] });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

         var chartData = <?php echo json_encode($gender); ?>;
         var data = google.visualization.arrayToDataTable([chartData]);

         var options = {
            title: 'Gender',
            backgroundColor: 'transparent'
         };

         var chart = new google.visualization.PieChart(document.getElementById('piechart'));

         chart.draw(data, options);
      }
   </script>
   <!-- PIE CHART -->

</head>

<body>
   <div class="bg-success p-2 text-white">
      <img src="nec_logo_final.jpg" alt="">
      <h1 align="center"> NATIONAL ELECTORIAL COMMISSION <h1>
            <!-- logout -->
            <h3 align="center">(NEC)</h3>
            <a href="logout.php" class="btn btn-primary text-bg-light">Logout</a>
   </div>
   <div class="bg-success p-2 text-white" style="--bs-bg-opacity: .5;">
      <div class="mx-auto p-2" style="width: 200px;">
      </div>

      <p class="fw-light">The 2023 elections commences pretty soon, and for this reason, we as the governing body of
         this electorial process wants to make sure that everyone
         at or above the age of 18 attains a voter ID. We encourage everyone at or above this age to come to our various
         centers to collect their ID, and check if their
         information is correct.
      </p>

      <!-- form -->
      <?php
      include("addvoter.php");
      ?>
      <br><br><br>





      <div id="piechart" style="width: 900px; height: 500px;"></div>

      <!-- DASHBOARD 1-->
      <div class=" col-xxl-12 col-sm-18">
         <div class="card gradient-bx text-white bg-primary rounded">
            <div class="card-body">
               <div class="media align-items-center">
                  <div class="media-body">
                     <p class="mb-1">No. Of Registered Voters</p>
                     <?php

                     $info = mysqli_query($conn, "SELECT * FROM register ");
                     $row = mysqli_num_rows($info); ?>
                     <div class="d-flex flex-wrap">
                        <h2 class="fs-40 font-w600 text-white mb-0 mr-3">
                           <?php echo $row ?>
                        </h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- DASHBOARD 1-->



      <!-- apexchart -->
      <style>
         #chart {
            max-width: 500px;
            margin: 30px auto;
         }
      </style>
      <div id="chart"></div>
      <script>

         var options = {
            chart: {
               type: 'bar'
            },
            series: [{
               name: 'Customers',
               data: <?php echo json_encode($gender); ?>
            }],
            xaxis: {
               categories: ['FEMALE', 'MALE']
            },
         };


         var chart = new ApexCharts(document.querySelector("#chart"), options);

         chart.render();
      </script>


      <!-- list -->
      <h1 align="center">REGISTERED VOTERS</h1>
      <table class="table">
         <thead>
            <?php
            $query = "SELECT * FROM register order by id desc";
            $result = mysqli_query($conn, $query);
            ?>
            <tr>
               <th scope="col">id</th>
               <th scope="col">First</th>
               <th scope="col">Last</th>
               <th scope="col"> NIN</th>
               <th scope="col"> VOTER ID</th>
               <th scope="col"> EMAIL</th>
               <th scope="col"> PHONE</th>
               <th scope="col"> GENDER</th>
               <th scope="col"> AGE</th>
               <th scope="col"> ADDRESS</th>
               <th scope="col">Action</th>
            </tr>
         </thead>
         <tbody>

            <?php

            while ($row = mysqli_fetch_assoc($result)) {
               ?>
               <tr>

                  <td>
                     <?php echo $row['id']; ?>
                  </td>
                  <td>
                     <?php echo $row['fname']; ?>
                  </td>
                  <td>
                     <?php echo $row['lname']; ?>
                  </td>
                  <td>
                     <?php echo $row['nin']; ?>
                  </td>
                  <td>
                     <?php echo $row['vid']; ?>
                  </td>
                  <td>
                     <?php echo $row['email']; ?>
                  </td>
                  <td>
                     <?php echo $row['phone']; ?>
                  </td>
                  <td>
                     <?php echo $row['gender']; ?>
                  </td>
                  <td>
                     <?php echo $row['age']; ?>
                  </td>
                  <td>
                     <?php echo $row['address']; ?>
                  </td>
                  <td>
                     <button type="button" class="btn btn-primary"><a href="update.php?id=<?php echo $row['id']; ?>"
                           class="text-light">Update</a></button>
                     <button type="button" class="btn btn-danger"><a href="delete.php?id=<?php echo $row['id']; ?>"
                           class="text-light">Delete</a></button>
                  </td>
               </tr>
               <?php
            }
            ?>
         </tbody>
      </table>


      <!-- footer -->
      <footer class="footer-dark">
         <div class="footer-top">
            <div class="container">
               <div class="row">
                  <div class="col-sm-3 col-xs-6 col-xx-12 mb-4">
                     <h6 class="text-uppercase">About NEC</h6>
                     <ul class="list-unstyled address">
                        <li><i class="lnr lnr-map-marker"></i><span>OAU Drive, Tower Hill, Freetown, Sierra Leone, West
                              Africa</span></li>
                        <li><i class="lnr lnr-envelope"></i><a
                              href="mailto:necexternalrelations@gmail.com.com">necexternalrelations@gmail.com</a></li>
                        <li><i class="lnr lnr-phone-handset"></i><span>+23276647569</span></li>
                     </ul>
                  </div>
                  <div class="col-sm-3 col-xs-6 col-xx-12 mb-4">
                     <h6 class="text-uppercase">Our Organisation</h6>
                     <ul class="list-unstyled">
                        <li><a href="https://necsl.org/history.html">History</a></li>
                        <li><a href="https://necsl.org/mision_vision_statement.html">Mission and Vision Statement</a>
                        </li>
                        <li><a href="https://necsl.org/principles.html">Guiding Principles</a></li>
                        <li><a href="https://necsl.org/files/index_files/organogram.jpg" target="_blank">NEC
                              Organogram</a></li>
                     </ul>
                  </div>
                  <div class="col-sm-3 col-xs-6 col-xx-12 mb-4">
                     <h6 class="text-uppercase">OTHERS</h6>
                     <ul class="list-unstyled">
                        <li><a href="https://necsl.org/jobs.html">Job Advertisements</a></li>
                        <li><a href="https://necsl.org/bidding.html">Competitive Bidding Advertisements</a></li>
                        <li><a href="https://necsl.org/hq_office.html">HQ Office</a></li>
                        <li><a href="https://necsl.org/district_offices.html">District Offices</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <!-- Copy right -->
         <div class="footer-bottom">
            <div class="container">
               <div class="row">
                  <div class="col-sm-6">© 2018 National Electoral Commission, Sierra Leone All rights reserved</div>
                  <div class="col-sm-6 text-right">
                     <ul class="list-unstyled list-inline footer-social">
                        <li><a href="https://www.facebook.com/NECsalone/" target="_Blank"><i
                                 class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/NECsalone" target="_Blank"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.youtube.com/channel/UC5xG9efVu8omjn1uywpy2uQ" target="_Blank"><i
                                 class="fa fa-youtube-square"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </footer>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
         crossorigin="anonymous"></script>
      <script class="js/bootstrapp.js"></script>
</body>

</html>