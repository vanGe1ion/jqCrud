<?php
define('HOSTNAME', $_SERVER['SERVER_ADDR']);
define('LOGIN', 'root');
define('PASSWORD', '');
define('DBNAME', 'test');


$mysqli = mysqli_connect(HOSTNAME, LOGIN, PASSWORD, DBNAME);