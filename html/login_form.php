<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = md5($_POST['password']);
  $user_type = $_POST['user_type'];

  if ($user_type == 'employee') $select = " SELECT * FROM employee WHERE email = '$email' && password = '$pass' ";
  else if ($user_type == 'user') $select = " SELECT * FROM main_users WHERE email = '$email' && password = '$pass' ";

  $result = mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_array($result);

    if ($user_type == 'employee') {
      $_SESSION['admin_name'] = $row['name'];
      header('location:admin_page.php');
    } elseif ($user_type == 'user') {
      $_SESSION['user_name'] = $row['name'];
      header('location:user_page.php');
    }
  } else {
    $error[] = 'Admin Not Approved yet or Incorrect Email or Password!!!';
  }
};
?>



<!-- sdghfdfsssssssdfggggggggggggggggggggggggggggggggggggggggg -->
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Login Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

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
  <!-- Page -->
  <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">

            </div>
            <!-- /Logo -->
            <h4 class="mb-3 text-center ">Welcome to Login</h4>

            <form id="formAuthentication" class="mb-3" action="" method="POST">

              <?php
              if (isset($error)) {
                foreach ($error as $error) {
                  echo '<span class="error-msg">' . $error . '</span>';
                };
              };
              ?>


              <div class="mb-3">
                <!-- <label for="email" class="form-label">Email or Username</label> -->
                <input type="email" name="email" required placeholder="enter your email" class="form-control" id="email" />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password"></label>
                  <a href="auth-forgot-password-basic.html">
                    <small>Forgot Password?</small>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <!-- <input type="password" name="password" required id="password"> -->
                  <input type="password" name="password" required id="password" class="form-control" placeholder="Password" aria-describedby="password" />
                  <!-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> -->
                </div><br>

                <div class="mb-3">
                  <select class="btn btn-primary d-grid mx-auto w-50" name="user_type">
                    <option value="user">user</option>
                    <option value="employee">employee</option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <div class="mb-3">
                <button name="submit" class="btn btn-primary d-grid w-50 mx-auto" type="submit">LOGIN</button>
              </div>
            </form>

            <p class="text-center">
              <span>New on our platform?</span>
              <a href="user_registration.php">
                <span style="color: #F7B613;">Create an account</span>
              </a>
            </p>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  <!-- <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div> -->

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