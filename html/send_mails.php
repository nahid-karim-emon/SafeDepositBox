<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/PHPMailer.php');
require('PHPMailer/Exception.php');
require('PHPMailer/SMTP.php');

require_once("config.php");
$query = " select * from payment_form where due>0";
$result = mysqli_query($conn, $query);


if (isset($_POST['submit'])) {

    while ($row = mysqli_fetch_assoc($result)) {
        $UserEmail = $row['email'];
        $due = $row['due'];

        $mail = new PHPMailer(true);
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '180103.cse@student.just.edu.bd';                     //SMTP username
        $mail->Password   = 'Nahid.180103';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        //$mail->setFrom('180103.cse@student.just.edu.bd', 'Mailer');
        $mail->addAddress($UserEmail);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Pay due amount.';
        $mail->Body    = "Hi,At first take salam. We inform you that you have a due amount for Safe Deposit Box. Please Pay it as soon as possible.<br><br><b>Your due amount is: $$due </b><br><br><br>With Best Regards<br>Bank of JUST<br>";

        $mail->send();

        if (!$mail->Send()) {
            echo "<script> alert('Submission failed!!') </script>";
        } else {
            echo "<script> alert('Email has been sent successfully!!') </script>";
        }
    }
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

                        <h4 class="mb-3 text-center ">Mail Sender</h4>


                        <form id="registerform" class="mb-3 mt-3" action="" method="POST">

                            <p> Send Mails all the user who has due amount!!!</p>

                            <button type="submit" name="submit" class="btn btn-primary d-grid w-100">Send Mail</button>
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