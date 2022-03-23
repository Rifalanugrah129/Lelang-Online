<?php
include "./koneksi.php";
$id_history = $_POST['id_history'];
$id_lelang = $_POST['id_lelang'];
$id_barang = $_POST['id_barang'];
$id_user = $_POST['id_user'];
$penawaran_harga = $_POST['penawaran_harga'];
$query = mysqli_query($koneksi, "insert into history_lelang values('$id_history','$id_lelang','$id_barang','$id_user','$penawaran_harga')");
if ($query) {
    echo "<script>document.location='../VIews/tampil_history.php'</script>";
} else {
    echo "<script> alert('data gagal disimpan kemungkinan karna id yang anda masukan sudah ada'); document.location='../Views/input_history.php'</script>";
}
