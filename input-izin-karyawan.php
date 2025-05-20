<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Izin Karyawan</title>
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --border-color: #e5e7eb;
            --bg-color: #f9fafb;
            --text-color: #374151;
            --label-color: #4b5563;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
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
        
        .btn {
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
        }
        
        .btn-secondary {
            background-color: white;
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }
        
        .btn-secondary:hover {
            background-color: #f9fafb;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Input Izin Karyawan</h1>
        
        <form id="leaveForm">
            <div class="form-group">
                <label for="employee">Pilih Karyawan:</label>
                <select id="employee" name="employee" required>
                    <option value="" disabled selected>-- Pilih Karyawan --</option>
                    <option value="1">Ahmad Fauzi</option>
                    <option value="2">Siti Nuraini</option>
                    <option value="3">Budi Santoso</option>
                    <option value="4">Dewi Pratiwi</option>
                    <option value="5">Rudi Hermawan</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="leaveType">Jenis Absensi:</label>
                <select id="leaveType" name="leaveType" required>
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
                    <label for="startDate">Tanggal Mulai:</label>
                    <div class="input-icon">
                        <input type="date" id="startDate" name="startDate" required>
                        <i>📅</i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="endDate">Tanggal Selesai:</label>
                    <div class="input-icon">
                        <input type="date" id="endDate" name="endDate" required>
                        <i>📅</i>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="reason">Keterangan:</label>
                <textarea id="reason" name="reason" placeholder="Masukkan alasan izin/cuti..." required></textarea>
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
    
    <script>
        // Handle file input display
        document.getElementById('document').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Tidak ada file dipilih';
            document.getElementById('fileName').textContent = fileName;
        });
        
        // Form submission
        document.getElementById('leaveForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Collect form data
            const formData = new FormData(this);
            const formValues = Object.fromEntries(formData.entries());
            
            // Here you would typically send data to your server
            console.log('Form submitted with values:', formValues);
            
            // Show success message (in real app this would happen after successful server response)
            alert('Permintaan izin berhasil diajukan!');
            
            // Optional: reset the form
            // this.reset();
            // document.getElementById('fileName').textContent = 'Tidak ada file dipilih';
        });
    </script>
</body>
</html>