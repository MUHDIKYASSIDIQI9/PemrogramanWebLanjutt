<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];

    mysqli_query($conn, "INSERT INTO mahasiswa VALUES('', '$nama', '$nim', '$kelas')");
    header("Location: index.php");
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");
    header("Location: index.php");
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];

    mysqli_query($conn, "UPDATE mahasiswa SET 
        nama='$nama',
        nim='$nim',
        kelas='$kelas'
        WHERE id=$id");

    header("Location: index.php");
}
?>