<?php
$conn = mysqli_connect("localhost", "root", "", "easyhousing");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
