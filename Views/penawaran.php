<?php include './header.php' ?>

<?php
include '../Controllers/koneksi.php';
$idori = $_GET['idori'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
// $status = $_SESSION['status'];
if ($_SESSION['status'] != "login") {
    echo "<script> alert('anda harus login dulu'); document.location='../index.php'</script>";
}
?>


<?php
// session_start();
$query = mysqli_fetch_array(mysqli_query($koneksi, "select*from petugas where username='$username'"));
$id_petugas = $query['id_petugas'];
// echo $id_petugas;
?>

<form action="../Controllers/simpan_penawaran.php" method="POST">
    <?php
    include "../Controllers/koneksi.php";
    $besar = mysqli_query($koneksi, "SELECT max(id_history) as idgede FROM history_lelang");
    $data = mysqli_fetch_array($besar);
    $kodeHistory = $data['idgede'];
    $urutan = (int) substr($kodeHistory, 2, 2);
    $urutan++;
    $huruf = "HS";
    $kodeHistory = $huruf . sprintf("%02s", $urutan);
    ?>
    <input type="hidden" name="id_history" value="<?php echo $kodeHistory; ?>" readonly>

    <?php
    $tgl = date('Y-m-d');
    ?>
    <input type="hidden" name="tanggal" value="<?php echo $tgl ?>">

    <?php
    $cariidlelang = mysqli_fetch_array(mysqli_query($koneksi, "select * from lelang where id_barang = '$idori' "));
    $id_lelang = $cariidlelang['id_lelang'];
    $harga_akhir = $cariidlelang['harga_akhir'];
    ?>
    <input type="hidden" name="id_lelang" value="<?php echo $id_lelang; ?>">

    <input type="hidden" name="id_barang" value="<?php echo $idori; ?>">

    <?php
    $cariiduser = mysqli_fetch_array(mysqli_query($koneksi, "select * from masyarakat where username = '$username' && password = '$password'"));
    $id_user = $cariiduser['id_user'];
    ?>

    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">

    <?php
    $cariidpetugas = mysqli_fetch_array(mysqli_query($koneksi, "select * from petugas where username = '$username' && password = '$password'"));
    $id_petugas = $cariidpetugas['id_petugas'];
    ?>
    <input type="hidden" name="id_petugas" value="<?php echo $id_petugas; ?>">



    <div class="tabel">
        <center>
            <table border="0">
                <h2 class="text-center mb-4">Penawaran Harga</h2>

                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>Harga Awal Penawaran</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <div class="col-sm-30">
                                <input type="number" name="harga_awal" required="required" class="form-control" value="<?php echo $harga_akhir ?>" readonly>
                            </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-auto">
                            <label class="col-form-label"><b>Masukan Penawaran Harga Anda</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="col-auto">
                            <div class="col-sm-30">
                                <input type="number" name="penawaran_harga" required="required" placeholder="Masukan Harga Lebih" class="form-control">
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
            </table>
        </center>
    </div>
</form>
<?php include './footer.php' ?>