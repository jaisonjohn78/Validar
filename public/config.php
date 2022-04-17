<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "Validar";

// $hostname = "sql103.epizy.com";
// $username = "epiz_31513890";
// $password = "o8CWyaQlmJe";
// $database = "epiz_31513890_database";

$conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");

$base_url = "http://validar.epizy.com/public/";
$my_email = "goodboy78.com@gmail.com";

?>