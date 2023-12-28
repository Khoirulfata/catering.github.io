<?php
     include "header.php";
     ?>
<!DOCTYPE html>
<html>
<head>
    <title>update pengeluaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id
    if (isset($_GET['id_pengeluaran'])) {
        $id_pengeluaran=input($_GET["id_pengeluaran"]);

        $sql="select * from laporan where id_pengeluaran=$id_pengeluaran";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_pengeluaran=htmlspecialchars($_POST["id_pengeluaran"]);
        $nama_barang=input($_POST["nama_barang"]);
        $Tanggal_pengeluaran=input($_POST["Tanggal_pengeluaran"]);
        $harga=input($_POST["harga"]);
        $jumlah=input($_POST["jumlah"]);
        $total=input($_POST["total"]);
      
        //Query update data pada tabel anggota
        $sql="insert into laporan (nama_barang,Tanggal_pengeluaran, harga, jumlah, total) values
		('$nama_barang','$Tanggal_pengeluaran','$harga','$jumlah','$total')";


        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:pengeluaran.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <br>
    <br>
    <h4>Update pengeluaran</h4>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="Masukan Nama Barang" required />

        </div>
        <div class="form-group">
            <label>Tgl Pengeluaran</label>
            <input type="date" name="Tanggal_pengeluaran" class="form-control" placeholder="Masukan tanggal" required/>
        </div>
        <div class="form-group">
            <label>harga</label>
            <input type="int" name="harga" class="form-control" placeholder="Masukan harga" required />

        </div>
        <div class="form-group">
            <label>jumlah</label>
            <input type="int" name="jumlah" class="form-control" placeholder="Masukan jumlah" required/>
        </div>
        <div class="form-group">
            <label>Total</label>
            <input type="int" name="total" class="form-control" placeholder="Masukan total" required />

        </div>
       

        <input type="hidden" name="id_pengeluaran" value="<?php echo $data['id_pengeluaran']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>