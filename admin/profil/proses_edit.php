<?php
include '../../include/koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $urutan = mysqli_real_escape_string($koneksi, $_POST['urutan']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi_konten']);

    // Cek Gambar Baru
    $filename = $_FILES['gambar']['name'];

    if ($filename != "") {
        // Proses Ganti Gambar
        $rand = rand();
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $ukuran = $_FILES['gambar']['size'];

        // Hapus Gambar Lama
        $q_lama = mysqli_query($koneksi, "SELECT gambar FROM profil WHERE id='$id'");
        $d_lama = mysqli_fetch_assoc($q_lama);
        if ($d_lama['gambar'] != "" && file_exists("../../assets/uploads/profil/" . $d_lama['gambar'])) {
            unlink("../../assets/uploads/profil/" . $d_lama['gambar']);
        }

        // Upload Baru
        $nama_gambar = $rand . '_' . $filename;
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../../assets/uploads/profil/' . $nama_gambar);

        $query = "UPDATE profil SET judul_bagian='$judul', isi_konten='$isi', urutan='$urutan', gambar='$nama_gambar' WHERE id='$id'";
    } else {
        // Update Tanpa Gambar
        $query = "UPDATE profil SET judul_bagian='$judul', isi_konten='$isi', urutan='$urutan' WHERE id='$id'";
    }

    $update = mysqli_query($koneksi, $query);

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!'); window.location='edit.php?id=$id';</script>";
    }
}
?>