<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($koneksi, "DELETE FROM alyciaa WHERE id_jadwal='$id'");

    if ($sql) {
        echo '<script>alert("Data berhasil dihapus."); document.location="jadwal_kereta.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data."); document.location="jadwal_kereta.php";</script>';
    }
} else {
    echo '<script>alert("ID tidak ditemukan."); document.location="jadwal_kereta.php";</script>';
}
?>
