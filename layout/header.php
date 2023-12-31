<?php
// ...
// Inisialisasi variabel
$nama = ""; // Ini akan menyimpan username jika pengguna sudah login

// Periksa apakah pengguna sudah login
session_start();
if(isset($_SESSION['nama'])) {
    $nama = $_SESSION['nama'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Pemesanan Makanan</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="login.css" />
</head>
<body>
    <!-- navbar -->
    <div class="navbar">
        <ul class="ul-navbar">
            <img src="9a20beb7-c09f-4ed9-bc01-0ec6540accc6.jpg" />
            <li class="li-navbar">
                <a href="index.php" class="a-navbar">Home</a>
            </li>
            <li class="li-navbar">
                <a href="Menu.php" class="a-navbar">Menu</a>
            </li>
            <li class="li-navbar">
                <a href="Kontak-Kami.php" class="a-navbar">Kontak Kami</a>
            </li>
            <li class="li-navbar">
                <a href="Info-Pembayaran.php" class="a-navbar">Info Pembayaran</a>
            </li>
            <?php if(empty($nama)): ?>
            <li class="dropdown">
                <span class="dropspn">Login/Register</span>
                <div class="dropdown-content">
                    <a href="Login.php">Login</a>
                    <a href="Register.php">Register</a>
                </div>
            </li>
            <?php else: ?>
            <li class="li-navbar">
                <a href="Pembayaran.php" class="a-navbar">Pembayaran</a>
            </li>
            <li class="dropdown">
                <span class="dropspn">Hi <?php echo $nama; ?></span>
                <div class="dropdown-content">
                    <a href="Profil.php">Profil</a>
                    <a href="Logout.php">Logout</a>
                </div>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <!-- end navbar -->