<?php

require_once("config.php");
$query = " select * from main_users ";
$result = mysqli_query($conn, $query);

if (isset($_POST['submit'])) {

    while ($row = mysqli_fetch_assoc($result)) {
        $UserID = $row['id'];
        $query = "DELETE FROM main_users WHERE id=$UserID";
        mysqli_query($conn, $query);
        header('user_inf.php');
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
                                <td> ID </td>
                                <td> Name </td>
                                <td> Email </td>
                                <td> Firm </td>
                                <td> Address </td>
                                <td> Phone </td>
                                <td> Hair Color </td>
                                <td> Eye Color </td>
                                <td> Height </td>
                                <td> Weight </td>
                                <td> NID </td>
                                <td> Password </td>
                            </tr>

                            <?php

                            while ($row = mysqli_fetch_assoc($result)) {
                                $UserID = $row['id'];
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
                                $UserPassword = $row['password'];
                            ?>
                                <tr>
                                    <td><?php echo $UserID ?></td>
                                    <td><?php echo $UserName ?></td>
                                    <td><?php echo $UserEmail ?></td>
                                    <td><?php echo $UserFirm ?></td>
                                    <td><?php echo $UserAdd ?></td>
                                    <td><?php echo $UserPhone ?></td>
                                    <td><?php echo $UserHair ?></td>
                                    <td><?php echo $UserEye ?></td>
                                    <td><?php echo $UserHeight ?></td>
                                    <td><?php echo $UserWeight ?></td>
                                    <td><?php echo $UserNid ?></td>
                                    <td><?php echo $UserPassword ?></td>
                                    <td><button name="submit" class="btn btn-primary d-grid  mx-auto" type="submit">DELETE</button></td>
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