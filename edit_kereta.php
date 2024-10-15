<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = mysqli_query($koneksi, "SELECT * FROM alyciaa WHERE id_jadwal='$id'");

    if (mysqli_num_rows($select) == 0) {
        echo '<div class="alert alert-warning">ID tidak ditemukan.</div>';
        exit();
    } else {
        $data = mysqli_fetch_assoc($select);
    }
}

if (isset($_POST['submit'])) {
    $nama_kereta = $_POST['nama_kereta'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $jadwal_keberangkatan = $_POST['jadwal_keberangkatan'];
    $jadwal_kedatangan = $_POST['jadwal_kedatangan'];
    $harga_tiket = $_POST['harga_tiket'];

    $sql = mysqli_query($koneksi, "UPDATE alyciaa SET nama_kereta='$nama_kereta', asal='$asal', tujuan='$tujuan', jadwal_keberangkatan='$jadwal_keberangkatan', jadwal_kedatangan='$jadwal_kedatangan', harga_tiket='$harga_tiket' WHERE id_jadwal='$id'");

    if ($sql) {
        echo '<script>alert("Data berhasil diperbarui."); document.location="jadwal_kereta.php";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal memperbarui data.</div>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Jadwal Kereta</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #000; /* Black background */
            color: #fff; /* White text */
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">E-DISHUB GARUT</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
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
        <h2>Edit Jadwal Kereta</h2>
        <form action="edit_kereta.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label>Nama Kereta</label>
                <input type="text" name="nama_kereta" class="form-control" value="<?php echo $data['nama_kereta']; ?>" required>
            </div>
            <div class="form-group">
                <label>Asal</label>
                <input type="text" name="asal" class="form-control" value="<?php echo $data['asal']; ?>" required>
            </div>
            <div class="form-group">
                <label>Tujuan</label>
                <input type="text" name="tujuan" class="form-control" value="<?php echo $data['tujuan']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jadwal Keberangkatan</label>
                <input type="datetime-local" name="jadwal_keberangkatan" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($data['jadwal_keberangkatan'])); ?>" required>
            </div>
            <div class="form-group">
                <label>Jadwal Kedatangan</label>
                <input type="datetime-local" name="jadwal_kedatangan" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($data['jadwal_kedatangan'])); ?>" required>
            </div>
            <div class="form-group">
                <label>Harga Tiket</label>
                <input type="number" name="harga_tiket" class="form-control" value="<?php echo $data['harga_tiket']; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
