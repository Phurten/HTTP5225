<?php
$connect = mysqli_connect(
                    "localhost",
                    "root",
                    "",
                    "tennis");
if (!$connect){
    die("Connection failed:" . mysqli_connect_error());
}