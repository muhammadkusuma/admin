<?php
// FILE: admin/anggota/edit.php
include '../../includes/koneksi.php';

// 1. Ambil ID dari URL (Pastikan ID ada)
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // PERBAIKAN 1: Menggunakan 'id_user' sesuai screenshot database
    // Pastikan nama tabelnya benar 'users'. Jika nama tabel Anda 'anggota', ganti 'users' jadi 'anggota'
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$id'");
    
    // Cek apakah data ditemukan
    if(mysqli_num_rows($query) == 0){
        echo "<script>alert('Data tidak ditemukan di database!'); window.location='index.php';</script>";
        exit; // Stop proses jika data kosong
    }

    $data = mysqli_fetch_array($query);
} else {
    header("Location: index.php");
}

// 2. Proses Simpan Perubahan
if(isset($_POST['update'])) {
    $nim     = mysqli_real_escape_string($koneksi, $_POST['nim']);
    // PERBAIKAN 2: Variable penampung inputan form
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']); 
    $jabatan = $_POST['jabatan'];
    $divisi  = $_POST['divisi'];
    $password_baru = $_POST['password'];
    $foto_lama = $_POST['foto_lama'];
    
    // Logika Password
    if(!empty($password_baru)){
        $password_fix = $password_baru; 
    } else {
        $password_fix = $data['password'];
    }

    // Logika Foto
    if($_FILES['foto']['name'] != "") {
        $filename = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $new_name = rand(100,999).'-'.$filename;
        
        // Hapus foto lama
        if($foto_lama != "" && file_exists("../../assets/img/".$foto_lama)){
            unlink("../../assets/img/".$foto_lama);
        }
        
        move_uploaded_file($tmp_name, '../../assets/img/'.$new_name);
        $foto_db = $new_name;
    } else {
        $foto_db = $foto_lama;
    }

    // PERBAIKAN 3: Update Query menggunakan nama kolom yang sesuai database ('nama_lengkap' dan 'id_user')
    $update = mysqli_query($koneksi, "UPDATE users SET 
              nim='$nim', 
              nama_lengkap='$nama', 
              jabatan='$jabatan', 
              divisi='$divisi', 
              password='$password_fix', 
              foto='$foto_db' 
              WHERE id_user='$id'");

    if($update) {
        echo "<script>alert('Data Anggota Berhasil Diupdate!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal Update Database! Error: ".mysqli_error($koneksi)."');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Anggota</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-2">Edit Data Anggota</h2>
        
        <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="foto_lama" value="<?php echo $data['foto']; ?>">

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 text-sm font-bold text-gray-700">NIM</label>
                    <input type="text" name="nim" value="<?php echo $data['nim']; ?>" required class="w-full border p-2 rounded bg-gray-50">
                </div>
                <div>
                    <label class="block mb-1 text-sm font-bold text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama" value="<?php echo $data['nama_lengkap']; ?>" required class="w-full border p-2 rounded bg-gray-50">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 text-sm font-bold text-gray-700">Jabatan</label>
                    <select name="jabatan" class="w-full border p-2 rounded bg-gray-50">
                        <option value="<?php echo $data['jabatan']; ?>" selected hidden><?php echo $data['jabatan']; ?></option>
                        <option value="Ketua Umum">Ketua Umum</option>
                        <option value="Sekretaris">Sekretaris</option>
                        <option value="Bendahara">Bendahara</option>
                        <option value="Anggota">Anggota</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1 text-sm font-bold text-gray-700">Divisi</label>
                    <select name="divisi" class="w-full border p-2 rounded bg-gray-50">
                        <option value="<?php echo $data['divisi']; ?>" selected hidden><?php echo $data['divisi']; ?></option>
                        <option value="-">- Tidak Ada -</option>
                        <option value="Kominfo">Kominfo</option>
                        <option value="Humas">Humas</option>
                        <option value="Kaderisasi">Kaderisasi</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block mb-1 text-sm font-bold text-gray-700">Password Login</label>
                <input type="text" name="password" placeholder="Isi jika ingin mengganti password" class="w-full border p-2 rounded bg-gray-50">
            </div>

            <div>
                <label class="block mb-1 text-sm font-bold text-gray-700">Foto Profil</label>
                <?php if(!empty($data['foto'])): ?>
                    <img src="../../assets/img/<?php echo $data['foto']; ?>" class="w-16 h-16 rounded object-cover mb-2 border">
                <?php endif; ?>
                <input type="file" name="foto" class="w-full text-sm">
                <p class="text-xs text-red-500 mt-1">*Biarkan kosong jika tidak ganti foto.</p>
            </div>

            <div class="flex gap-2 pt-4">
                <button type="submit" name="update" class="flex-1 bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700">Simpan</button>
                <a href="index.php" class="flex-1 bg-gray-200 text-gray-700 font-bold py-2 rounded text-center hover:bg-gray-300">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>