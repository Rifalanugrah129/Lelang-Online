<?php include './header.php' ?>
<?php
include "../Controllers/koneksi.php";
$idori = $_GET['idori'];
$query = mysqli_fetch_array(mysqli_query($koneksi, "select*from history_lelang where id_history='$idori'"));
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
    <h2 class="text-center mb-4"> EDIT HISTORY BARANG</h2>
</center>
<form action="../Controllers/update_history.php?idori=<?php echo $idori ?>" method="POST">
    <div class="tabel">
        <center>
            <table border="0">
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>ID HISTORY</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <div class="col-sm-30">
                                <input type="text" name="id_history" required="required" class="form-control" value="<?php echo $query['id_history']; ?>" readonly>
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
                            <label class="col-form-label"><b>ID LELANG</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <select name="id_lelang" class="form-control">
                                <option name="id_lelang" class="form-control" value="<?php echo $query['id_lelang']; ?>" readonly><?php echo $query['id_lelang']; ?></option>
                                <?php
                                include "koneksi.php";
                                $q = mysqli_query($koneksi, "select * from lelang");
                                while ($data = mysqli_fetch_assoc($q)) {
                                    echo "
                                    <option value='$data[id_lelang]'>$data[id_lelang]</option>
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
                            <label class="col-form-label"><b>PENAWARAN HARGA</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <div class="col-sm-30">
                                <input type="number" name="penawaran_harga" required="required" class="form-control" value="<?php echo $query['penawaran_harga']; ?>">
                            </div>
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