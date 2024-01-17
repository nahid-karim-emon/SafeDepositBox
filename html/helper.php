<?php

@include 'config.php';
if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['pemail']);
    $amount = $_GET['pay'];
    while ($row = mysqli_fetch_assoc($result)) {
        $Price = $row['price'];
    }
    $due = $Price - $amount;
    $select1 = " SELECT * FROM user_form WHERE email = '$email'";

    $result1 = mysqli_query($conn, $select1);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);
        $uid = $row['id'];
        $name = $row['name'];
        $insert = "INSERT INTO payment(id, name, email, due) VALUES('$uid','$name','$email','$due')";
        mysqli_query($conn, $insert);
        header('location:deposit_box.php');
    } else {
        $error[] = 'incorrect email or password!';
    }
};
