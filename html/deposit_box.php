<?php

require_once("config.php");
$query = "SELECT * FROM box_form WHERE status='free'";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>

<html lang="en" class="light-style" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Deposit Box</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->



  <header style="background-color: #282932; padding: 20px;">
    <div class="container">
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg  c_nav">
        <div class="container-fluid p-0">
          <!-- logo -->
          <a class="navbar-brand" href="home.html">
            <p style="margin: 0; color: white;">Safe Deposit Box</p>
          </a>
          <button class="navbar-toggler collapsed d-flex d-lg-none flex-column justify-content-around" type="button" data-bs-toggle="collapse" data-bs-target="#nav_custom" aria-controls="nav_custom" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
          </button>
          <!-- menu -->
          <div class="collapse navbar-collapse menu" id="nav_custom">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="user_home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="order_details.php">Order Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="order_details.php">Pay</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="user_page.php">User Page</a>
              </li>
            </ul>
          </div>
          <div class="call-action">
            <a target="_blank" href="home.php">Log Out</a>
          </div>
        </div>
      </nav>
      <!-- navbar -->
    </div>
  </header>


  <!-- Content wrapper -->
  <div class="content-wrapper container">

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4 text-center">List of Rental Charge</h4>

      <div class="row mb-5">

        <?php

        while ($row = mysqli_fetch_assoc($result)) {
          $BoxID = $row['id'];
          $BoxName = $row['size'];
          $OPrice = $row['oprice'];
          $NPrice = $row['nprice'];
        ?>

          <div class="col-md-6 col-lg-4">
            <div class="card text-center mb-3">
              <div class="card-body">
                <h5 class="card-title fw-bold text-center">Box Size(inches): <?php echo $BoxName ?></h5>
                <p class="card-text">Old Rental Charge: $<?php echo $OPrice ?></p>
                <p class="card-text">New Rental Charge: $<?php echo $NPrice ?></p>
                <a href="buy_box.php?id=<?php echo $BoxID ?>" class="btn btn-primary ">Purchase</a>
              </div>
            </div>
          </div>

        <?php
        }
        ?>

      </div>
    </div>

  </div>
  <!-- / Content -->




  <!-- Footer -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>