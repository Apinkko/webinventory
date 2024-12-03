<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Department</h6>
        </div>
        <div class="card-body">
            <form method="POST">
                <label for="">Nama Department</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="name" class="form-control" required />
                    </div>
                </div>
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            </form>

            <?php
            if (isset($_POST['simpan'])) {
                $name = $_POST['name'];

                $sql = $koneksi->query("INSERT INTO departments (name) VALUES ('$name')");

                if ($sql) {
                    echo "<script>alert('Data berhasil disimpan!'); window.location.href='?page=department';</script>";
                } else {
                    echo "<script>alert('Gagal menyimpan data!');</script>";
                }
            }
            ?>
        </div>
    </div>
</div>
