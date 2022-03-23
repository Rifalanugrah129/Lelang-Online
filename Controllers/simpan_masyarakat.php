<?php
include "../Controllers/koneksi.php";
$id_user = $_POST['id_user'];
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$telp = $_POST['telp'];
$query = mysqli_query($koneksi, "insert into masyarakat values('$id_user','$nama_lengkap','$username','$password','$telp')");
if ($query) {
    echo "<script>document.location='../index.php'</script>";
} else {
    echo "<script> alert('data gagal disimpan kemungkinan karna id yang anda masukan sudah ada'); document.location='../Views/register-masyarakat.php'</script>";
}
