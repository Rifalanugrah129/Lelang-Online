<!-- <?php include './header.php' ?>
<?php
include "../Controllers/koneksi.php";
$query = mysqli_query($koneksi, "SELECT max(id_lelang) as idterbesar FROM lelang");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['idterbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "LE";
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

<h2 class="text-center mb-4">INPUT LELANG</h2>
<form action="../Controllers/simpan_lelang.php" method="POST">
    <div class="tabel d-flex justify-content-center">
        <table border="0">
            <tr>
                <td>
                    <div class="col-auto">
                        <label class="col-form-label"><b>ID LELANG</b></label>
                    </div>
                </td>
                <td>
                    <div class="col-auto">
                        <div class="col-sm-30">
                            <input type="text" name="id_lelang" required="required" class="form-control" value=" <?php echo $kodeBarang ?>" readonly>
                        </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-auto">
                        <label class="col-form-label"><b>ID BARANG</b></label>
                    </div>
                </td>
                <td>
                    <div class="col-auto">
                        <select name="id_barang" id=id_barang class="form-control mb-3">
                            <?php
                            include "../Controllers/koneksi.php";
                            $query = mysqli_query($koneksi, "select * from barang");
                            while ($tampil = mysqli_fetch_assoc($query)) {
                                echo "
                                    <option value='$tampil[id_barang]'>$tampil[id_barang]</option>
                                    ";
                            }
                            ?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-auto">
                        <label class="col-form-label"><b>TANGGAL LELANG</b></label>
                    </div>
                </td>
                <td>
                    <div class="col-auto">
                        <input type="date" name="tgl_lelang" class="form-control">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-auto">
                        <label class="col-form-label"><b>HARGA AKHIR</b></label>
                    </div>
                </td>
                <td>
                    <div class="col-auto">
                        <input type="number" name="harga_akhir" class="form-control" placeholder="Masukan Harga Akhir">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-auto">
                        <label class="col-form-label"><b>ID USER</b></label>
                    </div>
                </td>
                <td>
                    <div class="col-auto">
                        <select name="id_user" id=id_user class="form-control mb-3">
                            <?php
                            include "../Controllers/koneksi.php";
                            $query = mysqli_query($koneksi, "select * from masyarakat");
                            while ($tampil = mysqli_fetch_assoc($query)) {
                                echo "
                                    <option value='$tampil[id_user]'>$tampil[id_user]</option>
                                    ";
                            }
                            ?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-auto">
                        <label class="col-form-label"><b>ID PETUGAS</b></label>
                    </div>
                </td>
                <td>
                    <div class="col-auto">
                        <select name="id_petugas" id=id_petugas class="form-control mb-3">
                            <?php
                            include "../Controllers/koneksi.php";
                            $query = mysqli_query($koneksi, "select * from petugas");
                            while ($tampil = mysqli_fetch_assoc($query)) {
                                echo "
                                    <option value='$tampil[id_petugas]'>$tampil[id_petugas]</option>
                                    ";
                            }
                            ?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-auto">
                        <label class="col-form-label"><b>STATUS</b></label>
                    </div>
                </td>
                <td>
                    <div class="col-auto">
                        <select name="status" id=status class="form-control mb-3">
                            <option value="dibuka">Dibuka</option>
                            <option value="ditutup">Ditutup</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-warning">Cancel</button>
                </td>
            </tr>
    </div>
</form>
</table>

<?php include './footer.php' ?> -->