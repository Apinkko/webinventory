<?php
// Ambil ID Karyawan dari URL
$id = $_GET['id'];

// Ambil data karyawan berdasarkan ID
$sql_karyawan = $koneksi->query("SELECT * FROM karyawan WHERE id = '$id'");
$data_karyawan = $sql_karyawan->fetch_assoc();

// Proses Update Data
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $department_id = $_POST['department_id'];

    // Validasi input
    if (empty($nama) || empty($department_id)) {
        echo "<script>alert('Nama dan department tidak boleh kosong!');</script>";
    } else {
        $sql_update = $koneksi->query("UPDATE karyawan SET nama = '$nama', department_id = '$department_id' WHERE id = '$id'");

        if ($sql_update) {
            echo "<script>
                alert('Data Berhasil Diupdate');
                window.location.href = '?page=karyawan';
            </script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat mengupdate data!');</script>";
        }
    }
}
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Karyawan</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <!-- Input Nama Karyawan -->
                <label for="">Nama Karyawan</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="nama" value="<?= $data_karyawan['nama'] ?>" class="form-control" required />
                    </div>
                </div>

                <!-- Dropdown Department -->
                <label for="">Department</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="department_id" class="form-control" required>
                            <option value="">-- Pilih Department --</option>
                            <?php
                            // Ambil data departments
                            $sql_departments = $koneksi->query("SELECT id, name FROM departments");
                            while ($row = $sql_departments->fetch_assoc()) {
                                $selected = $data_karyawan['department_id'] == $row['id'] ? 'selected' : '';
                                echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Tombol Update -->
                <input type="submit" name="update" value="Update" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
