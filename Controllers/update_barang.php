<?php
include './koneksi.php';
$idori = $_GET['idori'];
$id_petugas = $_POST['id_petugas'];
$gambarlama = $_POST['gambarlama'];
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$tanggal = $_POST['tanggal'];
$harga_awal = $_POST['harga_awal'];
$deskripsi = $_POST['deskripsi_barang'];
$random = rand();
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');
$namepoto = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$ext = pathinfo($namepoto, PATHINFO_EXTENSION);
// $id_petugas = "PT03";

// echo $gambarlama;

if ($namepoto == null) {
    $query = mysqli_query($koneksi, "UPDATE barang SET id_barang='$id_barang',nama_barang='$nama_barang',tanggal='$tanggal',harga_awal=$harga_awal,deskripsi_barang='$deskripsi',gambar='$gambarlama',id_petugas='$id_petugas' WHERE id_barang='$idori'");
    if ($query) {
        $ambildatalelang = mysqli_fetch_array(mysqli_query($koneksi, "select * from lelang where id_barang = '$idori'"));
        $id_lelang = $ambildatalelang['id_lelang'];
        $id_petugas = $ambildatalelang['id_petugas'];
        $id_user = $ambildatalelang['id_user'];
        $status = $ambildatalelang['status'];

        $querylelang = mysqli_query($koneksi, "UPDATE lelang SET id_lelang='$id_lelang', id_barang='$id_barang', tgl_lelang='$tanggal', harga_akhir=$harga_awal, id_user=null, id_petugas='$id_petugas', status='$status' WHERE id_barang='$idori'");
        if ($querylelang) {
            echo "<script>  alert('Sudah Berhasil Diedit'); document.location='../Views/tampil_barang.php'</script>";
        } else {
            echo "<script> alert('Data Lelang Tidak Berhasil Diedit'); document.location='../Views/tampil_barang.php'</script>";
        }
    }
} else {
    if (!in_array($ext, $ekstensi)) {
        header(
            "location:../Views/edit_barang.php?idori=$idori"
        );
        // echo "aaa";
    } else {
        if ($ukuran < 1044070) {
            $a = $random . '_' . $namepoto;
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../Views/Assets/bootstrap/img/' . $a);
            $query = mysqli_query($koneksi, "UPDATE barang SET id_barang='$id_barang',nama_barang='$nama_barang',tanggal='$tanggal',harga_awal=$harga_awal,deskripsi_barang='$deskripsi',gambar='$a' WHERE id_barang='$idori'");
            if ($query) {
                $ambildatalelang = mysqli_fetch_array(mysqli_query($koneksi, "select * from lelang where id_barang = '$idori'"));
                $id_lelang = $ambildatalelang['id_lelang'];
                $id_petugas = $ambildatalelang['id_petugas'];
                $id_user = $ambildatalelang['id_user'];
                $status = $ambildatalelang['status'];

                $querylelang = mysqli_query($koneksi, "UPDATE lelang SET id_lelang='$id_lelang', id_barang='$id_barang', tgl_lelang='$tanggal', harga_akhir=$harga_awal, id_user=null, id_petugas='$id_petugas', status='$status' WHERE id_barang='$idori'");
                if ($querylelang) {
                    echo "<script>document.location='../Views/tampil_barang.php'</script>";
                } else {
                    echo "<script> alert('Data Lelang Tidak Berhasil Diedit'); document.location='../Views/tampil_barang.php'</script>";
                }
                // echo "aaaa";
            } else {
                // echo "aaaaa";
                echo "<script> alert('Gagal Diganti'); document.location='../Views/edit_barang.php?idori=$idori'</script>";
            }
        } else {
            // echo "aaaaaa";
            echo "<script> alert('Ukuran File Terlalu Besar'); document.location='../Views/edit_barang.php?idori=$idori'</script>";
        }
    }
}
