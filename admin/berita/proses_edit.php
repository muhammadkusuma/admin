<?php
include '../../include/koneksi.php';

if (isset($_POST['update'])) {
    $id       = $_POST['id'];
    $judul    = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $status   = mysqli_real_escape_string($koneksi, $_POST['status']);
    $tanggal  = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $isi      = mysqli_real_escape_string($koneksi, $_POST['isi']);
    
    // Update Slug juga agar sesuai judul baru
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

    // Persiapan Gambar
    $filename = $_FILES['gambar']['name'];
    
    // LOGIKA 1: Jika User Mengupload Gambar Baru
    if ($filename != "") {
        $rand = rand();
        $ekstensi =  array('png', 'jpg', 'jpeg', 'webp');
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $ukuran = $_FILES['gambar']['size'];

        // Validasi
        if (!in_array($ext, $ekstensi)) {
            echo "<script>alert('Format gambar salah!'); window.location='edit.php?id=$id';</script>";
            exit;
        }

        // Upload gambar baru
        $xx = $rand . '_' . $filename;
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../../assets/uploads/berita/' . $xx);

        // Hapus gambar lama agar server tidak penuh
        $query_lama = mysqli_query($koneksi, "SELECT gambar FROM berita WHERE id='$id'");
        $data_lama = mysqli_fetch_assoc($query_lama);
        $file_lama = "../../assets/uploads/berita/" . $data_lama['gambar'];
        
        if (file_exists($file_lama) && $data_lama['gambar'] != "") {
            unlink($file_lama);
        }

        // Update database DENGAN gambar baru
        $query = "UPDATE berita SET 
                  judul = '$judul', 
                  slug = '$slug', 
                  kategori = '$kategori', 
                  tanggal_terbit = '$tanggal', 
                  isi = '$isi', 
                  status = '$status',
                  gambar = '$xx' 
                  WHERE id = '$id'";

    } else {
        // LOGIKA 2: Jika User TIDAK Mengupload Gambar Baru (Hanya edit teks)
        $query = "UPDATE berita SET 
                  judul = '$judul', 
                  slug = '$slug', 
                  kategori = '$kategori', 
                  tanggal_terbit = '$tanggal', 
                  status = '$status',
                  isi = '$isi' 
                  WHERE id = '$id'";
    }

    // Eksekusi Query
    $update = mysqli_query($koneksi, $query);

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!'); window.location='edit.php?id=$id';</script>";
    }
}
?>