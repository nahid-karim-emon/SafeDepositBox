<?php

@include 'config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $error[] = 'user already exist!';
   } else {

      if ($pass != $cpass) {
         $error[] = 'password not matched!';
      } else {
         if (isset($_FILES['pp']['name']) and !empty($_FILES['pp']['name'])) {


            $img_name = $_FILES['pp']['name'];
            $tmp_name = $_FILES['pp']['tmp_name'];
            $error = $_FILES['pp']['error'];

            if ($error === 0) {
               $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
               $img_ex_to_lc = strtolower($img_ex);

               $allowed_exs = array('jpg', 'jpeg', 'png');
               if (in_array($img_ex_to_lc, $allowed_exs)) {
                  $new_img_name = uniqid($uname, true) . '.' . $img_ex_to_lc;
                  $img_upload_path = '../upload/' . $new_img_name;
                  move_uploaded_file($tmp_name, $img_upload_path);

                  // Insert into Database
                  $sql = "INSERT INTO users(fname, username, password, pp) 
                    VALUES(?,?,?,?)";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute([$fname, $uname, $pass, $new_img_name]);

                  header("Location: ../login_form.php?success=Your account has been created successfully");
                  exit;
               } else {
                  $em = "You can't upload files of this type";
                  header("Location: ../register_form.php?error=$em&$data");
                  exit;
               }
            } else {
               $em = "unknown error occurred!";
               header("Location: ../register_form.php?error=$em&$data");
               exit;
            }
         }
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header("Location: ../index.php?success=Your account has been created successfully");
         exit;
      }
   }
};


?>




<!-- ============================================= -->

<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

   <title>Safe Deposite Box | Registration</title>

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

                  <h4 class="mb-3 text-center ">Welcome to Registration</h4>


                  <form id="registerform" class="mb-3" action="" method="POST">

                     <?php
                     if (isset($error)) {
                        foreach ($error as $error) {
                           echo '<span class="error-msg">' . $error . '</span>';
                        };
                     };
                     ?>

                     <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" required placeholder="enter your name" class="form-control" id="name" autofocus />
                     </div>
                     <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" required class="form-control" id="email" placeholder="Enter your email" />
                     </div>
                     <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                           <input type="password" name="password" required placeholder="enter your password" id="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />

                        </div>
                     </div>

                     <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                           <input type="password" name="cpassword" required placeholder="confirm your password" id="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />

                        </div>
                     </div>

                     <div class="mb-3">
                        <select class="btn btn-primary d-grid mx-auto w-50" name="user_type">
                           <option value="user">user</option>
                           <option value="admin">admin</option>
                        </select>
                     </div>



                     <div class="mb-3">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                           <label class="form-check-label" for="terms-conditions">
                              I agree to
                              <a href="javascript:void(0);">privacy policy & terms</a>
                           </label>
                        </div>
                     </div>
                     <button type="submit" name="submit" class="btn btn-primary d-grid w-100">Sign up</button>
                  </form>

                  <p class="text-center">
                     <span>Already have an account?</span>
                     <a href="login_form.php">
                        <span>Sign in instead</span>
                     </a>
                  </p>
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