<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>

<body>

   <div class="container">

      <div class="content">
         <h3>hi, <span>EMPLOYEER</span></h3>
         <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
         <a href="add_box.php" class="btn">Add Box</a>
         <a href="user_details.php" class="btn">Approve User</a>
         <a href="box_details.php" class="btn">Approve Box</a>
         <a href="user_inf.php" class="btn">User Details</a>
         <a href="payment_details.php" class="btn">Payment Details</a>
         <a href="send_mails.php" class="btn">Send Mails</a>
         <a href="home.php" class="btn">logout</a>
      </div>

   </div>

</body>

</html>