<?php
//including the database connection file
include_once $_SERVER['DOCUMENT_ROOT']."/db_config.php";

$name = mysqli_real_escape_string($mysqli, $_POST['name']);
$age = mysqli_real_escape_string($mysqli, $_POST['age']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);

if(isset($_POST['id'])) {
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $result = mysqli_query($mysqli, "INSERT INTO users(id,name,age,email) VALUES('$id','$name','$age','$email')");
}
else

//insert data to database
$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");