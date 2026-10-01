<?php
$host = '127.0.0.1';
$user = 'root';
$password = '';

$koneksi = mysqli_connect($host, $user, $password);

if (!$koneksi) {
    die("koneksi gagal: " . mysqli_connect_error());
}
echo "koneksi ke server MySQL berhasil!\n";
?>
