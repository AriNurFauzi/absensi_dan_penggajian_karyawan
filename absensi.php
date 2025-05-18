<div class="container py-4 mt-5  pt-5">
        <div class="card mb-4">
            <!-- Header -->
            <div class="card-header bg-white">
                <h4 class="mb-1">Riwayat Absensi</h4>
                <p class="text-muted small mb-0">Lihat dan unduh riwayat kehadiran Anda</p>
            </div>
            
            <!-- Filter Section -->
            <div class="card-body border-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="monthDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-calendar3"></i> Mei 2025
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="monthDropdown">
                                <li><a class="dropdown-item" href="#">Mei 2025</a></li>
                                <li><a class="dropdown-item" href="#">April 2025</a></li>
                                <li><a class="dropdown-item" href="#">Maret 2025</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex gap-2 justify-content-md-end">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control" placeholder="Cari...">
                            </div>
                            <button class="btn btn-outline-secondary d-flex align-items-center" type="button">
                                <i class="bi bi-funnel"></i>
                            </button>
                            <button class="btn btn-primary d-flex align-items-center" type="button">
                                <i class="bi bi-download me-1"></i> Unduh
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tabs -->
            <div class="card-body pb-0">
                <ul class="nav nav-tabs" id="attendanceTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">Semua</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="present-tab" data-bs-toggle="tab" data-bs-target="#present" type="button" role="tab" aria-controls="present" aria-selected="false">Hadir</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="late-tab" data-bs-toggle="tab" data-bs-target="#late" type="button" role="tab" aria-controls="late" aria-selected="false">Terlambat</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="leave-tab" data-bs-toggle="tab" data-bs-target="#leave" type="button" role="tab" aria-controls="leave" aria-selected="false">Izin/Cuti</button>
                    </li>
                </ul>
            </div>
            
            <!-- Tab Content -->
            <div class="card-body">
                <div class="tab-content" id="attendanceTabsContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Status</th>
                                        <th>Lokasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>01 Mei 2025</div>
                                            <small class="text-muted">Kamis</small>
                                        </td>
                                        <td>10:00</td>
                                        <td>22:05</td>
                                        <td>
                                            <span class="badge badge-hadir">
                                                <i class="bi bi-check-circle-fill me-1"></i> Hadir
                                            </span>
                                        </td>
                                        <td>Kantor</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>30 April 2025</div>
                                            <small class="text-muted">Rabu</small>
                                        </td>
                                        <td>10:00</td>
                                        <td>22:00</td>
                                        <td>
                                            <span class="badge badge-hadir">
                                                <i class="bi bi-check-circle-fill me-1"></i> Hadir
                                            </span>
                                        </td>
                                        <td>Kantor</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>29 April 2025</div>
                                            <small class="text-muted">Selasa</small>
                                        </td>
                                        <td>10:00</td>
                                        <td>22:00</td>
                                        <td>
                                            <span class="badge badge-terlambat">
                                                <i class="bi bi-exclamation-triangle-fill me-1"></i> Terlambat
                                            </span>
                                        </td>
                                        <td>Kantor</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>28 April 2025</div>
                                            <small class="text-muted">Senin</small>
                                        </td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>
                                            <span class="badge badge-izin">
                                                <i class="bi bi-calendar-x-fill me-1"></i> Izin Sakit
                                            </span>
                                        </td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>26 April 2025</div>
                                            <small class="text-muted">Sabtu</small>
                                        </td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>
                                            <span class="badge badge-libur">
                                                <i class="bi bi-house-fill me-1"></i> Libur
                                            </span>
                                        </td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <p class="text-muted small mb-0">
                                Menampilkan <span class="fw-medium">1</span> sampai <span class="fw-medium">5</span> dari <span class="fw-medium">24</span> data
                            </p>
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Selanjutnya</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                    <!-- Other tab panes would go here but are hidden for brevity -->
                    <div class="tab-pane fade" id="present" role="tabpanel" aria-labelledby="present-tab">
                        <!-- Content for "Hadir" tab -->
                    </div>
                    <div class="tab-pane fade" id="late" role="tabpanel" aria-labelledby="late-tab">
                        <!-- Content for "Terlambat" tab -->
                    </div>
                    <div class="tab-pane fade" id="leave" role="tabpanel" aria-labelledby="leave-tab">
                        <!-- Content for "Izin/Cuti" tab -->
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Summary Cards -->
        <div class="row g-3">
            <div class="col-6 col-md-3">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <h6 class="text-muted small">Total Hari Kerja</h6>
                        <h3 class="mb-0">22</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <h6 class="text-muted small">Hadir</h6>
                        <h3 class="mb-0 text-success">19</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <h6 class="text-muted small">Terlambat</h6>
                        <h3 class="mb-0 text-warning">2</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <h6 class="text-muted small">Izin/Cuti</h6>
                        <h3 class="mb-0 text-primary">1</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>