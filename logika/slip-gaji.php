<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Slip Gaji</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container my-5">
    <div class="card shadow" id="slipGajiCard">
      <div class="card-header bg-warning text-white d-flex justify-content-between">
        <div>
          <h5 class="mb-0">SLIP GAJI</h5>
          <small id="periode">Periode: -</small>
        </div>
        <button class="btn btn-light btn-sm" onclick="window.print()">🖨️</button>
      </div>
      <div class="card-body">
        <h5 class="text-center">TOKO ROTI BAKAR BAHAGIA</h5>
        <p class="text-center text-muted small">ZA Pagar Alam, Kedaton, Bandar Lampung</p>
        <div class="row mb-3">
          <div class="col-4">Nama</div>
          <div class="col-8 fw-semibold" id="namaKaryawan">-</div>
        </div>
        <div class="row mb-3">
          <div class="col-4">Posisi</div>
          <div class="col-8">Karyawan</div>
        </div>
        <div class="row mb-4">
          <div class="col-4">Tanggal Masuk</div>
          <div class="col-8">01 Januari 2023</div>
        </div>

        <h6 class="text-warning">Pendapatan</h6>
        <table class="table table-sm">
          <tbody>
            <tr>
              <td>Gaji Pokok</td>
              <td class="text-end" id="gajiPokok">Rp 0</td>
            </tr>
            <tr>
              <td>Bonus</td>
              <td class="text-end" id="bonus">Rp 0</td>
            </tr>
            <tr class="fw-bold">
              <td>Total Pendapatan</td>
              <td class="text-end text-success" id="total">Rp 0</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer bg-warning-subtle fw-bold fs-5 text-center">
        Total Gaji Diterima: <span id="totalGaji">Rp 0</span>
      </div>
      <div class="text-end p-3">
        <small>Kota Bahagia, 30 Mei 2025</small><br>
        <strong>Sutrisno</strong><br>
        <small>Pemilik</small>
      </div>
    </div>
  </div>

  <script>
    const urlParams = new URLSearchParams(window.location.search);

    function formatRupiah(angka) {
      return 'Rp ' + parseInt(angka).toLocaleString('id-ID');
    }

    document.getElementById('namaKaryawan').textContent = urlParams.get('nama');
    document.getElementById('periode').textContent = `Periode: ${urlParams.get('bulan')} ${urlParams.get('tahun')}`;
    document.getElementById('gajiPokok').textContent = formatRupiah(urlParams.get('gajiPokok'));
    document.getElementById('bonus').textContent = formatRupiah(urlParams.get('bonus'));
    document.getElementById('total').textContent = formatRupiah(urlParams.get('total'));
    document.getElementById('totalGaji').textContent = formatRupiah(urlParams.get('total'));
  </script>
</body>
</html>
