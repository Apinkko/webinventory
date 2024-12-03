<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Karyawan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <div class="body">
                    <form method="POST" enctype="multipart/form-data">
                        <!-- Input Nama Karyawan -->
                        <label for="">Nama Karyawan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" class="form-control" required />
                            </div>
                        </div>

                        <!-- Dropdown Department -->
                        <label for="">Department</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="department_id" class="form-control" required>
                                    <option value="">-- Pilih Department --</option>
                                    <?php
                                    // Ambil data dari tabel departments
                                    $sql_departments = $koneksi->query("SELECT id, name FROM departments");
                                    while ($row = $sql_departments->fetch_assoc()) {
                                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Tombol Simpan -->
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </form>

                    <?php
                    if (isset($_POST['simpan'])) {
                        // Ambil data dari form
                        $nama = $_POST['nama'];
                        $department_id = $_POST['department_id'];

                        // Validasi data
                        if (empty($nama) || empty($department_id)) {
                            echo "<script type='text/javascript'>alert('Nama karyawan dan department tidak boleh kosong!');</script>";
                        } else {
                            // Simpan data ke tabel karyawan
                            $sql = $koneksi->query("INSERT INTO karyawan (nama, department_id) VALUES ('$nama', '$department_id')");

                            if ($sql) {
                                echo "<script type='text/javascript'>
                                    alert('Data Berhasil Disimpan');
                                    window.location.href = '?page=karyawan';
                                </script>";
                            } else {
                                echo "<script type='text/javascript'>alert('Terjadi kesalahan saat menyimpan data!');</script>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
