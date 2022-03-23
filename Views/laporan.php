<link rel="stylesheet" href="./Assets/bootstrap/css/stylehome.css">
<?php
include "../Controllers/koneksi.php";
$id_lelang = $_GET['id_lelang'];
// $query1 = mysqli_fetch_array(mysqli_query($koneksi, "select*from barang"));
// $query2 = mysqli_fetch_array(mysqli_query($koneksi, "select*from masyarakat"));
$query = mysqli_fetch_array(mysqli_query($koneksi, "select * from lelang where id_lelang = '$id_lelang'"));
$id_lelang = $query['id_lelang'];
$id_barang = $query['id_barang'];
$tgl_lelang = $query['tgl_lelang'];
$harga_akhir = $query['harga_akhir'];
$id_user = $query['id_user'];
$id_petugas = $query['id_petugas'];
$status = $query['status'];

$cari_user = mysqli_fetch_array(mysqli_query($koneksi, "select * from masyarakat where id_user = '$id_user'"));
$nama_lengkap = $cari_user['nama_lengkap'];

$cari_barang = mysqli_fetch_array(mysqli_query($koneksi, "select * from barang where id_barang = '$id_barang'"));
$nama_barang = $cari_barang['nama_barang'];
?>
<center>
    <h2 class="text-center mb-4"><?php echo $nama_lengkap ?> SELAMAT ANDA ADALAH PEMENANG DARI LELANG <?php echo $nama_barang ?></h2><br>
    <label class="col-form-label-1">
        ID User : <b><?php echo $id_user; ?></b><br>
        Dengan harga tertinggi yaitu: <b><?php echo "Rp.  " . number_format($query['harga_akhir']) . "" ?></b><br>
        Jenis Barang Lelang yang di ikuti : <b><?php echo $nama_barang; ?></b><br>
        Tanggal : <b><?php echo $tgl_lelang; ?></b><br>
        <hr>
        <script>
            window.print();
        </script>