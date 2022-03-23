<?php include './header.php' ?>

<?php
include "../Controllers/koneksi.php";
$query = mysqli_query($koneksi, "SELECT max(id_barang) as idterbesar FROM barang");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['idterbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "BR";
$kodeBarang = $huruf . sprintf("%02s", $urutan);
?>
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
// session_start();
$query = mysqli_fetch_array(mysqli_query($koneksi, "select*from petugas where username='$username' && password='$password'"));
$id_petugas = $query['id_petugas'];
// echo $id_petugas;
?>

<form action="../Controllers/simpan_barang.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_petugas" value="<?php echo $id_petugas; ?>">
    <div class="tabel">
        <center>
            <table border="0">
                <h2 class="text-center mb-4">INPUT BARANG</h2>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>ID BARANG</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <div class="col-sm-30">
                                <input type="text" name="id_barang" required="required" class="form-control" value=" <?php echo $kodeBarang ?>" readonly>
                            </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>NAMA BARANG</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="text" name="nama_barang" class="form-control" placeholder="masukan nama barang">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>TANGGAL</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>HARGA AWAL</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="number" name="harga_awal" class="form-control" placeholder="Masukan harga awal">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>KONDISI</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kondisi" value="Mulus" checked>
                                <label class="form-check-label">
                                    Mulus
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kondisi" value="Sangat Mulus" checked>
                                <label class="form-check-label">
                                    Sangat Mulus
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kondisi" value="Cacat" checked>
                                <label class="form-check-label">
                                    Cacat
                                </label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>WARNA</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="warna" value="Hitam" checked>
                                <label class="form-check-label">
                                    Hitam
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="warna" value="Putih" checked>
                                <label class="form-check-label">
                                    Putih
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="warna" value="Merah" checked>
                                <label class="form-check-label">
                                    Merah
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="warna" value="Kuning" checked>
                                <label class="form-check-label">
                                    Kuning
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="warna" value="Hijau" checked>
                                <label class="form-check-label">
                                    Hijau
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="warna" value="Biru" checked>
                                <label class="form-check-label">
                                    Biru
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="warna" value="Silver" checked>
                                <label class="form-check-label">
                                    Silver
                                </label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>TAHUN</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <select name="tahun" class="form-control">
                                <option value="">Pilih Tahun</option>
                                <?php
                                $thn_skr = date('Y');
                                for ($x = $thn_skr; $x >= 1990; $x--) {
                                ?>
                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                </tr>
                </td>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>GAMBAR</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="file" id="gambar" name="gambar">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Cancel</button>
                    </td>
                </tr>
            </table>
    </div>
</form>
<?php include './footer.php' ?>