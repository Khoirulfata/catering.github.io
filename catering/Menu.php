<?php 
	include"layout/header.php";
?>
    <!-- content -->
    <div>
        <ul class="daftar">
            <li class="isi">Daftar Semua menu</li>
        </ul>
        <?php
// Menghubungkan ke database (gantilah dengan informasi koneksi Anda)
$koneksi = mysqli_connect("localhost", "root", "", "ppl");

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Membuat query SELECT untuk mengambil data produk dengan urutan ID produk dari yang terkecil
$query = "SELECT id, nama, gambar, harga FROM produk ORDER BY id ASC";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah query berhasil dieksekusi
if ($result) {
    // Memeriksa apakah terdapat data produk
    if (mysqli_num_rows($result) > 0) {
        // Menampilkan data produk dalam format yang diinginkan
        echo "<div style='display: flex; flex-wrap: wrap; justify-content: center;'>";
        $counter = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            if ($counter % 4 == 0 && $counter != 0) {
                // Baris baru setiap empat produk, kecuali untuk produk pertama
                echo "</div><div style='display: flex; flex-wrap: wrap; padding-left:195px;'>";
            }

            echo "<div style='margin: 20px;'>
                    <img src='data:image/jpeg;base64," . base64_encode($row['gambar']) . "' width='200' height='150' alt='Gambar Produk'>
                    <h2>{$row['nama']}</h2>
                    <p>Harga: {$row['harga']}</p>
                    <button style='background-color: blue; color: white;'>Lihat Detail</button>
                    <button style='background-color: red; color: white; float: right;'>Pesan</button>
                </div>";

            $counter++;
        }

        echo "</div>";
        echo "<div style='position: fixed; bottom: 20px; right: 20px; background-color: red; color: white; padding: 10px;'>
                    <p>Rp.0.00</p>
                    <a href='#'style='text-decoration:none;color:white;'>Lihat Detail</a>
                  </div>";
    } else {
        echo "Tidak ada data produk.";
    }
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
    <!-- end content -->
<?php 
	include"layout/footer.html";
?>
