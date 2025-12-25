<?php
include '../../include/koneksi.php';

if (isset($_POST['simpan'])) {
    // Tangkap data
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $jam = mysqli_real_escape_string($koneksi, $_POST['jam']);
    $lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    // --- TAMBAHAN BARU ---
    $link_pendaftaran = mysqli_real_escape_string($koneksi, $_POST['link_pendaftaran']);
    // ---------------------

    // Tentukan status otomatis
    $tgl_acara = new DateTime($tanggal);
    $tgl_skrg = new DateTime();
    $status = ($tgl_acara < $tgl_skrg) ? 'Selesai' : 'Akan Datang';

    // Upload Poster
    $rand = rand();
    $filename = $_FILES['poster']['name'];
    $nama_poster = "";

    if ($filename != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'webp');
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $ukuran = $_FILES['poster']['size'];

        if (in_array(strtolower($ext), $ekstensi_diperbolehkan)) {
            if ($ukuran < 2097152) {
                $nama_poster = $rand . '_' . $filename;
                move_uploaded_file($_FILES['poster']['tmp_name'], '../../assets/uploads/acara/' . $nama_poster);
            } else {
                echo "<script>alert('Ukuran poster terlalu besar!'); window.location='tambah.php';</script>";
                exit;
            }
        } else {
            echo "<script>alert('Format gambar tidak valid!'); window.location='tambah.php';</script>";
            exit;
        }
    }

    // Insert ke Database (TAMBAHKAN link_pendaftaran)
    $query = "INSERT INTO acara (judul, kategori, tanggal, jam, lokasi, deskripsi, poster, status, link_pendaftaran) 
              VALUES ('$judul', '$kategori', '$tanggal', '$jam', '$lokasi', '$deskripsi', '$nama_poster', '$status', '$link_pendaftaran')";

    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>alert('Agenda berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan agenda!'); window.location='tambah.php';</script>";
    }
}
?>