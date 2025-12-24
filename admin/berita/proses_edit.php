<?php
include '../../include/koneksi.php';

if (isset($_POST['update'])) {
    // 1. Tangkap Data Form
    $id       = $_POST['id'];
    $judul    = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $tanggal  = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $status   = mysqli_real_escape_string($koneksi, $_POST['status']);
    $isi      = mysqli_real_escape_string($koneksi, $_POST['isi']);
    
    // Update slug URL (SEO Friendly) sesuai judul baru
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

    // 2. Cek Gambar
    $filename = $_FILES['gambar']['name'];
    
    // === KONDISI A: User Mengupload Gambar Baru ===
    if ($filename != "") {
        $rand = rand();
        $ekstensi =  array('png', 'jpg', 'jpeg', 'webp');
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $ukuran = $_FILES['gambar']['size'];

        // Cek Ekstensi
        if (!in_array($ext, $ekstensi)) {
            echo "<script>alert('Format gambar tidak valid! Gunakan JPG, PNG, atau WEBP.'); window.location='edit.php?id=$id';</script>";
            exit;
        }

        // Cek Ukuran (Max 2MB)
        if ($ukuran > 2097152) {
            echo "<script>alert('Ukuran gambar terlalu besar! Max 2MB.'); window.location='edit.php?id=$id';</script>";
            exit;
        }

        // --- Proses Hapus Gambar Lama ---
        // Kita ambil dulu nama gambar lama dari database
        $query_lama = mysqli_query($koneksi, "SELECT gambar FROM berita WHERE id='$id'");
        $data_lama = mysqli_fetch_assoc($query_lama);
        $foto_lama = $data_lama['gambar'];

        // Cek apakah file lama ada di folder, jika ada, hapus/unlink
        $path_lama = "../../assets/uploads/berita/" . $foto_lama;
        if (file_exists($path_lama) && $foto_lama != "") {
            unlink($path_lama);
        }
        // ---------------------------------

        // Upload Gambar Baru
        $nama_file_baru = $rand . '_' . $filename;
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../../assets/uploads/berita/' . $nama_file_baru);

        // Update Query (Termasuk kolom gambar)
        $query = "UPDATE berita SET 
                  judul = '$judul', 
                  slug = '$slug', 
                  kategori = '$kategori', 
                  tanggal_terbit = '$tanggal', 
                  status = '$status',
                  isi = '$isi',
                  gambar = '$nama_file_baru' 
                  WHERE id = '$id'";

    } else {
        // === KONDISI B: User TIDAK Mengupload Gambar Baru ===
        // Update Query (TANPA kolom gambar)
        $query = "UPDATE berita SET 
                  judul = '$judul', 
                  slug = '$slug', 
                  kategori = '$kategori', 
                  tanggal_terbit = '$tanggal', 
                  status = '$status',
                  isi = '$isi' 
                  WHERE id = '$id'";
    }

    // 3. Eksekusi ke Database
    $update = mysqli_query($koneksi, $query);

    if ($update) {
        echo "<script>alert('Data Berita Berhasil Diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!'); window.location='edit.php?id=$id';</script>";
    }
}
?>