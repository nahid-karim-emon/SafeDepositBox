<?php

@include 'config.php';
$id = $_GET['id'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$select = " SELECT * FROM box_form WHERE id=$id";

$result = mysqli_query($conn, $select);
if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $amount = $_POST['pay'];
    $insert = "INSERT INTO payment(p_id, email,amount) VALUES('$id','$email','$amount')";
    mysqli_query($conn, $insert);
    header('location:deposit_box.php');
};
?>


<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Box Purchase</title>

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
                    <div class="card-body text-center">
                        <h4 class="mb-3 text-center ">Welcome to Purchase</h4>
                        <?php

                        while ($row = mysqli_fetch_assoc($result)) {
                            $BoxID = $row['id'];
                            $BoxName = $row['name'];
                            $Price = $row['price'];
                            $BoxType = $row['size'];
                            $Password = $row['password'];
                        ?>



                            <h5 class="card-title fw-bold text-center"><?php echo $BoxName ?></h5>
                            <p class="card-text text-center">Box Price: <?php echo $Price ?></p>

                            <p class="card-text text-center">Box Size: <?php echo $BoxType ?></p>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" required placeholder="Purchase Email" class="form-control" id="email" autofocus />
                            </div>

                            <div class="mb-3">
                                <label for="pay" class="form-label">Pay</label>
                                <input type="number" class="form-control" id="pay" name="pay" placeholder="Set Price" />
                            </div>
                            <div class="mb-3">
                                <button name="submit" class="btn btn-primary d-grid w-50 mx-auto" type="submit">Submit</button>
                            </div>
                            <a data-bs-target="#modalCenter" data-bs-toggle="modal" href="box_purchase.php?id=<?php echo $BoxID ?>" class="btn btn-primary ">Get Password</a>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">

        <div class="mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                Launch modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle" class='text-center'>Successfully Purchase</h5><br>
                            <h5>Your Box Password is = <?php echo $Password ?></h5><br>


                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> -->
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