<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Kereta Api Garut</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #000; /* Latar belakang hitam */
            color: #fff; /* Teks putih */
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: #003366; /* Biru tua untuk navbar */
        }
        .navbar-brand, .nav-link {
            color: #FFD700; /* Kuning untuk teks navbar */
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #fff; /* Putih saat hover */
        }
        h2 {
            color: #FFD700; /* Kuning untuk judul */
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            max-width: 1200px; /* Maksimal lebar kontainer */
            margin: auto; /* Center kontainer */
            padding: 20px;
            border-radius: 8px;
            background-color: #1a1a1a; /* Warna latar belakang kontainer */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); /* Bayangan kotak */
        }
        .table {
            margin-top: 20px; /* Jarak atas tabel */
            border-radius: 8px; /* Sudut tabel melengkung */
            overflow: hidden; /* Sembunyikan sudut tajam */
        }
        .table-dark th {
            background-color: #003366; /* Biru tua untuk header tabel */
            color: #FFD700; /* Teks kuning di header */
        }
        .table-dark td {
            background-color: #222; /* Abu-abu gelap untuk baris tabel */
            color: #fff; /* Teks putih untuk baris tabel */
        }
        .btn-warning, .btn-danger {
            margin: 5px; /* Tambahkan jarak antar tombol */
            border-radius: 5px; /* Sudut tombol melengkung */
        }
        .btn-warning {
            background-color: #FFD700; /* Kuning untuk tombol edit */
            border: none; /* Hapus border */
        }
        .btn-danger {
            background-color: #dc3545; /* Warna merah untuk tombol delete */
            border: none; /* Hapus border */
        }
        .btn-warning:hover {
            background-color: #FFC107; /* Kuning lebih terang saat hover */
        }
        .btn-danger:hover {
            background-color: #c82333; /* Merah lebih gelap saat hover */
        }
        .form-group label {
            font-weight: bold; /* Tebalkan label */
        }
    </style>
</head>
<body>
    <?php
    session_start(); 

    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        include('koneksi.php');
        ?>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">SITEM INFORMASI JADWAL KERETA API</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="jadwal_kereta.php">Home</a>
                        </li>
                        <?php if ($_SESSION['username'] == 'admin') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="tambah_kereta.php">Tambah Kereta</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            <h2>Daftar Jadwal Kereta Api</h2>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>ID Jadwal</th>
                        <th>Nama Kereta</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Jadwal Keberangkatan</th>
                        <th>Jadwal Kedatangan</th>
                        <th>Harga Tiket</th>
                        <?php if ($_SESSION['username'] == 'admin') { ?>
                            <th>Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ambil data dari database dan urutkan berdasarkan ID
                    $sql = mysqli_query($koneksi, "SELECT * FROM alyciaa ORDER BY id_jadwal ASC");

                    while ($data = mysqli_fetch_assoc($sql)) {
                        echo '
                        <tr>
                            <td>' . $data['id_jadwal'] . '</td>
                            <td>' . $data['nama_kereta'] . '</td>
                            <td>' . $data['asal'] . '</td>
                            <td>' . $data['tujuan'] . '</td>
                            <td>' . $data['jadwal_keberangkatan'] . '</td>
                            <td>' . $data['jadwal_kedatangan'] . '</td>
                            <td>' . $data['harga_tiket'] . '</td>
                            ';
                        if ($_SESSION['username'] == 'admin') {
                            echo '
                            <td>
                                <a href="edit_kereta.php?id=' . $data['id_jadwal'] . '" class="btn btn-warning">Edit</a>
                                <a href="delete_kereta.php?id=' . $data['id_jadwal'] . '" class="btn btn-danger" onclick="return confirm(\'Yakin ingin menghapus?\')">Delete</a>
                            </td>
                            ';
                        }
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    <?php
    } else {
        // Jika belum login, tampilkan tombol login
        ?>
        <div class="container mt-4 text-center">
            <a href="login.php" class="btn btn-primary">Login</a>
        </div>
    <?php
    }
    ?>
</body>
</html>
