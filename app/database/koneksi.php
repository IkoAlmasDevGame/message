<?php
date_default_timezone_set("Asia/Jakarta");
$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_message";
$koneksi = mysqli_connect($host, $username, $password, $dbname) or mysqli_connect_error();