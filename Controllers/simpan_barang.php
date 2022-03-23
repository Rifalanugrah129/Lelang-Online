<?php
include 'koneksi.php';
$id_petugas = $_POST['id_petugas'];
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$tgl = $_POST['tanggal'];
$harga_awal = $_POST['harga_awal'];
$gabungdeskripsi = "Kondisi : " . $_POST['kondisi'] . ", Warna : " . $_POST['warna'] . ", Tahun : " . $_POST['tahun'];
$deskripsi_barang = $gabungdeskripsi;
$random = rand();
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');
$namepoto = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$status = "ditutup";
$ext = pathinfo($namepoto, PATHINFO_EXTENSION);
// echo $id_petugas;
// echo $id_barang;
// echo $nama_barang;
// echo $tgl;
// echo $harga_awal;
// echo $deskripsi_barang;



if (!in_array($ext, $ekstensi)) {
	echo "<script>alert('Harap Masukan Foto'); document.location='../Views/input_barang.php'</script>";
} else {

	if ($ukuran < 1044070) {
		$a = $random . '_' . $namepoto;
		move_uploaded_file($_FILES['gambar']['tmp_name'], '../Views/Assets/bootstrap/img/' . $a);

		$query = mysqli_query($koneksi, "INSERT INTO barang VALUES('$id_barang','$nama_barang','$tgl','$harga_awal','$deskripsi_barang','$a','$id_petugas','$status')");
		if ($query) {
			// buat idlelang beda
			$q = mysqli_query($koneksi, "SELECT max(id_lelang) as idterbesar FROM lelang");
			$data = mysqli_fetch_array($q);
			$kodelelang = $data['idterbesar'];
			$urutan = (int) substr($kodelelang, 3, 3);
			$urutan++;
			$huruf = "LE";
			$kodelelang = $huruf . sprintf("%02s", $urutan);


			// echo $kodelelang . " ";
			// echo $id_petugas . " ";
			// echo $id_barang . " ";
			// echo $nama_barang . " ";
			// echo $tgl . " ";
			// echo $harga_awal . " ";
			// echo $deskripsi_barang . " ";
			// echo $kodelelang . " ";
			// echo $status . " ";


			// masukan data ke lelang
			$query1 = mysqli_query($koneksi, "INSERT INTO lelang VALUES('$kodelelang','$id_barang','$tgl','$harga_awal',null,'$id_petugas','$status')");
			if ($query1) {
				echo "<script>document.location='../Views/tampil_barang.php'</script>";
			} else {
				echo "<script> alert('Data Lelang Gagal Di Tambahkan'); document.location='../Views/input_barang.php'</script>";
			}
		} else {
			echo "<script> alert('Gagal Menambahkan Barang'); document.location='../Views/input_barang.php'</script>";
		}
	} else {
		echo "<script> alert('Ukuran Foto Terlalu besar'); document.location='../Views/input_barang.php'</script>";
	}
}
