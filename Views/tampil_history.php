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
            <?php
            include '../Controllers/koneksi.php';
            $carimasyarakat = mysqli_fetch_array(mysqli_query($koneksi, "select*from masyarakat where username='$_SESSION[username]' && password='$_SESSION[password]'"));
            if (!$carimasyarakat['id_user']) {
            ?>
                <th scope='col'>
                    AKSI
                </th>
            <?php } ?>
        </tr>
    </thead>


    <?php
    include "../Controllers/koneksi.php";
    $halaman = 4;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
    $result = mysqli_query($koneksi, "SELECT * FROM history_lelang");
    $total = mysqli_num_rows($result);
    $pages = ceil($total / $halaman);
    $caripetugas = mysqli_fetch_array(mysqli_query($koneksi, "select*from petugas where username='$_SESSION[username]' && password='$_SESSION[password]'"));
    $id_petugas = $caripetugas['id_petugas'];

    // if ($caripetugas['id_level'] == "LV1") {
    //     // echo $id_petugas;
    //     $lihat = mysqli_query($koneksi, "select * from history_lelang where id_petugas='$id_petugas'");
    //     $no = $mulai + 1;
    //     while ($tampil = mysqli_fetch_assoc($lihat)) {
    //         echo "<tr>
    //         <td>$tampil[id_history]</td>
    //         <td>$tampil[id_lelang]</td>
    //         <td>$tampil[id_barang]</td>
    //         <td>$tampil[id_user]</td>
    //         <td> Rp. " . number_format($tampil['penawaran_harga']) . "</cente></td>
    //         <td><center><a href='../Controllers/delete_history.php?idori=$tampil[id_history]'><i class='fas fa-trash-alt' style='font-size:30px;color:red'></i></a></center></td>
    //         </tr>";
    //     }
    // }

    if ($caripetugas['id_level'] == "LV2") {
        $lihat = mysqli_query($koneksi, "select * from history_lelang");
        $no = $mulai + 1;
        while ($tampil = mysqli_fetch_Assoc($lihat)) {
            echo "<tr>
            <td>$tampil[id_history]</td>
            <td>$tampil[id_lelang]</td>
            <td>$tampil[id_barang]</td>
            <td>$tampil[id_user]</td>
            <td> Rp. " . number_format($tampil['penawaran_harga']) . "</center></td>
            <td><center><a href='../Controllers/delete_history.php?idori=$tampil[id_history]'><i class='fas fa-trash-alt' style='font-size:30px;color:red'></i></a></center</td>
            </tr>";
        }
    }

    $carimasyarakat = mysqli_fetch_array(mysqli_query($koneksi, "select*from masyarakat where username='$_SESSION[username]' && password='$_SESSION[password]'"));
    if ($carimasyarakat['id_user']) {
        $id_user = $carimasyarakat['id_user'];
        $lihat = mysqli_query($koneksi, "select * from history_lelang where id_user='$id_user'");
        $no = $mulai + 1;
        while ($tampil = mysqli_fetch_Assoc($lihat)) {
            echo "<tr>
            <td>$tampil[id_history]</td>
            <td>$tampil[id_lelang]</td>
            <td>$tampil[id_barang]</td>
            <td>$tampil[id_user]</td>
            <td> Rp. " . number_format($tampil['penawaran_harga']) . "</center></td>
            </tr>";
        }
    }

    ?>
</table>
<?php include './footer.php' ?>