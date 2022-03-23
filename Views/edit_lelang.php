<?php include './header.php' ?>
<?php
include "../Controllers/koneksi.php";
$idori = $_GET['idori'];
$query = mysqli_fetch_array(mysqli_query($koneksi, "select*from lelang where id_lelang='$idori'"));
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

<center>
    <h2 class="text-center mb-4"> EDIT DATA LELANG</h2>
</center>
<form action="../Controllers/update_lelang.php?idori=<?php echo $idori ?>" method="POST">
    <div class="tabel">
        <center>
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
                                <input type="text" name="id_lelang" required="required" class="form-control" value="<?php echo $query['id_lelang']; ?>" readonly>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>ID BARANG</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <select name="id_barang" class="form-control">
                                <option name="id_barang" class="form-control" value="<?php echo $query['id_barang']; ?>" readonly><?php echo $query['id_barang']; ?></option>
                                <?php
                                include "koneksi.php";
                                $q = mysqli_query($koneksi, "select * from barang");
                                while ($data = mysqli_fetch_assoc($q)) {
                                    echo "
                                    <option value='$data[id_barang]'>$data[id_barang]</option>
                                    ";
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>TANGGAL LELANG</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="date" name="tgl_lelang" class="form-control" value="<?php echo $query['tgl_lelang']; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>HARGA AKHIR</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="number" name="harga_akhir" class="form-control" value="<?php echo $query['harga_akhir']; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>ID USER</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <select name="id_user" class="form-control">
                                <option name="id_user" class="form-control" value="<?php echo $query['id_user']; ?>" readonly><?php echo $query['id_user']; ?></option>
                                <?php
                                include "koneksi.php";
                                $q = mysqli_query($koneksi, "select * from masyarakat");
                                while ($data = mysqli_fetch_assoc($q)) {
                                    echo "
                                    <option value='$data[id_user]'>$data[id_user]</option>
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
                            <select name="id_petugas" class="form-control">
                                <option name="id_petugas" class="form-control" value="<?php echo $query['id_petugas']; ?>" readonly><?php echo $query['id_petugas']; ?></option>
                                <?php
                                include "koneksi.php";
                                $q = mysqli_query($koneksi, "select * from petugas");
                                while ($data = mysqli_fetch_assoc($q)) {
                                    echo "
                                    <option value='$data[id_petugas]'>$data[id_petugas]</option>
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
                            <select name="status" id=status class="form-control mb-3" value=" <?php echo $query['status']; ?>">
                                <option value="dibuka">Dibuka</option>
                                <option value="ditutup">Ditutup</option>
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
<?php include './footer.php' ?>