<?php

@include 'config.php';

session_start();
$name = $_SESSION['user_name'];
if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}
$query = "SELECT * FROM main_users WHERE name='$name' ";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $UserID = $row['id'];
    $acnumber = $row['acnum'];
    $UserName = $row['name'];
    $UserEmail = $row['email'];
    $UserFirm = $row['firm'];
    $UserAdd = $row['address'];
    $UserPhone = $row['phone'];
    $UserHair = $row['hair_color'];
    $UserEye = $row['eye_color'];
    $UserHeight = $row['height'];
    $UserWeight = $row['weight'];
    $UserNid = $row['nid'];
}

?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Cards basic - UI elements | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

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

    <style>
        ::placeholder {
            color: black !important;
            font-weight: 900;
            opacity: 100 !important;
        }
    </style>
</head>

<body>
    <!-- Layout wrapper -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 p-3">
                    <h5 class="card-header p-3 mb-3">User Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <h3><?php echo $UserName ?></h3>

                                <p class="text-muted mb-0"><?php echo $UserFirm ?></p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                            <div class="row">
                                <!-- <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">First Name</label>
                  <input class="form-control" type="text" id="firstName" name="firstName" value="John" autofocus />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input class="form-control" type="text" name="lastName" id="lastName" value="Doe" />
                </div> -->
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" disabled name="email" placeholder="<?php echo $UserEmail ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="acnumber" class="form-label">Account Number</label>
                                    <input class="form-control" type="text" disabled id="acnumber" name="acnuber" placeholder="<?php echo $acnumber ?>" />
                                </div>
                                <!-- <div class="mb-3 col-md-6">
                                    <label for="organization" class="form-label">Firm</label>
                                    <input type="text" class="form-control" id="organization" name="organization" placeholder="firm" />
                                </div> -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" disabled id="phoneNumber" name="phoneNumber" class="form-control" placeholder="<?php echo $UserPhone ?>" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">NID Number</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" disabled id="phoneNumber" name="phoneNumber" class="form-control" placeholder="<?php echo $UserNid ?>" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" disabled class="form-control" id="address" name="address" placeholder="<?php echo $UserAdd ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="state" class="form-label">Hair Color</label>
                                    <input class="form-control" disabled type="text" id="state" name="state" placeholder="<?php echo $UserHair ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="zipCode" class="form-label">Eye Color</label>
                                    <input type="text" class="form-control" disabled id="zipCode" name="zipCode" placeholder="<?php echo $UserEye ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="height" class="form-label">Height</label>
                                    <input type="number" disabled class="form-control" id="height" name="zipCode" placeholder="<?php echo $UserHeight ?> cm" maxlength="6" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="weight" class="form-label">Weight</label>
                                    <input type="number" disabled class="form-control" id="weight" name="zipCode" placeholder="<?php echo $UserWeight ?> kg" maxlength="6" />
                                </div>

                            </div>
                            <!-- <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div> -->
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/masonry/masonry.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>