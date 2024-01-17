<?php


require_once("config.php");
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}
$User = $_SESSION['user_name'];
$query = " select * from ok_requ_box where name='$User' ";
$result = mysqli_query($conn, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>User Details</title>
</head>

<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <form action="" class="" method="POST">
                        <table class="table table-bordered">
                            <tr>
                                <td> P_ID </td>
                                <td> Name </td>
                                <td>Account</td>
                                <td> Email </td>
                                <td> Firm </td>
                                <td> Address </td>
                                <td> Phone </td>
                                <td> Hair Color </td>
                                <td> Eye Color </td>
                                <td> NID </td>
                                <td> Old Charge </td>
                                <td> New Charge </td>
                                <td> Due </td>
                                <td> Order </td>
                                <td> Return </td>
                            </tr>

                            <?php

                            while ($row = mysqli_fetch_assoc($result)) {
                                $P_id = $row['p_id'];
                                $acnum = $row['acnum'];
                                $UserName = $row['name'];
                                $UserEmail = $row['email'];
                                $UserFirm = $row['firm'];
                                $UserAdd = $row['address'];
                                $UserPhone = $row['phone'];
                                $UserHair = $row['hair_color'];
                                $UserEye = $row['eye_color'];
                                $UserNid = $row['nid'];
                                $due = $row['due'];
                                $order = $row['order_date'];
                                $return = $row['return_date'];
                            }
                            ?>
                            <?php
                            $query = " select * from box_form where id=$P_id ";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $oldcharge = $row['oprice'];
                                $newcharge = $row['nprice'];
                            ?>
                                <tr>
                                    <td><?php echo $P_id ?></td>
                                    <td><?php echo $UserName ?></td>
                                    <td><?php echo $acnum ?></td>
                                    <td><?php echo $UserEmail ?></td>
                                    <td><?php echo $UserFirm ?></td>
                                    <td><?php echo $UserAdd ?></td>
                                    <td><?php echo $UserPhone ?></td>
                                    <td><?php echo $UserHair ?></td>
                                    <td><?php echo $UserEye ?></td>
                                    <td><?php echo $UserNid ?></td>
                                    <td>$<?php echo $oldcharge ?></td>
                                    <td>$<?php echo $newcharge ?></td>
                                    <td>$<?php echo $due ?></td>
                                    <td><?php echo $order ?></td>
                                    <td><?php echo $return ?></td>
                                    <td><a href="payment.php?id=<?php echo $P_id ?>" class="btn btn-primary d-grid  mx-auto">Payment</a></td>
                                </tr>
                            <?php
                            }
                            ?>


                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>