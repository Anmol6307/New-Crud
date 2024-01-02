<?php

session_start();
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<?php



if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    // echo $username;
    $password = $_POST['password'];
    // echo $password;

    $emailquery = "select * from crudoprations where username = '$username' ";
    $query = mysqli_query($conn, $emailquery);

    $email_count = mysqli_num_rows($query);

    if ($email_count > 0) {
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_pass['password'];

        $_SESSION['username'] = $email_pass['username'];
        $_SESSION['id'] = $email_pass['id'];

        // for hash password verification..... 
        // $pass_decode = password_verify($password, $db_pass);

        if ($db_pass == $password) {
?>
            <script>
                alert("login Successfully");
            </script>
        <?php

            header('location: display.php');
        } else {
        ?>
            <script>
                alert("Password Incorrect");
            </script>
        <?php

        }
    } else {
        ?>
        <script>
            alert("Invalid Email");
        </script>
<?php

    }
}
?>

<body></br></br>
    <div class=" col-lg-6  m-auto">

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

            <div class="card">
                <div class="card-header text-light text-center bg-warning ">
                    <h2>Please Sign-In</h2>
                </div></br>

                <label for="name" class="px-2">Email Id :</label>
                <input type="text" class="form-control" name="username" placeholder="Please enter your email..." required /><br>

                <label for="password" class="px-2">Password :</label>
                <input type="password" class="form-control" id="Password" name="password" placeholder="Please enter your password..." required /><br>

                <button class="btn btn-primary" type="submit" name="submit">SIGN IN</button>
                <button class="btn btn-success mt-2"><a style="text-decoration:none; color:white;" href="index.php">SIGN UP FIRST</a></button><br>

            </div>
        </form>

    </div>
</body>

</html>