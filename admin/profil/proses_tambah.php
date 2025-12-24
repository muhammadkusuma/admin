<?php
include '../../include/koneksi.php';

if (isset($_POST['simpan'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $urutan = mysqli_real_escape_string($koneksi, $_POST['urutan']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi_konten']);

    // Upload Gambar (Opsional)
    $rand = rand();
    $filename = $_FILES['gambar']['name'];
    $nama_gambar = "";

    if ($filename != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'webp');
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $ukuran = $_FILES['gambar']['size'];

        if (in_array(strtolower($ext), $ekstensi_diperbolehkan)) {
            if ($ukuran < 2097152) { // Max 2MB
                $nama_gambar = $rand . '_' . $filename;
                move_uploaded_file($_FILES['gambar']['tmp_name'], '../../assets/uploads/profil/' . $nama_gambar);
            } else {
                echo "<script>alert('Ukuran gambar terlalu besar! Maksimal 2MB.'); window.location='tambah.php';</script>";
                exit;
            }
        } else {
            echo "<script>alert('Format gambar tidak valid!'); window.location='tambah.php';</script>";
            exit;
        }
    }

    // Insert ke Database
    // Perhatikan nama kolom database: judul_bagian, isi_konten, urutan, gambar
    $query = "INSERT INTO profil (judul_bagian, isi_konten, urutan, gambar) 
              VALUES ('$judul', '$isi', '$urutan', '$nama_gambar')";

    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>alert('Bagian profil berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data!'); window.location='tambah.php';</script>";
    }
}
?>