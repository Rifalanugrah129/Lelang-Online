<?php
include "./koneksi.php";
$idori = $_GET['idori'];
$query = mysqli_query($koneksi, "delete from lelang where id_lelang='$idori'");
if ($query) {
    echo "<script>document.location='../Views/tampil_lelang.php'</script>";
} else {
    echo "<script> alert('tidak terhapus kemungkinan data ini sudah ada di data yang lain'); document.location='../Views/tampil_lelang.php'</script>";
}
