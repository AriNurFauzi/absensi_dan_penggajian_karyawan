<div class="container-fluid bg-light pt-5 mt-5 pb-5">
<span class=""><h5><i class="fa-solid fa-user-group"></i> Data Karyawan</h5></span>
    <div class="d-flex justify-content-between">
        <div class="tombol mt-3 d-flex gap-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-square-plus"></i> Tambah Data</button>
            <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Hapus Data</button>
        </div>
        <div class="d-flex flex-row">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
        </div>
    </div>
<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Karyawan</th>
      <th scope="col">NIK</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">No Telp</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      $query = "SELECT * FROM pengguna";
      $tampil = $conn->query($query);

      if ($tampil->num_rows > 0) {
          while ($row = $tampil->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $no++ . "</td>";
              echo "<td>" . $row['nama_lengkap'] . "</td>";
              echo "<td>" . $row['nik'] . "</td>";
              echo "<td>" . $row['tanggal_lahir'] . "</td>";
              echo "<td>" . $row['jenis_kelamin'] . "</td>";
              echo "<td>" . $row['no_telp'] . "</td>";
              echo "<td>
              <div class='dropdown'>
                  <a class='text-decoration-none dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                      Aksi
                  </a>

                  <ul class='dropdown-menu'>
                      <li><a class='dropdown-item' href='#'>Update Data</a></li>
                      <li><a class='dropdown-item' href='#'>Hapus Data</a></li>
                      <li><a class='dropdown-item' href='#'>Something else here</a></li>
                  </ul>
              </div>
              </td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='5'>Data tidak ditemukan</td></tr>";
      }
    ?>
  </tbody>
</table>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $hasil = registerKaryawan($_POST);

    if ($hasil === true) {
        echo "Registrasi berhasil!";
    } else {
        echo $hasil;
    }
}
?>
<div class="modal fade" id="modalHapusKaryawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Karyawan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post">
        <div class="modal-body d-flex justify-content-between gap-5">
          <div class="kiri w-100">
              <div class="mb-3">
                  <label for="basic-url" class="form-label fw-medium">Username</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="username" name="username" aria-describedby="basic-addon3 basic-addon4">
                  </div>
              </div>
              <div class="mb-3">
                  <label for="basic-url" class="form-label fw-medium">Password</label>
                  <div class="input-group">
                      <input type="password" class="form-control" id="password" name="password" aria-describedby="basic-addon3 basic-addon4">
                  </div>
              </div>
              <div class="mb-3">
                  <label for="basic-url" class="form-label fw-medium">Nomor Induk Kependudukan</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="nik" name="nik" aria-describedby="basic-addon3 basic-addon4">
                  </div>
              </div>
              <div class="mb-3">
                  <label for="basic-url" class="form-label fw-medium">Tanggal Lahir</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" aria-describedby="basic-addon3 basic-addon4">
                  </div>
              </div>
          </div>
          <div class="kanan  w-100">
              <div class="mb-3">
                    <label for="basic-url" class="form-label fw-medium">Nama karyawan</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" aria-describedby="basic-addon3 basic-addon4">
                    </div>
              </div>
              <div class="mb-3">
                  <label for="basic-url" class="form-label fw-medium">Jenis Kelamin</label>
                  <div class="input-group">
                    <select class="form-select"  id="jenis_kelamin" name="jenis_kelamin">
                      <option value="" selected>Pilih Jenis Kelamin</option>
                      <option value="Laki - Laki">Laki - Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
              </div>
              <div class="mb-3">
                  <label for="basic-url" class="form-label fw-medium">No Telepon</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="no_telp" name="no_telp" aria-describedby="basic-addon3 basic-addon4">
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="modalHapusKaryawan" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Header -->
      <div class="modal-header border-0">
        <h5 class="modal-title text-danger fw-bold" id="modalHapusLabel">Hapus Data Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <div class="d-flex align-items-center mb-3">
          <div class="me-3">
            <img src="https://via.placeholder.com/50" class="rounded-circle" alt="Foto Karyawan">
          </div>
          <div>
            <h6 class="mb-0 fw-bold">Ahmad Radin Intan Saputra</h6>
            <small class="text-muted">Karyawan Toko Roti Bakar Bahagia</small>
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-6"><strong>NIK:</strong> 01010101010</div>
          <div class="col-6"><strong>Tanggal Lahir:</strong> 010101</div>
          <div class="col-6"><strong>Jenis Kelamin:</strong> Laki - Laki</div>
          <div class="col-6"><strong>No Telp:</strong> 0808080808</div>
        </div>

        <div class="alert alert-danger mt-3">
          <strong>Peringatan:</strong> Tindakan ini tidak dapat dibatalkan. Semua data yang terkait dengan karyawan ini akan dihapus secara permanen dari sistem.
        </div>

        <div class="mb-3">
          <label for="alasanPenghapusan" class="form-label">Alasan penghapusan:</label>
          <select class="form-select" id="alasanPenghapusan">
            <option value="">Pilih alasan</option>
            <option value="Mengundurkan diri">Mengundurkan diri</option>
            <option value="Dikeluarkan">Dikeluarkan</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" onclick="hapusData()">Hapus Data</button>
      </div>

    </div>
  </div>
</div>