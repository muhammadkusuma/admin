<?php
include '../../include/koneksi.php';

if (isset($_POST['simpan'])) {
    // 1. Tangkap input dari form
    $judul    = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $tanggal  = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $isi      = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $penulis  = "Admin"; // Bisa diganti session nama nanti
    $status   = "published"; // Default published

    // 2. Buat Slug (URL ramah SEO) dari judul
    // Contoh: "Berita Hari Ini" menjadi "berita-hari-ini"
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

    // 3. Proses Upload Gambar
    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg', 'webp');
    $filename = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    // Cek apakah user memilih gambar
    if ($filename != "") {
        // Cek ekstensi file
        if (!in_array($ext, $ekstensi)) {
            echo "<script>alert('Format gambar tidak diperbolehkan! Gunakan JPG, PNG, atau WEBP.'); window.location='tambah.php';</script>";
            exit;
        } 
        
        // Cek ukuran file (Maks 2MB = 2048000 bytes)
        if ($ukuran > 2097152) {
            echo "<script>alert('Ukuran gambar terlalu besar! Maksimal 2MB.'); window.location='tambah.php';</script>";
            exit;
        }

        // Jika lolos, buat nama unik dan upload
        $xx = $rand . '_' . $filename;
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../../assets/uploads/berita/' . $xx);
        
        // 4. Simpan ke Database
        $query = "INSERT INTO berita (judul, slug, kategori, tanggal_terbit, isi, gambar, penulis, status) 
                  VALUES ('$judul', '$slug', '$kategori', '$tanggal', '$isi', '$xx', '$penulis', '$status')";
        
        $simpan = mysqli_query($koneksi, $query);

        if ($simpan) {
            echo "<script>alert('Berita berhasil ditambahkan!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan database!'); window.location='tambah.php';</script>";
        }

    } else {
        echo "<script>alert('Harap upload gambar berita!'); window.location='tambah.php';</script>";
    }
}
?>