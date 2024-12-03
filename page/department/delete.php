<?php
$id = $_GET['id'];
$sql = $koneksi->query("DELETE FROM departments WHERE id = $id");

if ($sql) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href='?page=department';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!');</script>";
}
?>
