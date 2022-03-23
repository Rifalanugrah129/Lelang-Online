<?php
include "./koneksi.php";
$username = $_GET['username'];
$password = $_GET['password'];
$query = mysqli_fetch_array(mysqli_query($koneksi, "select * from masyarakat where username = '$username' && password = '$password'"));
$id_user = $query['id_user'];
$nama_lengkap = $query['nama_lengkap'];
$username = $query['username'];
$password = $query['password'];
$id_level = "LV1";
$query = mysqli_query($koneksi, "insert into petugas values('$id_user','$nama_lengkap','$username','$password','$id_level')");
if ($query) {
    $query2 = mysqli_query($koneksi, "delete from masyarakat where id_user = '$id_user'");
    if ($query2) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        echo "<script>alert('Selamat Anda Sudah Menjadi Admin');document.location='../Views/tampil_barang.php'</script>";
    }
} else {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    echo "<script> alert('Anda Tidak Bisa Menjadi Admin'); document.location='../Views/tampil_barang.php'</script>";
}
