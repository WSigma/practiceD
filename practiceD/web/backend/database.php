<?php
$conn = new mysqli("localhost", "root", "", "databasename");
//var_dump($foundTitle)
if ($conn->connect_error)
    die("Connection error: " . $conn->connect_error);
$conn->set_charset('utf8');