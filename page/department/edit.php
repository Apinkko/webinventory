<?php
$id = $_GET['id'];
$sql = $koneksi->query("SELECT * FROM departments WHERE id = $id");
$data = $sql->fetch_assoc();
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Department</h6>
        </div>
        <div class="card-body">
            <form method="POST">
                <label for="">Nama Department</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="name" value="<?php echo $data['name']; ?>" class="form-control" required />
                    </div>
                </div>
                <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
            </form>

            <?php
            if (isset($_POST['ubah'])) {
                $name = $_POST['name'];

                $sql = $koneksi->query("UPDATE departments SET name = '$name' WHERE id = $id");

                if ($sql) {
                    echo "<script>alert('Data berhasil diubah!'); window.location.href='?page=department';</script>";
                } else {
                    echo "<script>alert('Gagal mengubah data!');</script>";
                }
            }
            ?>
        </div>
    </div>
</div>
