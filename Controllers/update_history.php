<?php
include "./koneksi.php";
$idori = $_GET['idori'];
$id_history = $_POST['id_history'];
$id_lelang = $_POST['id_lelang'];
$id_barang = $_POST['id_barang'];
$id_user = $_POST['id_user'];
$penawaran_harga = $_POST['penawaran_harga'];
$query = mysqli_query($koneksi, "UPDATE history_lelang SET id_history='$id_history',id_lelang='$id_lelang',id_barang='$id_barang',id_user='$id_user',penawaran_harga=$penawaran_harga WHERE id_history='$idori'");
if ($query) {
    echo "<script>document.location='../Views/tampil_history.php'</script>";
} else {
    echo "<script> alert('data gagal diganti'); document.location='../Views/tampil_history.php'</script>";
}
