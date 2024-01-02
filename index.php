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
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $emailquery = "select * from crudoprations where username = '$username' ";
    $query = mysqli_query($conn, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if ($emailcount > 0) {
?>
        <script>
            alert("Email already exists");
        </script>
        <?php
    } else {

        $insertquery = " INSERT INTO crudoprations (username, password) VALUES ('$username', '$password')";
        $iquery = mysqli_query($conn, $insertquery);

        if ($iquery) {
        ?>
            <script>
                alert("Inserted Successfully");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Failed");
            </script>
<?php
        }
    }
}

?>


<body></br></br>
    <div class=" col-lg-6  m-auto">

        <form method="POST">
            <div class="card">
                <div class="card-header text-light text-center bg-warning ">
                    <h2>Please Sign-up</h2>
                </div></br>

                <label for="name" class="px-2">Email Id :</label>
                <input type="text" class="form-control" name="username" placeholder="Please enter your email..." required /><br>

                <label for="password" class="px-2">Password :</label>
                <input type="password" class="form-control" id="Password" name="password" placeholder="Please enter your password..." required /><br>

                <label for="password" class="px-2">Confirm Password :</label>
                <input type="password" class="form-control" id="ConfirmPassword" name="confirmpassword" placeholder="Please confirm your password..." required /><br>

                <div class="px-2" style="margin-bottom: 5px;" id="CheckPasswordMatch"></div>

                <button class="btn btn-primary" type="submit" name="submit">SIGN UP</button>
                <button class="btn btn-success mt-2"><a style="text-decoration:none; color:antiquewhite;" href="login.php">SIGN IN NOW</a></button><br>

            </div>
        </form>


    </div>
</body>

<script>
    $(document).ready(function() {
        $("#ConfirmPassword").on('keyup', function() {
            var password = $("#Password").val();
            var confirmPassword = $("#ConfirmPassword").val();
            if (password != confirmPassword)
                $("#CheckPasswordMatch").html("Password does not match !").css("color", "red");
            else
                $("#CheckPasswordMatch").html("Password matched !").css("color", "green");
        });
    });
</script>

</html>