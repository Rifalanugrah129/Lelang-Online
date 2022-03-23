<?php
include "./koneksi.php";
$id_lelang = $_POST['id_lelang'];
$id_barang = $_POST['id_barang'];
$tgl_lelang = $_POST['tgl_lelang'];
$harga_akhir = $_POST['harga_akhir'];
$id_user = $_POST['id_user'];
$id_petugas = $_POST['id_petugas'];
$status = $_POST['status'];
$query = mysqli_query($koneksi, "insert into lelang values('$id_lelang','$id_barang','$tgl_lelang','$harga_akhir','$id_user','$id_petugas','$status')");
if ($query) {
    echo "<script>document.location='../Views/tampil_lelang.php'</script>";
} else {
    echo "<script> alert('data gagal disimpan kemungkinan karna id yang anda masukan sudah ada'); document.location='../Views/input_lelang.php'</script>";
}
