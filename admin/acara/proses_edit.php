<?php
include '../../include/koneksi.php';

if (isset($_POST['update'])) {
    // 1. Tangkap data dari form
    $id = $_POST['id'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $jam = mysqli_real_escape_string($koneksi, $_POST['jam']);
    $lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $link_pendaftaran = mysqli_real_escape_string($koneksi, $_POST['link_pendaftaran']);

    // 2. Cek apakah user mengganti poster?
    $filename = $_FILES['poster']['name'];

    // === KONDISI A: User Mengupload Poster Baru ===
    if ($filename != "") {
        $rand = rand();
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'webp');
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $ukuran = $_FILES['poster']['size'];

        // Validasi Ekstensi
        if (!in_array(strtolower($ext), $ekstensi_diperbolehkan)) {
            echo "<script>alert('Format gambar tidak valid! Gunakan JPG, PNG, atau WEBP.'); window.location='edit.php?id=$id';</script>";
            exit;
        }

        // Validasi Ukuran (Max 2MB)
        if ($ukuran > 2097152) {
            echo "<script>alert('Ukuran poster terlalu besar! Maksimal 2MB.'); window.location='edit.php?id=$id';</script>";
            exit;
        }

        // --- Hapus Poster Lama ---
        $q_lama = mysqli_query($koneksi, "SELECT poster FROM acara WHERE id='$id'");
        $d_lama = mysqli_fetch_assoc($q_lama);
        $poster_lama = $d_lama['poster'];

        if ($poster_lama != "" && file_exists("../../assets/uploads/acara/" . $poster_lama)) {
            unlink("../../assets/uploads/acara/" . $poster_lama);
        }
        // -------------------------

        // Upload Poster Baru
        $nama_poster_baru = $rand . '_' . $filename;
        move_uploaded_file($_FILES['poster']['tmp_name'], '../../assets/uploads/acara/' . $nama_poster_baru);

        // Query Update (Dengan Poster)
        $query = "UPDATE acara SET 
                  judul='$judul', 
                  kategori='$kategori', 
                  tanggal='$tanggal', 
                  jam='$jam', 
                  lokasi='$lokasi', 
                  status='$status',
                  deskripsi='$deskripsi', 
                  poster='$nama_poster_baru',
                  link_pendaftaran='$link_pendaftaran'
                  WHERE id='$id'";

    } else {
        // === KONDISI B: Tidak Ganti Poster ===
        // Query Update (Tanpa mengubah kolom poster)
        $query = "UPDATE acara SET 
                  judul='$judul', 
                  kategori='$kategori', 
                  tanggal='$tanggal', 
                  jam='$jam', 
                  lokasi='$lokasi', 
                  status='$status',
                  deskripsi='$deskripsi',
                  link_pendaftaran='$link_pendaftaran'
                  WHERE id='$id'";
    }

    // 3. Eksekusi Query
    $update = mysqli_query($koneksi, $query);

    if ($update) {
        echo "<script>alert('Agenda berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui agenda!'); window.location='edit.php?id=$id';</script>";
    }
}
?>