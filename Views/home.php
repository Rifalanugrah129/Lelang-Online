<?php include './header.php' ?>
<?php
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$status = $_SESSION['status'];
if ($status != "login") {
    echo "<script>alert('kamu harus login'); document.location='../index.php'</script>";
}
?>


<div class="jam-digital">
    <div class="kotak">
        <p id="jam"></p>
    </div>
    <div class="kotak">
        <p id="menit"></p>
    </div>
    <div class="kotak">
        <p id="detik"></p>
    </div>
</div>



<h2 class="text-center mt-3">SISTEM APLIKASI LELANG</h2>
<?php
include '../Controllers/koneksi.php';
$query = mysqli_fetch_array(mysqli_query($koneksi, "select * from petugas where username = '$username' && password = '$password'"));
?>
<?php if (!$query) {
    echo "<div class='text-center mt-3'>jika anda mau menjual barang <a href='../Controllers/simpanjadipetugas.php?username=$username&password=$password'>klik disini</a></div>";
} ?>
<div class="container">
    <div class="card">
        <img src="./Assets/bootstrap/img/mtr.jpg" class="card-img-top" alt="NINJA H2">
        <div class="card-body">
            <p class="card-text text-center"> KETERANGAN : <br> Rp 760 - Rp 820 JutaHarga <br>OTR Jakarta Selatan <br>KONDISI MULUS</p>
            <?php
            include '../Controllers/koneksi.php';
            $query1 = mysqli_fetch_array(mysqli_query($koneksi, "select * from petugas where id_level ='LV2'"));
            ?>
            <?php if (!$query1) { ?>
                <a href="" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-secondary">Lihat</a>
            <?php } ?>
            <?php if ($query1) { ?>
                <a href="" class="btn btn-success">Buka</a>
                <a href="" class="btn btn-danger">Tutup</a>
            <?php } ?>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
        <img src="./Assets/bootstrap/img/mtr.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
        <img src="./Assets/bootstrap/img/mtr.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>


    <div class="card" style="width: 18rem;">
        <img src="./Assets/bootstrap/img/bekjul.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
        <img src="./Assets/bootstrap/img/bekjul.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>

</div>

<?php include './footer.php' ?>