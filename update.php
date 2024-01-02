<?php

error_reporting(0);
include "config.php";

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $image = $_POST['image'];

    $query = "UPDATE crudoprations SET username = '$username', password = '$password' WHERE id = $id";

    $sql = mysqli_query($conn, $query);

    header('location:display.php');
}


$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "images/" . $filename;

    $id = $_GET['id'];

    $sql = "UPDATE crudoprations SET image = '$filename' WHERE id = $id";

    mysqli_query($conn, $sql);

    // Now let's move the uploaded image into the folder: images
    if (move_uploaded_file($tempname, $folder)) {
?>
        <script>
            alert("Image uploaded successfully!");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Failed to upload image!");
        </script>
<?php
    }
}
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

<?php

$id = $_GET['id'];
$query = "SELECT * FROM crudoprations WHERE id=$id";

$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);
$username = $row['username'];
$password = $row['password'];
$image = $row['image'];

?>

<body></br></br>
    <div class=" col-lg-6  m-auto">

        <form method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header text-light text-center bg-warning ">
                    <h2>Please Edit Details</h2>
                </div></br>

                <label for="name" class="px-2">Email Id :</label>
                <input type="text" class="form-control" name="username" placeholder="Please enter your username..." value="<?php echo $username; ?>" required /><br>

                <label for="password" class="px-2">Password :</label>
                <input type="text" class="form-control" name="password" placeholder="Please enter your password..." value="<?php echo $password; ?>" required /><br>

                <div class="row">
                    <div class="col-sm-7">
                        <input style="margin: 4px 20% 22px 35%;" type="file" name="image">
                        <input type="hidden" value="<?php echo $image; ?>">
                    </div>
                    <div class="col-sm-5">
                        <input class="btn btn-success btn-sm mx-5" type="submit" name="upload" value="UPLOAD">
                    </div>

                </div>
                <button class=" btn btn-primary" type="submit" name="submit">SUBMIT</button><br>

            </div>
        </form>

    </div>
</body>

</html>