<?php
$connect= mysqli_connect("localhost", "root", "", "regauth");

if (!$connect) {
    die("Error to connect to DB");
}