<?php include './header.php' ?>
<?php
include '../Controllers/koneksi.php';
$username = $_SESSION['username'];
$password = $_SESSION['password'];
// $status = $_SESSION['status'];
if (!$_SESSION['status'] == "login") {
    echo "<script> alert('anda harus login dulu'); document.location='../index.php'</script>";
}
?>

<?php
include "../Controllers/koneksi.php";
$idori = $_GET['idori'];
$query = mysqli_fetch_array(mysqli_query($koneksi, "select*from barang where id_barang='$idori'"));
?>
<?php
// session_start();
$query1 = mysqli_fetch_array(mysqli_query($koneksi, "select*from petugas where username='$_SESSION[username]'"));
$id_petugas = $query1['id_petugas'];
// echo $id_petugas;
?>
<center>
    <h2 class="text-center mb-4"> EDIT DATA BARANG</h2>
</center>
<form action="../Controllers/update_barang.php?idori=<?php echo $idori ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_petugas" value="<?php echo $id_petugas; ?>">
    <input type="hidden" name="gambarlama" class="form-control" value="<?php echo $query['gambar']; ?>">
    <div class="tabel">
        <center>
            <table border="0">
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label">ID BARANG</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="text" name="id_barang" class="form-control" value="<?php echo $query['id_barang']; ?>" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label">NAMA BARANG</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="text" name="nama_barang" class="form-control" value="<?php echo $query['nama_barang']; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label">TANGGAL</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="date" name="tanggal" class="form-control" value="<?php echo $query['tanggal']; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label">HARGA AWAL</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="number" name="harga_awal" class="form-control" value="<?php echo $query['harga_awal']; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label">DESKRIPSI</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <textarea name="deskripsi_barang" class="form-control" value="<?php echo $query['deskripsi_barang']; ?>"><?php echo $query['deskripsi_barang']; ?></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label">GAMBAR</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <?php echo $query['gambar']; ?>
                        </div>
                        <div class="col-auto">
                            <input type="file" name="gambar" value="<?php echo $query['gambar']; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="tampil_barang.php" class="btn btn-warning">Kembali</a>
                    </td>
                </tr>
        </center>
    </div>
</form>
<!-- <a href="tampil_barang.php"></a><button class="btn btn-warning">Kembali</button></a> -->
</table>
<?php include './footer.php' ?>