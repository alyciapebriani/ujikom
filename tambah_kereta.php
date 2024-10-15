<?php
include('koneksi.php');
if (isset($_POST['submit'])) {
    $nama_kereta = $_POST['nama_kereta'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $jadwal_keberangkatan = $_POST['jadwal_keberangkatan'];
    $jadwal_kedatangan = $_POST['jadwal_kedatangan'];
    $harga_tiket = $_POST['harga_tiket'];

    $sql = mysqli_query($koneksi, "INSERT INTO alyciaa (nama_kereta, asal, tujuan, jadwal_keberangkatan, jadwal_kedatangan, harga_tiket) VALUES ('$nama_kereta', '$asal', '$tujuan', '$jadwal_keberangkatan', '$jadwal_kedatangan', '$harga_tiket')");

    if ($sql) {
        echo '<script>alert("Data berhasil ditambahkan."); document.location="jadwal_kereta.php";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal menambahkan data.</div>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jadwal Kereta</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #000; /* Black background */
            color: #fff; /* White text */
        }

        h2 {
            color: #FFD700; /* Yellow for headings */
        }

        .form-control {
            background-color: #222; /* Dark gray for inputs */
            color: #fff; /* White text for inputs */
        }

        .form-control::placeholder {
            color: #ccc; /* Light gray for placeholder text */
        }

        .btn-primary {
            background-color: #003366; /* Dark blue for button */
            border: none; /* Remove border */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Lighter blue on hover */
        }

        .alert {
            background-color: #dc3545; /* Bootstrap danger color */
            color: #fff; /* White text for alert */
        }
        
        .navbar {
            background-color: #003366; /* Dark blue for navbar */
        }

        .navbar-brand, .nav-link {
            color: #FFD700; /* Yellow for navbar text */
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #fff; /* White on hover */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">E-DISHUB GARUT</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="jadwal_kereta.php">Home</a>
                    </li>
                    <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="tambah_kereta.php">Tambah Jadwal</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="data_kereta.php">Kereta</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="informasi.php">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Tambah Jadwal Kereta</h2>
        <form action="tambah_kereta.php" method="post">
            <div class="form-group">
                <label>Nama Kereta</label>
                <input type="text" name="nama_kereta" class="form-control" placeholder="Masukkan nama kereta" required>
            </div>
            <div class="form-group">
                <label>Asal</label>
                <input type="text" name="asal" class="form-control" placeholder="Masukkan asal kereta" required>
            </div>
            <div class="form-group">
                <label>Tujuan</label>
                <input type="text" name="tujuan" class="form-control" placeholder="Masukkan tujuan kereta" required>
            </div>
            <div class="form-group">
                <label>Jadwal Keberangkatan</label>
                <input type="datetime-local" name="jadwal_keberangkatan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Jadwal Kedatangan</label>
                <input type="datetime-local" name="jadwal_kedatangan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga Tiket</label>
                <input type="number" name="harga_tiket" class="form-control" placeholder="Masukkan harga tiket" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
