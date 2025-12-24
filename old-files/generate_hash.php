<?php
// FILE: generate_hash.php
// Gunakan file ini hanya untuk men-generate password admin

$password_yang_mau_dipakai = "admin123"; // Ganti dengan password keinginan Anda

// Membuat Hash Bcrypt
$hash_bcrypt = password_hash($password_yang_mau_dipakai, PASSWORD_DEFAULT);

echo "<h3>Generator Password Bcrypt</h3>";
echo "Password Asli: <b>" . $password_yang_mau_dipakai . "</b><br>";
echo "Kode Hash (Copy ini ke Database): <br>";
echo "<textarea cols='70' rows='3'>" . $hash_bcrypt . "</textarea>";
?>