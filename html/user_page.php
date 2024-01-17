<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>

<body>

   <div class="container">

      <div class="content">
         <h3>hi, <span>user</span></h3>
         <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
         <a href="deposit_box.php" class="btn">Go to Purchase</a>
         <a href="user_home.php" class="btn">Home</a>
         <a href="home.php" class="btn">logout</a>
      </div>

   </div>

</body>

</html>