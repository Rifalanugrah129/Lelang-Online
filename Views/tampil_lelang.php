<?php include './header.php' ?>

<center>
    <h2 class="text-center mb-4">DATA LELANG</h2>
</center>

<?php
include '../Controllers/koneksi.php';

$username = $_SESSION['username'];
$password = $_SESSION['password'];
// $carimasyarakat = mysqli_fetch_array(mysqli_query($koneksi, "select * from masyarakat where username = $username && password = $password"));
// $status = $_SESSION['status'];
if (!$_SESSION['status'] == "login") {
    echo "<script> alert('anda harus login dulu'); document.location='../index.php'</script>";
}
?>
<table class="table mt-3">
    <thead>
        <tr>
            <th scope="col">
                <center>ID LELANG</center>
            </th>
            <th scope="col">
                <center>ID BARANG</center>
            </th>
            <th scope="col">
                <center>TANGGAL LELANG</center>
            </th>
            <th scope="col">
                <center>HARGA AKHIR</center>
            </th>
            <th scope="col">
                <center>ID USER</center>
            </th>
            <th scope="col">
                <center>ID PETUGAS</center>
            </th>
            <th scope="col">
                <center>STATUS</center>
            </th>
            <th scope="col">
                <center>Aksi</center>
            </th>
        </tr>
    </thead>
    <?php
    include '../Controllers/koneksi.php';
    $halaman = 4;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
    $result = mysqli_query($koneksi, "SELECT * FROM barang");
    $total = mysqli_num_rows($result);
    $pages = ceil($total / $halaman);
    $no = $mulai + 1;
    $status = "dibuka";
    $query = mysqli_query($koneksi, "select * from lelang where status = '$status'");
    while ($lihat = mysqli_fetch_assoc($query)) {
        echo "
        <tr>
        <td> <center>$lihat[id_lelang]</center></td>
        <td><center>$lihat[id_barang]</center></td>
        <td><center>$lihat[tgl_lelang]</center></td>
        <td><center> Rp. " . number_format($lihat['harga_akhir']) . "</center></td>
        <td><center>$lihat[id_user]</center></td>
        <td><center>$lihat[id_petugas]</center></td>
        <td><center>$lihat[status]</center></td>
        <td>
        <center><a href='laporan.php?id_lelang=$lihat[id_lelang]'> <i class='fas fa-eye' style='font-size:30px;color:black''></i></a></center>
        </td>
        </tr>";
    }

    ?>


</table>
<?php include './footer.php' ?>