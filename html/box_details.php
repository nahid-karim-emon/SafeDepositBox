<?php

require_once("config.php");
$query = " select * from requ_box ";
$result = mysqli_query($conn, $query);

if (isset($_POST['submit'])) {

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
        $order = $row['order_date'];
        $return = $row['return_date'];

        $insert = "INSERT INTO ok_requ_box(id,p_id,name,acnum,email,firm,address,phone,hair_color,eye_color,nid,due,order_date,return_date) VALUES(NULL,'$P_id','$UserName','$acnum','$UserEmail','$UserFirm','$UserAdd','$UserPhone','$UserHair','$UserEye','$UserNid',0,'$order','$return')";
        mysqli_query($conn, $insert);
        $query = "DELETE FROM requ_box WHERE p_id=$P_id";
        mysqli_query($conn, $query);
        $query = "UPDATE box_form SET status='rent' WHERE id=$P_id";
        mysqli_query($conn, $query);
        header('box_details.php');
    }
};

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
                                <td> Order </td>
                                <td> Return </td>
                            </tr>

                            <?php

                            while ($row = mysqli_fetch_assoc($result)) {
                                $P_id = $row['id'];
                                $acnum = $row['acnum'];
                                $UserName = $row['name'];
                                $UserEmail = $row['email'];
                                $UserFirm = $row['firm'];
                                $UserAdd = $row['address'];
                                $UserPhone = $row['phone'];
                                $UserHair = $row['hair_color'];
                                $UserEye = $row['eye_color'];
                                $UserNid = $row['nid'];
                                $order = $row['order_date'];
                                $return = $row['return_date'];
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
                                    <td><?php echo $order ?></td>
                                    <td><?php echo $return ?></td>
                                    <td><button name="submit" class="btn btn-primary d-grid  mx-auto" type="submit">Approve</button></td>
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