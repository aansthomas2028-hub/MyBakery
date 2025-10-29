<?php
$mysqli = new mysqli("localhost", "root", "", "bakery_store");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
