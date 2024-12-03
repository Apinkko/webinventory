<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Karyawan</h6>
    </div>
    <div class="card-body">
      <!-- Tambah tombol di atas tabel -->
      <div class="mb-3">
        <a href="?page=karyawan&aksi=add" class="btn btn-primary custom-btn">
          <i class="fas fa-plus me-2"></i> Tambah Karyawan
        </a>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered" id="karyawan" width="100%" cellspacing="0">
          <!-- Include DataTables CSS -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Department</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Query data karyawan
            $sql = $koneksi->query("SELECT k.id, k.nama, d.name as department FROM karyawan k JOIN departments d ON k.department_id = d.id");
            while ($data = $sql->fetch_assoc()) {
              ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['department']; ?></td>
                <td>
                  <a href="?page=karyawan&aksi=edit&id=<?php echo $data['id']; ?>" class="btn btn-info btn-sm custom-btn">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <a href="?page=karyawan&aksi=delete&id=<?php echo $data['id']; ?>" 
                    class="btn btn-danger btn-sm custom-btn" onclick="return confirm('Apakah anda yakin?')">
                    <i class="fas fa-trash"></i> Hapus
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $('#karyawan').DataTable({
      dom: 'Bfrtip',
      buttons: [
        {
          extend: 'copy',
          text: '<i class="fas fa-copy"></i> Copy',
          className: 'btn btn-secondary btn-sm custom-btn'
        },
        {
          extend: 'csv',
          text: '<i class="fas fa-file-csv"></i> CSV',
          className: 'btn btn-secondary btn-sm custom-btn'
        },
        {
          extend: 'excel',
          text: '<i class="fas fa-file-excel"></i> Excel',
          className: 'btn btn-secondary btn-sm custom-btn'
        },
        {
          extend: 'pdf',
          text: '<i class="fas fa-file-pdf"></i> PDF',
          className: 'btn btn-secondary btn-sm custom-btn'
        },
        {
          extend: 'print',
          text: '<i class="fas fa-print"></i> Print',
          className: 'btn btn-secondary btn-sm custom-btn'
        }
      ],
      language: {
        search: "Cari:",
        lengthMenu: "Tampilkan _MENU_ data per halaman",
        zeroRecords: "Data tidak ditemukan",
        info: "Menampilkan halaman _PAGE_ dari _PAGES_",
        infoEmpty: "Tidak ada data yang tersedia",
        infoFiltered: "(difilter dari _MAX_ total data)",
        paginate: {
          first: "Pertama",
          last: "Terakhir",
          next: "Selanjutnya",
          previous: "Sebelumnya"
        }
      },
      order: [[1, 'asc']], // Urutkan berdasarkan nama
      pageLength: 10 // Jumlah data per halaman
    });
  });
</script>

<!-- CSS for Custom Button Styling -->
<style>
  /* Gaya kustom tetap sama seperti sebelumnya */
  .custom-btn {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    color: white;
    border: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .custom-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
  }
</style>
