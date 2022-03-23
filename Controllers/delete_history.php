<?php
include "./koneksi.php";
$idori = $_GET['idori'];
$query = mysqli_query($koneksi, "delete from history_lelang where id_history='$idori'");
if ($query) {
    echo "<script>document.location='../Views/tampil_history.php'</script>";
} else {
    echo "<script> alert('data gagal dihapus kemungkinan karna id ini sudah ada di tabel lain'); document.location='../Views/tampil_history.php'</script>";
}
