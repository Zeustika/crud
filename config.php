<?php
$host = "localhost";
$user = "cruduser";
$pass = "passwordku";
$db   = "crud_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
