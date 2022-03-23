<?php
include './koneksi.php';
$idori = $_GET['idori'];
// echo $idorilelang;
$query = mysqli_fetch_array(mysqli_query($koneksi, "select * from barang where id_barang='$idori'"));
// $username = $_SESSION['username'];
// $password = $_SESSION['password'];
// $query1 = mysqli_fetch_array(mysqli_query($koneksi, "select * from petugas where username='$username' && password='$password'"));
// $id_user = $query1['idpetugas'];
// echo $id_user;



// $id_lelang = $query['id_lelang'];
$id_barang = $query['id_barang'];
$nama_barang = $query['nama_barang'];
$tanggal = $query['tanggal'];
$harga_awal = $query['harga_awal'];
$deskripsi_barang = $query['deskripsi_barang'];
$gambar = $query['gambar'];
$id_petugas = $query['id_petugas'];
$status = "dibuka";
// echo $id_lelang;
// echo $id_barang;
// echo $nama_barang;
// echo $tanggal;
// echo $harga_awal;
// echo $deskripsi_barang;
// echo $gambar;
// echo $id_petugas;
// echo $status;

$update = mysqli_query($koneksi, "UPDATE barang SET id_barang='$id_barang', nama_barang='$nama_barang', tanggal='$tanggal', harga_awal=$harga_awal, deskripsi_barang='$deskripsi_barang', gambar='$gambar', id_petugas='$id_petugas', status='$status' WHERE id_barang='$idori'");
if ($update) {
    $ambildatalelang = mysqli_fetch_array(mysqli_query($koneksi, "select * from lelang where id_barang = '$idori'"));
    $id_lelang = $ambildatalelang['id_lelang'];
    $id_petugas = $ambildatalelang['id_petugas'];
    // $id_user = $ambildatalelang['id_user'];
    // $status = $ambildatalelang['status'];

    $querylelang = mysqli_query($koneksi, "UPDATE lelang SET id_lelang='$id_lelang', id_barang='$id_barang', tgl_lelang='$tanggal', harga_akhir=$harga_awal, id_user=null, id_petugas='$id_petugas', status='$status' WHERE id_barang='$idori'");
    echo "<script>document.location='../Views/tampil_barang.php'</script>";
} else {
    echo "<script> alert('Gagal Dibuka'); document.location='../Views/tampil_barang.php'</script>";
}
