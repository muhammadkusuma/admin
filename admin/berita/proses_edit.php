<?php
include '../../includes/koneksi.php';

$id      = $_POST['id_berita'];
$judul   = $_POST['judul'];
$isi     = $_POST['isi'];
$tanggal = $_POST['tanggal'];

// Cek gambar baru
$gambar       = $_FILES['gambar']['name'];
$tmp_gambar   = $_FILES['gambar']['tmp_name'];
$folder_tujuan = "../../assets/img/";

if($gambar != "") {
    // 1. KASUS JIKA GANTI GAMBAR
    // Hapus gambar lama dulu
    $data_lama = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita='$id'"));
    unlink("../../assets/img/" . $data_lama['gambar']);

    // Upload baru
    move_uploaded_file($tmp_gambar, $folder_tujuan . $gambar);

    // Update query dengan gambar
    $query = "UPDATE berita SET judul='$judul', isi_berita='$isi', tanggal='$tanggal', gambar='$gambar' WHERE id_berita='$id'";

} else {
    // 2. KASUS JIKA TIDAK GANTI GAMBAR
    $query = "UPDATE berita SET judul='$judul', isi_berita='$isi', tanggal='$tanggal' WHERE id_berita='$id'";
}

$update = mysqli_query($koneksi, $query);

if($update){
    echo "<script>alert('Data berhasil diupdate!'); window.location='index.php';</script>";
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
?><?php
// FILE: admin/berita/proses_edit.php
include '../../includes/koneksi.php';

if(isset($_POST['update'])){
    
    // 1. TANGKAP ID
    $id = $_POST['id_berita'];

    // 2. SANITASI DATA (PENTING AGAR TIDAK ERROR SYNTAX)
    $judul    = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $hari     = mysqli_real_escape_string($koneksi, $_POST['hari']); 
    $isi      = mysqli_real_escape_string($koneksi, $_POST['isi']); // Ini yang bikin error sebelumnya kalau tidak di-escape
    $tanggal  = $_POST['tanggal'];

    // 3. LOGIKA GAMBAR
    $gambar   = $_FILES['gambar']['name'];
    
    // JIKA GANTI GAMBAR
    if($gambar != "") {
        $tmp      = $_FILES['gambar']['tmp_name'];
        $new_img  = date('dmYHis').'-'.str_replace(' ', '-', $gambar);
        $path     = "../../assets/img/".$new_img;

        if(move_uploaded_file($tmp, $path)){
            // Hapus gambar lama dulu (Opsional, agar hemat storage)
            $q_lama = mysqli_query($koneksi, "SELECT gambar FROM berita WHERE id_berita='$id'");
            $d_lama = mysqli_fetch_array($q_lama);
            if(is_file("../../assets/img/".$d_lama['gambar'])) {
                unlink("../../assets/img/".$d_lama['gambar']);
            }

            // Update Semua Kolom Termasuk Gambar
            $query = "UPDATE berita SET 
                      judul       = '$judul',
                      kategori    = '$kategori',
                      hari        = '$hari',
                      isi_berita  = '$isi',
                      tanggal     = '$tanggal',
                      gambar      = '$new_img'
                      WHERE id_berita = '$id'";
        }
    } 
    // JIKA TIDAK GANTI GAMBAR
    else {
        // Update Data Saja Tanpa Gambar
        $query = "UPDATE berita SET 
                  judul       = '$judul',
                  kategori    = '$kategori',
                  hari        = '$hari',
                  isi_berita  = '$isi',
                  tanggal     = '$tanggal'
                  WHERE id_berita = '$id'";
    }

    // 4. EKSEKUSI QUERY
    $result = mysqli_query($koneksi, $query);

    if($result){
        echo "<script>alert('Berita Berhasil Diupdate!'); window.location='index.php';</script>";
    } else {
        // Tampilkan Error Jelas
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}
?>