<?php

require_once("config.php");
$query = " select * from payment_form ";
$result = mysqli_query($conn, $query);

if (isset($_POST['submit'])) {

    while ($row = mysqli_fetch_assoc($result)) {
        $UserID = $row['id'];
        $query = "DELETE FROM payment_form WHERE id=$UserID";
        mysqli_query($conn, $query);
        header('payment_details.php');
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
                                <td> P_ID </td>
                                <td> Account </td>
                                <td> Email </td>
                                <td> Due </td>
                                <td> Order Date </td>
                            </tr>

                            <?php

                            while ($row = mysqli_fetch_assoc($result)) {
                                $UserID = $row['id'];
                                $P_id = $row['p_id'];
                                $acnum = $row['acnum'];
                                $UserEmail = $row['email'];
                                $due = $row['due'];
                                $date = $row['date'];
                            ?>
                                <tr>
                                    <td><?php echo $UserID ?></td>
                                    <td><?php echo $P_id ?></td>
                                    <td><?php echo $acnum ?></td>
                                    <td><?php echo $UserEmail ?></td>
                                    <td>$<?php echo $due ?></td>
                                    <td><?php echo $date ?></td>
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