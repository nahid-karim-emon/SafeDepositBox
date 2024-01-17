<?php

@include 'config.php';

$id = "";
if (isset($_GET['id']))
    $id = $_GET['id'];

date_default_timezone_set('Asia/Kolkata');
$Format = 'd-m-Y';
if (isset($_POST['submit'])) {

    $acnum = $_POST['anumber'];
    $year = $_POST['year'];
    $Fd = 0;
    $Fm = 0;
    $Fy = $year;
    $CDT = date($Format);
    $FDT = date($Format, strtotime("+$Fd days +$Fm months +$Fy years"));
    $query = "SELECT * FROM main_users WHERE acnum='$acnum' ";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
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
    $insert = "INSERT INTO requ_box(id,p_id,name,acnum,email,firm,address,phone,hair_color,eye_color,nid,order_date,return_date) VALUES(NULL,'$id','$UserName','$acnum','$UserEmail','$UserFirm','$UserAdd','$UserPhone','$UserHair','$UserEye','$UserNid','$CDT','$FDT')";
    mysqli_query($conn, $insert);
    header('location:user_page.php');
};
?>


<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Safe Deposite Box | Purchase Form</title>

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

                        <h4 class="mb-3 text-center ">Request For Purchase</h4>


                        <form id="registerform" class="mb-3 mt-3" action="" method="POST">


                            <div class="mb-3">
                                <label for="anumber" class="form-label">Account Number</label>
                                <input type="number" name="anumber" required placeholder="enter your number" class="form-control" id="anumber" autofocus />
                            </div>
                            <div class="mb-3">
                                <label for="year" class="form-label">Rent Duration</label>
                                <input type="number" name="year" required placeholder="in year" class="form-control" id="year" autofocus />
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary d-grid w-100">Purchase</button>
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