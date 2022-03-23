<?php
include 'koneksi.php';
$id_history = $_POST['id_history'];
$id_lelang = $_POST['id_lelang'];
$id_barang = $_POST['id_barang'];
// $ = $_POST['tanggal'];
$id_user = $_POST['id_user'];
$id_petugas = $_POST['id_petugas'];
$penawaran_harga = $_POST['penawaran_harga'];
$tanggal = $_POST['tanggal'];
// echo $id_history . " ";
// echo $id_lelang . " ";
// echo $id_barang . " ";
// echo $id_user . " ";
// echo $id_petugas . " ";
// echo $penawaran_harga . " ";
// echo $tanggal . " ";
$cari_data_lelang = mysqli_fetch_array(mysqli_query($koneksi, "select * from lelang where id_lelang = '$id_lelang'"));
$harga_akhir = $cari_data_lelang['harga_akhir'];
// echo $harga_akhir;
if ($penawaran_harga > $harga_akhir) {
    $masukan = mysqli_query($koneksi, "insert into history_lelang values('$id_history', '$id_lelang', '$id_barang', '$id_user', '$penawaran_harga')");
    if ($masukan) {
        $id_lelang_baru = $id_lelang;
        $id_barang_baru = $id_barang;
        $tgl_lelang_baru = $tanggal;
        $harga_akhir = $penawaran_harga;
        $id_user = $id_user;
        $ambil_lelang = mysqli_fetch_array(mysqli_query($koneksi, "select * from lelang where id_lelang = '$id_lelang_baru'"));
        $id_petugas = $ambil_lelang['id_petugas'];
        $status = $ambil_lelang['status'];
        $updatelelang = mysqli_query($koneksi, "update lelang set id_lelang='$id_lelang_baru', id_barang='$id_barang_baru', tgl_lelang='$tgl_lelang_baru', harga_akhir='$harga_akhir', id_user='$id_user', id_petugas='$id_petugas', status='$status' where id_lelang='$id_lelang_baru'");
        if (!$updatelelang) {
            echo "<script>alert('Gagal Update Lelang'); document.location='../Views/penawaran.php?idori=$id_barang'</script>";
        }
    } else {
        echo "<script>alert('gagal menambahkan history'); document.location='../Views/penawaran.php?idori=$id_barang'</script>";
    }
    // echo "berhasil";
} else {
    echo "<script>alert('kurang gede'); document.location='../Views/penawaran.php?idori=$id_barang'</script>";
}
// echo "<br>";
// echo "baru";
// echo "<br>";
// echo $id_history . " ";
// echo $id_lelang . " ";
// echo $id_barang . " ";
// echo $id_user . " ";
// echo $id_petugas . " ";
// echo $penawaran_harga . " ";
// echo $tanggal . " ";

// if ($masukan) {
//     $caridataterbesar = mysqli_fetch_array(mysqli_query($koneksi, "select max(penawaran_harga) as penawaran_harga from history_lelang"));
//     $penawaran_harga_terbesar = $caridataterbesar['penawaran_harga'];
//     // echo $penawaran_harga_terbesar;
//     $cari_data_history = mysqli_fetch_array(mysqli_query($koneksi, "select * from history_lelang where penawaran_harga = '$penawaran_harga_terbesar'"));
//     $id_lelang = $cari_data_history['id_lelang'];
//     $id_user = $cari_data_history['id_user'];
//     $cari_data_lelang = mysqli_fetch_array(mysqli_query($koneksi, "select * from lelang where id_lelang = '$id_lelang'"));
//     $id_petugas = $cari_data_lelang['id_petugas'];
//     $status = $cari_data_lelang['status'];

//     // echo $id_lelang;
//     // echo $id_barang;
//     // echo $tanggal;
//     // echo $penawaran_harga_terbesar;
//     // echo $id_user;
//     // echo $id_petugas;
//     // echo $status;
//     $updatelelang = mysqli_query($koneksi, "UPDATE lelang SET id_lelang='$id_lelang', id_barang='$id_barang', tgl_lelang='$tanggal', 
//     harga_akhir='$penawaran_harga_terbesar', id_user='$id_user', id_petugas='$id_petugas', status='$status' WHERE id_lelang='$id_lelang'");
//     if ($updatelelang) {
//         echo "<script>document.location='../Views/tampil_barang.php'</script>";
//     } else {
//         echo "<script> alert('Penawaran Anda Tidak Diterima'); document.location='../Views/tampil_barang.php'</script>";
//     }
// } else {
//     echo "<script> alert('gagal tambah hystory lelang'); document.location='../Views/tampil_barang.php'</script>";
// }
