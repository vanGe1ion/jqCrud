<?php
//including the database connection file
include_once($_SERVER['DOCUMENT_ROOT']."/db_config.php");

//getting id of the data from url
$id = mysqli_real_escape_string($mysqli,$_POST['id']);

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");