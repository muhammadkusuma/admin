<?php
include '../../include/koneksi.php';

// Tangkap Data
$id = $_POST['id'];
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
$angkatan = mysqli_real_escape_string($koneksi, $_POST['angkatan']);
$no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
$jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
$divisi = mysqli_real_escape_string($koneksi, $_POST['divisi']);
$urutan = mysqli_real_escape_string($koneksi, $_POST['urutan']);

// Cek Foto Baru
$filename = $_FILES['foto']['name'];

if ($filename != "") {
    $rand = rand();
    $ekstensi = array('png', 'jpg', 'jpeg', 'webp');
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (in_array($ext, $ekstensi)) {
        // Hapus foto lama
        $q_lama = mysqli_query($koneksi, "SELECT foto FROM anggota WHERE id='$id'");
        $d_lama = mysqli_fetch_assoc($q_lama);
        if ($d_lama['foto'] != "default.jpg" && file_exists("../../assets/uploads/anggota/" . $d_lama['foto'])) {
            unlink("../../assets/uploads/anggota/" . $d_lama['foto']);
        }

        // Upload baru
        $nama_foto = $rand . '_' . $filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], '../../assets/uploads/anggota/' . $nama_foto);

        $query = "UPDATE anggota SET nama='$nama', nim='$nim', angkatan='$angkatan', no_hp='$no_hp', jabatan='$jabatan', divisi='$divisi', urutan='$urutan', foto='$nama_foto' WHERE id='$id'";
    } else {
        echo "<script>alert('Format foto salah!'); window.location='edit.php?id=$id';</script>";
        exit;
    }
} else {
    // Update tanpa ganti foto
    $query = "UPDATE anggota SET nama='$nama', nim='$nim', angkatan='$angkatan', no_hp='$no_hp', jabatan='$jabatan', divisi='$divisi', urutan='$urutan' WHERE id='$id'";
}

$update = mysqli_query($koneksi, $query);

if ($update) {
    echo "<script>alert('Data anggota berhasil diupdate!'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal update data!'); window.location='edit.php?id=$id';</script>";
}
?>