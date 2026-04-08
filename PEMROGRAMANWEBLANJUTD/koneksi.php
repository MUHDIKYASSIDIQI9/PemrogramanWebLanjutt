<?php
$conn = mysqli_connect("localhost", "root", "", "kampus2");

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>