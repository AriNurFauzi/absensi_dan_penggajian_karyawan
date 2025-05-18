<?php
    $conn = mysqli_connect("localhost","root","","absensi_dan_penggajian_karyawan");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
    }

    function registerKaryawan($data) {
        global $conn;
    
        $username       = htmlspecialchars($data['username']);
        $nama_lengkap  = htmlspecialchars($data['nama_lengkap']);
        $jenis_kelamin  = $data['jenis_kelamin'];
        $tanggal_lahir  = $data['tanggal_lahir'];
        $nik            = $data['nik'];
        $no_telp        = htmlspecialchars($data['no_telp']);
        $password       = password_hash($data['password'], PASSWORD_DEFAULT);
    
        // Cek duplikasi username atau NIK
        $cek = $conn->prepare("SELECT id_karyawan FROM karyawan WHERE username = ? OR nik = ?");
        $cek->bind_param("ss", $username, $nik);
        $cek->execute();
        $cek->store_result();
    
        if ($cek->num_rows > 0) {
            return "Username atau NIK sudah terdaftar.";
        }
    
        $stmt = $conn->prepare("INSERT INTO karyawan (username, nama_lengkap, jenis_kelamin, tanggal_lahir, nik, password, no_telp)
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $username, $nama_lengkap, $jenis_kelamin, $tanggal_lahir, $nik, $password, $no_telp);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return "Gagal mendaftar: " . $stmt->error;
        }
    }
?>