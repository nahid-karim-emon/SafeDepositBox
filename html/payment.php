<?php

@include 'config.php';
$P_id = "";
if (isset($_GET['id']))
    $P_id = $_GET['id'];
date_default_timezone_set('Asia/Kolkata');
$Format = 'd-m-Y';
if (isset($_POST['submit'])) {

    $account = $_POST['acnum'];
    $pay = $_POST['pay'];
    $pay_type = $_POST['pay_type'];
    $CDT = date($Format);

    $select = " SELECT * FROM ok_requ_box WHERE acnum='$account' ";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $select = " SELECT * FROM box_form WHERE id=$P_id ";
        $result = mysqli_query($conn, $select);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($pay_type == 'new') {
                $amount = $row['nprice'];
            } else if ($pay_type == 'old') {
                $amount = $row['oprice'];
            }
        }
        $select = " SELECT * FROM ok_requ_box WHERE p_id=$P_id ";
        $result = mysqli_query($conn, $select);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $due = $row['due'];
        }
        if ($due == 0) $ndue = $amount - $pay;
        else $ndue = $due - $pay;
        $select = " SELECT * FROM payment_form WHERE p_id=$P_id ";
        $result = mysqli_query($conn, $select);
        if (mysqli_num_rows($result) > 0) {
            $CDT = date($Format);
            $query = "UPDATE payment_form SET due=$ndue WHERE p_id=$P_id";
            mysqli_query($conn, $query);
        } else {
            $insert = "INSERT INTO payment_form(id,p_id,acnum,email,due,date) VALUES(NULL,'$P_id','$account','$email','$ndue','$CDT')";
            mysqli_query($conn, $insert);
        }
        $query = "UPDATE ok_requ_box SET due=$ndue WHERE p_id=$P_id";
        mysqli_query($conn, $query);
        header('location:order_details.php');
    }
};


?>




<!-- ============================================= -->

<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Safe Deposite Box | Payment Form</title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />

    <script src="../assets/vendor/js/helpers.js"></script>

    <script src="../assets/js/config.js"></script>
</head>

<body>

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mb-3 text-center ">Payment Form</h4>


                        <form id="registerform" class="mb-3 mt-3" action="" method="POST">


                            <div class="mb-3">
                                <label for="acnum" class="form-label">Account Number</label>
                                <input type="number" name="acnum" required placeholder="enter your number" class="form-control" id="acnum" autofocus />
                            </div>
                            <div class="mb-3">
                                <label for="pay" class="form-label">Pay</label>
                                <input type="number" name="pay" required placeholder="enter amount" class="form-control" id="pay" autofocus />
                            </div>
                            <div class="mb-3">
                                <select class="btn btn-primary d-grid mx-auto w-50" name="pay_type">
                                    <option value="new">new rental charge</option>
                                    <option value="old">old rental charge</option>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary d-grid w-100">Payment</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>

    <script src="../assets/js/main.js"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>