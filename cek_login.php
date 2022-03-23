<?php
include './Controllers/koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
// echo $username;
// echo $password;
$query = mysqli_fetch_array(mysqli_query($koneksi, "select * from masyarakat where username ='$username' and password ='$password'"));
$query2 = mysqli_fetch_array(mysqli_query($koneksi, "select * from petugas where username ='$username' and password ='$password'"));
// echo $query['username'];
// echo $query['password']; 

if ($query or $query2) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['status'] = "login";
    if ($query) {
        echo "<script>document.location='./Views/tampil_barang.php'</script>";
    }
    echo "<script>document.location='./Views/tampil_barang.php'</script>";
    // echo "Betul";
} else {
    echo "<script>document.location='./index.php'</script>";
    // echo "salah";
}
