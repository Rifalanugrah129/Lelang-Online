<?php
include "Controllers/koneksi.php";
$query = mysqli_query($koneksi, "select * from masyarakat");
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}
header('Access-Control-Allow-Origin: https://localhost');
echo json_encode($data);
