<?php include './header.php' ?>
<?php include '../Controllers/koneksi.php'; ?>
<?php
$id_barang = $_GET['idori'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
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
    <h2 class="text-center mb-4">DATA HISTORY</h2>
</center>

<table class="table mt-3">
    <thead>
        <tr>
            <th scope="col">
                ID HISTORY
            </th>
            <th scope="col">
                ID LELANG
            </th>
            <th scope="col">
                ID BARANG
            </th>
            <th scope="col">
                ID USER
            </th>
            <th scope="col">
                PENAWARAN
            </th>
        </tr>
    </thead>


    <?php
    $lihathistory = mysqli_query($koneksi, "SELECT * FROM history_lelang where id_barang='$id_barang'");
    while ($tampil = mysqli_fetch_assoc($lihathistory)) {
        echo "<tr>
            <td>$tampil[id_history]</td>
            <td>$tampil[id_lelang]</td>
            <td>$tampil[id_barang]</td>
            <td>$tampil[id_user]</td>
            <td> Rp. " . number_format($tampil['penawaran_harga']) . "</cente></td>
            </tr>";
    }
    ?>
</table>
<?php include './footer.php' ?>