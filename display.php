<?php

session_start();

if (!isset($_SESSION['username'])) {

    header('location: login.php');
}

include "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Crud Operations</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>


<body><br><br><br>
    <div class="container text-center mt-5">
        <h2 class="bg-warning text-light py-2"> Your Important Details!</h2><br>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <th>ID</th>
                <th>IMAGE</th>
                <th>EMAIL ID</th>
                <th>UPDATE</th>
                <th>DELETE</th>
                <th>SESSION</th>
            </thead>

            <?php

            $query = " select * from crudoprations where id = '$_SESSION[id]' ";
            $sql = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($sql)) {

            ?>

                <tr>
                    <td class="pt-5"><?php echo $row['id']; ?></td>
                    <td class="p-4"><img src="images/<?php echo $row['image']; ?>" style="height: 90px; width: 90px;" class="rounded-circle" onerror="this.src='images/profile.jpg';" </td>
                    <td class="pt-5"><?php echo $row['username']; ?></td>
                    <td class="pt-5"><button class="btn btn-success px-4"><a style="text-decoration:none; color:white;" href="update.php?id=<?php echo $row['id']; ?>">Edit</a></button></td>
                    <td class="pt-5"><button class="btn btn-danger"><a style="text-decoration:none; color:white;" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></button></td>
                    <td class="pt-5"><button class="btn btn-primary px-2"><a style="text-decoration:none; color:white;" href="logout.php">Log Out</a></button></td>

                </tr>

            <?php } ?>
        </table>

    </div>
</body>

</html>