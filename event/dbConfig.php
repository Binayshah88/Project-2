<?php
$dbhost = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'scheduling';
$db = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>