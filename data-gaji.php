<?php
$query = "SELECT * FROM gaji";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>
<div class="container mt-5 pt-5">
        <div class="row g-0">
            <!-- Sidebar -->

            <!-- Main Content -->
            <div class="col-lg-10 col-md-12 p-3 p-md-4 bg-light">
                <!-- Top Nav for Mobile -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded mb-4 d-lg-none shadow-sm">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <i class="bi bi-building me-2"></i>
                            PayrollApp
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#"><i class="bi bi-cash-coin me-2"></i>Penggajian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="bi bi-people me-2"></i>Karyawan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="bi bi-calendar-check me-2"></i>Absensi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="bi bi-file-earmark-text me-2"></i>Laporan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="bi bi-gear me-2"></i>Pengaturan</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="header-title mb-0">Penggajian Karyawan</h2>
                        <p class="text-muted">Kelola dan lihat data penggajian karyawan</p>
                    </div>
                    <div class="d-flex gap-2">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-funnel me-1"></i> Filter
                            </button>
                            <ul class="dropdown-menu shadow" aria-labelledby="filterDropdown">
                                <li><h6 class="dropdown-header">Status Penggajian</h6></li>
                                <li><a class="dropdown-item" href="#">Semua</a></li>
                                <li><a class="dropdown-item" href="#">Dibayar</a></li>
                                <li><a class="dropdown-item" href="#">Diproses</a></li>
                                <li><a class="dropdown-item" href="#">Tertunda</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><h6 class="dropdown-header">Departemen</h6></li>
                                <li><a class="dropdown-item" href="#">Semua Departemen</a></li>
                                <li><a class="dropdown-item" href="#">IT & Pengembangan</a></li>
                                <li><a class="dropdown-item" href="#">Pemasaran</a></li>
                                <li><a class="dropdown-item" href="#">Penjualan</a></li>
                                <li><a class="dropdown-item" href="#">SDM</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="periodDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-calendar3 me-1"></i> Mei 2025
                            </button>
                            <ul class="dropdown-menu shadow" aria-labelledby="periodDropdown">
                                <li><a class="dropdown-item" href="#">Mei 2025</a></li>
                                <li><a class="dropdown-item" href="#">April 2025</a></li>
                                <li><a class="dropdown-item" href="#">Maret 2025</a></li>
                                <li><a class="dropdown-item" href="#">Februari 2025</a></li>
                            </ul>
                        </div>
                        <a href="?page=6" class="btn btn-primary">
                            <i class="bi bi-plus-lg me-1"></i> Buat Penggajian
                        </a>
                    </div>
                </div>
                <?php

                // Total Gaji
                $resultGaji = mysqli_query($conn, "SELECT SUM(total) AS total_gaji FROM gaji");
                $totalGaji = mysqli_fetch_assoc($resultGaji)['total_gaji'] ?? 0;

                // Total Karyawan
                $resultKaryawan = mysqli_query($conn, "SELECT COUNT(*) AS total_karyawan FROM pengguna WHERE SBG = 'karyawan'");
                $totalKaryawan = mysqli_fetch_assoc($resultKaryawan)['total_karyawan'] ?? 0;

                // Rata-rata Gaji
                $rataRataGaji = $totalKaryawan > 0 ? ($totalGaji / $totalKaryawan) : 0;

                // Format ke Rupiah
                function formatRupiah($angka) {
                    return "Rp " . number_format($angka, 0, ',', '.');
                }
                ?>

                <!-- Stats Cards -->
                <div class="row g-3 mb-4 justify-content-center text-center" >
                    <div class="col-md-3 col-sm-6">
                        <div class="card stat-card h-100">
                            <div class="card-body">
                                <span class="d-block text-muted mb-1">Total Penggajian</span>
                                <h3 class="card-title mb-3"><?= formatRupiah($totalGaji) ?></h3>
                                <p class="card-text text-success mb-0">
                                    <i class="bi bi-graph-up me-1"></i>
                                    <span>2.5% dari bulan lalu</span>
                                </p>
                                <i class="bi bi-cash-stack icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card stat-card h-100">
                            <div class="card-body">
                                <span class="d-block text-muted mb-1">Total Karyawan</span>
                                <h3 class="card-title mb-3"><?= $totalKaryawan ?></h3>
                                <p class="card-text text-primary mb-0">
                                    <i class="bi bi-people me-1"></i>
                                </p>
                                <i class="bi bi-person-badge icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card stat-card h-100">
                            <div class="card-body">
                                <span class="d-block text-muted mb-1">Gaji Rata-rata</span>
                                <h3 class="card-title mb-3"><?= formatRupiah($rataRataGaji) ?></h3>
                                <p class="card-text text-success mb-0">
                                    <i class="bi bi-graph-up me-1"></i>
                                </p>
                                <i class="bi bi-clipboard-data icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Search Bar -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-md-6 col-lg-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Cari karyawan...">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-8 text-md-end">
                                <button class="btn btn-outline-primary me-2">
                                    <i class="bi bi-download me-1"></i> Export Excel
                                </button>
                                <button class="btn btn-outline-secondary">
                                    <i class="bi bi-printer me-1"></i> Cetak
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Payroll Table -->
                <div class="card mb-4">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-4">Karyawan</th>
                                        <th>Hari kerja</th>
                                        <th>Gaji</th>
                                        <th>Bonus</th>
                                        <th>Total</th>
                                        <th class="text-end pe-4">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                        <tr>
                                            <td class="ps-4"><div class="d-flex align-items-center"><div><h6 class="mb-0"><?= htmlspecialchars($row['nama_karyawan']) ?></h6></div></div></td>
                                            <td><?= htmlspecialchars($row['jumlah_hari_masuk']) ?></td>
                                            <td><?= number_format($row['gaji_pokok'], 0, ',', '.') ?></td>
                                            <td><?= number_format($row['Bonus'], 0, ',', '.') ?></td>
                                            <td><strong>Rp <?= number_format($row['total'] === null ? 0 : $row['total'], 0, ',', '.') ?></strong></td>
                                            <td class="text-end pe-4">
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Lihat Detail</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-pdf me-2"></i>Unduh Slip Gaji</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                                <td class="text-end pe-4">
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Lihat Detail</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-pdf me-2"></i>Unduh Slip Gaji</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                                                </ul>
                                            </div>
                                        </td>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-muted small mb-0">
                                Menampilkan <span class="fw-medium">1</span> sampai <span class="fw-medium">2</span> dari <span class="fw-medium">8</span> karyawan
                            </p>
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Selanjutnya</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>