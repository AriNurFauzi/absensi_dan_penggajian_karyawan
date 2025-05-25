<?php
$query_pengguna = "SELECT id_karyawan, nama_lengkap FROM pengguna";
$result_pengguna = mysqli_query($conn, $query_pengguna);
if (!$result_pengguna) {
    die("Query error: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Perhitungan Gaji - Toko Roti Bakar Bahagia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container my-5">
    <div class="card shadow">
      <div class="card-header bg-warning text-white d-flex justify-content-between align-items-center">
        <div>
          <h5 class="mb-0">PERHITUNGAN GAJI</h5>
          <small>Toko Roti Bakar Bahagia</small>
        </div>
        <div>
          <button class="btn btn-light btn-sm me-2">💾</button>
          <button class="btn btn-light btn-sm">🖨️</button>
        </div>
      </div>
    <form action="proses-penggajian.php" method="post">
      <div class="card-body">
        <div class="mb-3">
          <label for="namaKaryawan" class="form-label">Nama Karyawan</label>
          <select name="nama" class="form-select" id="namaKaryawan">
              <option value="">-- Pilih Karyawan --</option>
              <?php while ($row = mysqli_fetch_assoc($result_pengguna)) : ?>
                  <option value="<?= htmlspecialchars($row['nama_lengkap']) ?>"><?= htmlspecialchars($row['nama_lengkap']) ?></option>
              <?php endwhile; ?>
          </select>
      </div>

        <div class="row g-3 mb-3">
          <div class="col">
            <label for="bulan" class="form-label">Bulan</label>
            <select name="bulan" class="form-select" id="bulan">
              <option selected>Januari</option>
              <option selected>Februari</option>
              <option selected>Maret</option>
              <option selected>April</option>
              <option selected>Mei</option>
              <option selected>Juni</option>
              <option selected>Juli</option>
              <option selected>Agustus</option>
              <option selected>September</option>
              <option selected>Oktober</option>
              <option selected>November</option>
              <option selected>Desember</option>

            </select>
          </div>
          <div class="col">
            <label for="tahun" class="form-label">Tahun</label>
            <select name="tahun" class="form-select" id="tahun">
              <option selected>2025</option>
            </select>
          </div>
        </div>

        <div class="row g-3 mb-3">
          <div class="col">
            <label for="hariMasuk" class="form-label">Jumlah Hari Masuk</label>
            <input name="harimasuk"type="number" class="form-control" id="hariMasuk" value="0" min="0" max="31">
            <div class="form-text">Maksimal 31 hari</div>
          </div>
          <div class="col">
            <label for="hariLibur" class="form-label">Jumlah Hari Libur</label>
            <input name="harilibur"type="number" class="form-control" id="hariLibur" value="0" min="0">
          </div>
        </div>

        <div class="mb-3">
          <label for="bonus" class="form-label">Bonus (Rp)</label>
          <input name="bonus" type="number" class="form-control" id="bonus" value="0" min="0">
        </div>

        <div class="bg-light p-3 border rounded">
          <h6 class="text-warning mb-3">Hasil Perhitungan Gaji</h6>
          <p>Gaji Harian: <span id="gajiHarian">Rp 100.000</span></p>
          <p>Jumlah Hari Masuk: <span id="tampilHariMasuk">0 hari</span></p>
          <p>Total Gaji Pokok: <span id="totalGajiPokok">Rp 0</span></p>
          <p>Bonus: <span id="tampilBonus">Rp 0</span></p>
          <p class="fw-bold">Total Gaji: <span id="totalGaji">Rp 0</span></p>
           <input name="totalGaji" type="hidden" class="form-control" id="bonus" value="0" min="0">
        </div>
      </div>
      <div class="card-footer bg-warning-subtle text-center fw-bold fs-5">
        Total Gaji Diterima: <span id="gajiDiterima">Rp 0</span>
      </div>
        <div class="text-center my-3">
          <button type="submit" class="btn btn-primary w-100" onclick="bukaSlip()">Buat Slip Gaji</button>
        </div>

    </form>
    </div>
  </div>

  <script>
    const gajiHarian = 100000;

    const hariMasukInput = document.getElementById('hariMasuk');
    const bonusInput = document.getElementById('bonus');
    const tampilHariMasuk = document.getElementById('tampilHariMasuk');
    const tampilBonus = document.getElementById('tampilBonus');
    const totalGajiPokok = document.getElementById('totalGajiPokok');
    const totalGaji = document.getElementById('totalGaji');
    const gajiDiterima = document.getElementById('gajiDiterima');

    function formatRupiah(angka) {
      return 'Rp ' + angka.toLocaleString('id-ID');
    }

    function hitungGaji() {
      const hariMasuk = parseInt(hariMasukInput.value) || 0;
      const bonus = parseInt(bonusInput.value) || 0;
      const totalPokok = hariMasuk * gajiHarian;
      const total = totalPokok + bonus;

      tampilHariMasuk.textContent = `${hariMasuk} hari`;
      tampilBonus.textContent = formatRupiah(bonus);
      totalGajiPokok.textContent = formatRupiah(totalPokok);
      totalGaji.textContent = formatRupiah(total);
      gajiDiterima.textContent = formatRupiah(total);
    }

    hariMasukInput.addEventListener('input', hitungGaji);
    bonusInput.addEventListener('input', hitungGaji);

    function bukaSlip() {
    const nama = document.getElementById('namaKaryawan').value;
    const bulan = document.getElementById('bulan').value;
    const tahun = document.getElementById('tahun').value;
    const hariMasuk = parseInt(document.getElementById('hariMasuk').value) || 0;
    const bonus = parseInt(document.getElementById('bonus').value) || 0;

    const gajiPokok = hariMasuk * 100000;
    const totalGaji = gajiPokok + bonus;

    if (!nama || hariMasuk === 0) {
      alert("Isi nama dan hari masuk terlebih dahulu.");
      return;
    }

    // Bangun query string untuk dikirim
    const params = new URLSearchParams({
      nama: nama,
      bulan: bulan,
      tahun: tahun,
      gajiPokok: gajiPokok,
      bonus: bonus,
      total: totalGaji
    });

  
  }
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
