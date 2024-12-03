<?php
// Ambil ID Karyawan dari URL
$id = $_GET['id'];

// Hapus data karyawan berdasarkan ID
$sql_delete = $koneksi->query("DELETE FROM karyawan WHERE id = '$id'");

if ($sql_delete) {
    echo "<script>
        alert('Data Berhasil Dihapus');
        window.location.href = '?page=karyawan';
    </script>";
} else {
    echo "<script>alert('Terjadi kesalahan saat menghapus data!');</script>";
}
?>
