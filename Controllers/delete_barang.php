<?php
include "./koneksi.php";
$idori = $_GET['idori'];
$query1 = mysqli_fetch_array(mysqli_query($koneksi, "select * from barang where id_barang='$idori'"));
unlink("../Views/Assets/bootstrap/img/$query1[gambar]");
$querylelang = mysqli_query($koneksi, "delete from lelang where id_barang='$idori'");
if ($querylelang) {
    $query = mysqli_query($koneksi, "delete from barang where id_barang='$idori'");
    if ($query) {
        echo "<script>document.location='../Views/tampil_barang.php'</script>";
    } else {
        echo "<script> alert('Tidak Berhasil Dihapus'); document.location='../Views/tampil_barang.php'</script>";
    }
}
