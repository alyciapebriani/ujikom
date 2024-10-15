<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'alycia');

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
