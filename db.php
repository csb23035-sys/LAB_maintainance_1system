<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "project_1";

$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn)
{
    die("Connection Failed");
}

?>