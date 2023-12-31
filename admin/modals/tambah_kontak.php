<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kontak</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "ppl";

    $kon = mysqli_connect($host, $user, $password, $db);
    if (!$kon) {
        die("Koneksi Gagal:" . mysqli_connect_error());
    }

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {  // Perubahan ini untuk memastikan form telah disubmit

            $nama = input($_POST["nama"]);
            $email= input($_POST["email"]);
            $subjek = input($_POST["subjek"]);
            $pesan = input($_POST["pesan"]);

            //Query input menginput data kedalam tabel anggota
            $sql = "INSERT INTO kontak (nama, email, subjek, pesan) VALUES ('$nama', '$email', '$subjek', '$pesan')";
            
            //Mengeksekusi/menjalankan query diatas
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                echo "<div class='alert alert-success'> Data Berhasil disimpan.</div>";
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan. Error: " . mysqli_error($kon) . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan. Form tidak disubmit.</div>";
        }
    }
    ?>
    <div class="container">
        <br>
        <br>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" required/>
            </div>      
            <div class="form-group">
                <label>Subjek</label>
                <input type="text" name="subjek" class="form-control" required />
            </div>
            <div class="form-group">
                <label>Pesan</label>
                <input type="text" name="pesan" class="form-control" required/>
            </div>  
  
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
