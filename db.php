<?php
$conn = new mysqli("localhost", "root", "", "smartstock");
if ($conn->connect_error) {
    die("Connection failed");
}
?>
