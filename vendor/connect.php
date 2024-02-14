<?php
$connect= mysqli_connect("localhost", "root", "", "regandauth");

if (!$connect) {
    die("Error to connect to DB");
}