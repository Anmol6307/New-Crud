<?php

include "config.php";

$id = $_GET['id'];
$query = " DELETE FROM crudoprations where id=$id ";

$sql = mysqli_query($conn, $query);

header('location:login.php');
