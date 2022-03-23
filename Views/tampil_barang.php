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

<h2 class="text-center">Lelang Online</h2>
<?php
$query = mysqli_fetch_array(mysqli_query($koneksi, "select*from masyarakat where username='$_SESSION[username]' && password='$_SESSION[password]'"));
?>
<?php
if (!$query) {
?>
    <a href="./input_barang.php"><button class="btn btn-primary tambah">TAMBAH BARANG</button></a>
<?php } ?>

<?php
include "../Controllers/koneksi.php";
$halaman = 4;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($koneksi, "SELECT * FROM barang");
$total = mysqli_num_rows($result);
$pages = ceil($total / $halaman);
?>

<!-- Admin -->
<?php
$query = mysqli_fetch_array(mysqli_query($koneksi, "select*from petugas where username='$_SESSION[username]' && password='$_SESSION[password]'"));
?>

<?php
if ($query['id_level'] == "LV1") {
?>
    <?php
    $no = $mulai + 1;
    $query1 = mysqli_fetch_array(mysqli_query($koneksi, "select*from petugas where username='$username' && password='$password'"));
    $a = $query1['id_petugas'];
    $query2 = mysqli_query($koneksi, "select*from barang where id_petugas='$a'");
    ?>
    <div class="container">
        <div class="row">
            <?php
            while ($lihat = mysqli_fetch_assoc($query2)) {
                echo "
                            <div class='card mb-2' style='width: 17rem; margin-left: 6px;'>
                                <img src='Assets/bootstrap/img/$lihat[gambar]' class='card-img-top' style='height: 150px;'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$lihat[nama_barang]</h5>
                                    <p class='card-text' style='color: black;'>$lihat[deskripsi_barang]</p>";
                if ($lihat['status'] == "ditutup") {
                    echo "
                                        <a href='./edit_barang.php?idori=$lihat[id_barang]'><i class='fas fa-pencil-alt' style='font-size:30px'></i></a>
                                        <a href='../Controllers/delete_barang.php?idori=$lihat[id_barang]'><i class='fas fa-trash-alt' style='font-size:30px;color:red'></i></a>
                                        <a href='./history.php?idori=$lihat[id_barang]'><i class='fa fa-eye' style='font-size:30px;color:yellow'></i></a>
                                        ";
                } else {
                    echo "
                                        <a href='#'><i class='fas fa-pencil-alt' style='font-size:30px'></i></a>
                                        <a href='#'><i class='fas fa-trash-alt' style='font-size:30px;color:red'></i></a>
                                        <a href='./history.php?idori=$lihat[id_barang]'><i class='fa fa-eye' style='font-size:30px;color:yellow'></i></a>
                                        ";
                }
                echo "
                                </div>
                            </div>
                        ";
            }
            ?>
        </div>
    </div>
<?php } ?>

<!-- petugas -->
<?php
$query = mysqli_fetch_array(mysqli_query($koneksi, "select*from petugas where username='$_SESSION[username]' && password='$_SESSION[password]'"));
if ($query['id_level'] == "LV2") {
?>
    <?php
    $query = mysqli_query($koneksi, "select * from barang");
    $no = $mulai + 1;
    ?>
    <div class='container'>
        <div class='row'>
            <?php
            while ($tampil = mysqli_fetch_assoc($query)) {
                echo "
                    <div class='card mb-2' style='width: 17rem; margin-left: 6px;'>
                        <img src='Assets/bootstrap/img/$tampil[gambar]' class='card-img-top' alt='...' style='height: 150px;'>
                        <div class='card-body'>
                            <h5 class='card-title'>$tampil[nama_barang]</h5>
                            <p class='card-text' style='color: black;'>$tampil[deskripsi_barang]</p>
                    ";
                if ($tampil['status'] == "ditutup") {
                    echo "
                            <center>
                                <a href='./edit_barang.php?idori=$tampil[id_barang]'><i class='fas fa-pencil-alt' style='font-size:30px;color:yellow'></i></a>
                                <a href='../Controllers/delete_barang.php?idori=$tampil[id_barang]'><i class='fas fa-trash-alt' style='font-size:30px;color:red'></i></a>
                                <a href='../Controllers/bukalelang.php?idori=$tampil[id_barang]'><button class='btn btn-success mb-2'>Buka</button></a>
                            </center>
                            ";
                } else {
                    echo "
                            <center>
                                <a href=''><i class='fas fa-pencil-alt' style='font-size:30px;color:yellow'></i></a>
                                <a href=''><i class='fas fa-trash-alt' style='font-size:30px;color:red'></i></a>
                                <a href='../Controllers/tutuplelang.php?idori=$tampil[id_barang]'><button class='btn btn-danger mb-2'>Tutup</button></a>
                            </center>
                            ";
                }
                echo "
                        </div>
                    </div>";
            }
            ?>
        </div>
    </div>
<?php } ?>

<!-- masyarakat -->
<?php
if (!$query) {
    echo "<div class='text-center mt-2'>jika anda mau menjual barang <a href='../Controllers/simpanjadipetugas.php?username=$username&password=$password'>klik disini</a></div>";
}
$query = mysqli_fetch_array(mysqli_query($koneksi, "select*from masyarakat where username='$_SESSION[username]' && password='$_SESSION[password]'"));
?>
<?php
if ($query['id_user']) {
    $berubah = mysqli_fetch_array(mysqli_query($koneksi, "select * from petugas where username = '$username' && password = '$password'"));
?>
    <?php
    $status = "dibuka";
    $query = mysqli_query($koneksi, "select * from barang where status = '$status'");
    $no = $mulai + 1;
    ?>
    <div class="container">
        <div class="row">
            <?php
            while ($tampil = mysqli_fetch_assoc($query)) {
                echo "
            <div class='card mb-2' style='width: 17rem; margin-left:6px;'>
            <h5 class='text-center'>$tampil[id_barang]</h5>
                <img src='Assets/bootstrap/img/$tampil[gambar]' class='card-img-top' alt='...'style='height: 150px;'>
                <div class='card-body'>
                    <h5 class='card-title text-center'>$tampil[nama_barang]</h5>
                    <p class='card-text text-center' style='color: black;'>$tampil[deskripsi_barang]</p>
                    <h5 class='text-center'>$tampil[harga_awal]</h5>
                    <center>
                    <a href='./penawaran.php?idori=$tampil[id_barang]' class='btn btn-success'>Penawaran</a>
                    </center>
                </div>
            </div>
            ";
            }
            ?>
        <?php } ?>
        </div>
    </div>
    <?php include './footer.php' ?>