<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Absensi Karyawan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #eef2ff;
            --secondary: #3f3d56;
            --success: #2ec4b6;
            --warning: #ff9f1c;
            --danger: #e71d36;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --gray-300: #dee2e6;
            --gray-400: #ced4da;
            --gray-500: #adb5bd;
            --gray-600: #6c757d;
            --gray-700: #495057;
            --gray-800: #343a40;
            --box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            --border-radius: 10px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fb;
            color: var(--gray-800);
            line-height: 1.5;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .logo h1 {
            font-size: 22px;
            color: var(--secondary);
            font-weight: 600;
        }
        
        .logo img {
            width: 36px;
            height: 36px;
            border-radius: 6px;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .period-select {
            padding: 8px 12px;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            background-color: white;
            color: var(--gray-700);
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            background-color: white;
            border-radius: 6px;
            box-shadow: var(--box-shadow);
        }
        
        .avatar {
            width: 32px;
            height: 32px;
            background-color: var(--primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: 600;
            font-size: 14px;
        }
        
        .user-name {
            font-size: 14px;
            font-weight: 500;
            color: var(--gray-800);
        }
        
        .page-header {
            margin-bottom: 20px;
        }
        
        .page-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .page-title i {
            color: var(--primary);
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .stat-card {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 20px;
            box-shadow: var(--box-shadow);
            position: relative;
            overflow: hidden;
        }
        
        .stat-card .label {
            font-size: 13px;
            color: var(--gray-600);
            margin-bottom: 5px;
            font-weight: 500;
        }
        
        .stat-card .value {
            font-size: 24px;
            font-weight: 700;
            color: var(--gray-800);
        }
        
        .stat-card i {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 20px;
            opacity: 0.15;
        }
        
        .card {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid var(--gray-200);
        }
        
        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--gray-800);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .card-title i {
            color: var(--primary);
        }
        
        .card-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .search {
            position: relative;
        }
        
        .search input {
            padding: 8px 12px 8px 32px;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            font-size: 14px;
            width: 200px;
        }
        
        .search i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-500);
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #3752d0;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 12px 20px;
            text-align: left;
        }
        
        th {
            font-size: 13px;
            font-weight: 600;
            color: var(--gray-600);
            background-color: var(--gray-100);
        }
        
        td {
            font-size: 14px;
            color: var(--gray-800);
            border-bottom: 1px solid var(--gray-200);
        }
        
        tbody tr:hover {
            background-color: var(--gray-100);
        }
        
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .badge-success {
            background-color: rgba(46, 196, 182, 0.15);
            color: var(--success);
        }
        
        .badge-warning {
            background-color: rgba(255, 159, 28, 0.15);
            color: var(--warning);
        }
        
        .action-menu {
            cursor: pointer;
            color: var(--gray-600);
            width: 28px;
            height: 28px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .action-menu:hover {
            background-color: var(--gray-200);
            color: var(--gray-800);
        }
        
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-top: 1px solid var(--gray-200);
            font-size: 13px;
            color: var(--gray-600);
        }
        
        .pagination {
            display: flex;
            gap: 5px;
        }
        
        .page-link {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            color: var(--gray-700);
        }
        
        .page-link:hover {
            background-color: var(--gray-200);
        }
        
        .page-link.active {
            background-color: var(--primary);
            color: white;
        }

         .container1 {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            padding: 30px;
        }
        
        h1 {
            color: var(--primary-color);
            font-size: 24px;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--label-color);
        }
        
        select, input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.2s;
        }
        
        select:focus, input:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        
        textarea {
            resize: vertical;
            min-height: 120px;
        }
        
        .date-inputs {
            display: flex;
            gap: 15px;
        }
        
        .date-inputs .form-group {
            flex: 1;
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon input {
            padding-right: 40px;
        }
        
        .input-icon i {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }
        
        .file-input {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .file-input label {
            display: inline-block;
            margin-bottom: 0;
        }
        
        .file-input-button {
            background-color: #f3f4f6;
            color: #4b5563;
            padding: 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .file-input-button:hover {
            background-color: #e5e7eb;
        }
        
        .file-name {
            color: #6b7280;
            font-size: 14px;
        }
        
        .actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        
        @media (max-width: 640px) {
            .container {
                padding: 20px;
            }
            
            .date-inputs {
                flex-direction: column;
                gap: 20px;
            }
            
            .actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
        
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .user-menu {
                width: 100%;
                justify-content: space-between;
            }
            
            .stats {
                grid-template-columns: 1fr;
            }
            
            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .card-actions {
                width: 100%;
            }
            
            .search input {
                width: 100%;
            }
            
            .card-footer {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="container py-5 my-5">
        
        <div class="page-header">
            <div class="page-title">
                <i class="fas fa-users"></i> Riwayat Absensi Karyawan
            </div>
        </div>
        
        <div class="stats">
            <?php
            // Total Hadir
            $resultHadir = mysqli_query($conn, "SELECT COUNT(*) AS total_hadir FROM absensi");
            $hadir = mysqli_fetch_assoc($resultHadir)['total_hadir'];

            ?>
            <div class="stat-card">
                <div class="label">Total Hadir</div>
                <div class="value"><?= $hadir ?></div>
                <i class="fas fa-user-check"></i>
            </div>
            
            <?php
            // Total Izin
            $resultIzin = mysqli_query($conn, "SELECT COUNT(*) AS total_izin FROM izin");
            $izin = mysqli_fetch_assoc($resultIzin)['total_izin'];
            ?>
            <div class="stat-card">
                <div class="label">Total Izin</div>
                <div class="value"><?= $izin ?></div>
                <i class="fas fa-calendar-minus"></i>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <i class="fas fa-list"></i> Daftar Karyawan
                </div>
                
                <div class="card-actions">
                    <div class="search">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Cari karyawan...">
                    </div>
                    
                    <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">
                        <i class="fas fa-plus"></i> Tambah Izin
                    </button>
                </div>
            </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Hadir</th>
                            <th>Izin</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data = mysqli_query($conn, "SELECT 
                            k.id_karyawan,
                            k.nama_lengkap,
                            COUNT(a.id_karyawan) AS hadir,
                            COUNT(i.id_karyawan) AS izin
                        FROM 
                            pengguna k
                        LEFT JOIN absensi a ON k.id_karyawan = a.id_karyawan
                        LEFT JOIN izin i ON k.id_karyawan = i.id_karyawan
                        GROUP BY k.id_karyawan");

                        $karyawanList = [];
                        while ($row = mysqli_fetch_array($data)) {
                            $karyawanList[] = $row;
                        }
                        ?>
                        <?php $no = 1; foreach ($karyawanList as $d): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['nama_lengkap'] ?></td>
                            <td><?= $d['hadir'] ?></td>
                            <td><?= $d['izin'] ?></td>
                            <td>
                                <button class="btn btn-sm btn-light">⋮</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            
            <div class="card-footer">
                <div>Menampilkan 1-6 dari 6 karyawan</div>
                <div class="pagination">
                    <div class="page-link"><i class="fas fa-chevron-left"></i></div>
                    <div class="page-link active">1</div>
                    <div class="page-link"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body d-flex justify-content-between gap-5">
            <div class="container1">
        <h1>Form Input Izin Karyawan</h1>
        
        <form action="proses-izin.php" method="post" id="leaveForm">
            <div class="form-group">
                <input type="hidden" id="id_karyawan" name="id_karyawan">
                <label for="employee">Pilih Karyawan:</label>
                <select id="employee" name="employee" required>
                    <option value="" disabled selected>-- Pilih Karyawan --</option>
                    <?php foreach ($karyawanList as $d): ?>
                        <option value="<?= $d['id_karyawan'] ?>"><?= $d['nama_lengkap'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="leaveType">Jenis Absensi:</label>
                <select id="leaveType" name="ket_izin" required>
                    <option value="" disabled selected>-- Pilih Jenis Absensi --</option>
                    <option value="cuti">Cuti Tahunan</option>
                    <option value="sakit">Sakit</option>
                    <option value="izin">Izin</option>
                    <option value="remote">Work From Home</option>
                    <option value="dinas">Dinas Luar</option>
                </select>
            </div>
            
            <div class="date-inputs">
                <div class="form-group">
                    <label for="startDate">Tanggal Izin:</label>
                    <div class="input-icon">
                        <input type="date" id="startDate" name="tanggal_izin" required>
                        <i>📅</i>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="reason">Keterangan:</label>
                <textarea id="reason" name="keterangan" placeholder="Masukkan alasan izin/cuti..." required></textarea>
            </div>
            
            <div class="form-group">
                <label>Dokumen Pendukung (opsional):</label>
                <div class="file-input">
                    <input type="file" id="document" name="document" hidden>
                    <label for="document" class="file-input-button">Pilih File</label>
                    <span class="file-name" id="fileName">Tidak ada file dipilih</span>
                </div>
            </div>
            
            <div class="actions">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
  </div>
</div>
    <script>
        // Search functionality
        document.querySelector('.search input').addEventListener('keyup', function(e) {
            const searchText = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                if (name.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        
        // Action menu click handler
        document.querySelectorAll('.action-menu').forEach(menu => {
            menu.addEventListener('click', function() {
                alert('Menu aksi: Detail, Edit, atau Hapus');
            });
        });
        
        // Add leave button click handler
    
    </script>

</body>
</html>

