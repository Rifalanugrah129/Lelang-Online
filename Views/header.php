<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/bootstrap/css/stylehome.css">

    <title>SISTEM APLIKASI LELANG</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light mb-2" style="background-color: #150964;">
        <div class=" container-fluid">
            <a class="navbar-brand mx-5" href="#">
                <img src="./Assets/bootstrap/img/logo2.png" width="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./tampil_barang.php">
                            <font color="white">Barang</font>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./tampil_lelang.php">
                            <font color="white">Lelang</font>
                        </a>
                    </li>

                    <?php
                    include '../Controllers/koneksi.php';
                    session_start();
                    $username = $_SESSION['username'];
                    $password = $_SESSION['password'];
                    ?>
                    <?php
                    $cariidlogin = mysqli_fetch_array(mysqli_query($koneksi, "select * from petugas where username='$username' && password='$password'"));
                    $id_level = $cariidlogin['id_level'];
                    // echo $id_petugas;
                    if ($id_level != "LV1") {

                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./tampil_history.php">
                                <font color="white">History lelang</font>
                            </a>
                        </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link active" href="../Controllers/logout.php">
                            <font color="white">logout</font>
                        </a>
                    </li>
                </ul>
                <!-- <div class="d-flex">
                    <a class="btn btn-outline-success" href="../Controllers/logout.php">logout</a>
                </div> -->
            </div>
        </div>
    </nav>
    </div>