<?php
include "koneksi.php";

if (!isset($_GET['id_gaji'])) {
    die("ID gaji tidak diberikan.");
}

$id = $_GET['id_gaji'];
$query = "SELECT * FROM gaji WHERE id_gaji = '$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data slip tidak ditemukan.");
}

$nama = $data['nama_karyawan'];
$bulan = $data['bulan'];
$tahun = $data['tahun'];
$gaji_pokok = $data['gaji_pokok'];
$bonus = $data['Bonus'];
$total = $data['total'];
?>

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
          <small>Periode: <?= htmlspecialchars($bulan) . ' ' . htmlspecialchars($tahun) ?></small>
        </div>
        <button class="btn btn-light btn-sm" onclick="window.print()">🖨️</button>
      </div>
      <div class="card-body">
        <h5 class="text-center">TOKO ROTI BAKAR BAHAGIA</h5>
        <p class="text-center text-muted small">ZA Pagar Alam, Kedaton, Bandar Lampung</p>
        <div class="row mb-3">
          <div class="col-4">Nama</div>
          <div class="col-8 fw-semibold"><?= htmlspecialchars($nama) ?></div>
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
              <td class="text-end">Rp <?= number_format($gaji_pokok, 0, ',', '.') ?></td>
            </tr>
            <tr>
              <td>Bonus</td>
              <td class="text-end">Rp <?= number_format($bonus, 0, ',', '.') ?></td>
            </tr>
            <tr class="fw-bold">
              <td>Total Pendapatan</td>
              <td class="text-end text-success">Rp <?= number_format($total, 0, ',', '.') ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer bg-warning-subtle fw-bold fs-5 text-center">
        Total Gaji Diterima: Rp <?= number_format($total, 0, ',', '.') ?>
      </div>
      <div class="text-end p-3">
        <small>Kedaton, <?= date('d M Y') ?></small><br>
        <strong>Sutrisno</strong><br>
        <small>Pemilik</small>
      </div>
    </div>
  </div>
</body>
</html>
