<?php
include "./koneksi.php";
$idori = $_GET['idori'];
$id_lelang = $_POST['id_lelang'];
$id_barang = $_POST['id_barang'];
$tgl_lelang = $_POST['tgl_lelang'];
$harga_akhir = $_POST['harga_akhir'];
$id_user = $_POST['id_user'];
$id_petugas = $_POST['id_petugas'];
$status = $_POST['status'];
$query = mysqli_query($koneksi, "UPDATE lelang SET id_lelang='$id_lelang',id_barang='$id_barang',tgl_lelang='$tgl_lelang',harga_akhir=$harga_akhir,id_user='$id_user',id_petugas='$id_petugas',status='$status' WHERE id_lelang='$idori'");
if ($query) {
    echo "<script> document.location='../Views/tampil_lelang.php'</script>";
} else {
    echo "<script> alert('data gagal di ganti'); document.location='../Views/tampil_lelang.php'</script>";
}
