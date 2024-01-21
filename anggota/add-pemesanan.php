<?php

session_start();

require 'Anggota.php';

$anggota = new Anggota;

$produk = $anggota->getAllProduk();

$id_user = $_SESSION['id_user'];

if (isset($_POST['tambah'])) {
    // Assuming you have 'id_user' and other necessary fields in your form
    $data = [
        'id_user' => $_POST['id_user'],
        'id_produk' => $_POST['id_produk'],
        'jumlah' => $_POST['jumlah'],
        // Add other necessary fields here
    ];

    $result = $anggota->tambahPemesanan($data);
    var_dump($_POST);
    // if ($result) {

    //     echo "<script>
    //           alert('Pemesanan Berhasil! ID Pesanan: $result');
    //           window.location.href='add-pemesanan.php';
    //           </script>";
    // } else {
    //     echo "<script>
    //           alert('Pemesanan Gagal!');
    //           window.location.href='add-pemesanan.php';
    //           </script>";
    // }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website ketty petshop</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><img src="imgpetshop/logo cat and dog.png" /></div>
            <div class="Menu tampil">
                <ul>
                    <li><a href="index.php" class="menuItem">Home</a></li>
                    <li><a href="data-produk.php" class="menuItem">Product</a></li>
                    <li><a href="add-pemesanan.php" class="menuItem">Form Pemesanan</a></li>
                    <li><a href="../logout.php" class="menuItem">Logout</a></li>
                    <li><a href="data-pemesanan.php" class="menuItem">Pemesanan</a></li>
                </ul>
            </div>
            <button class="hamburger-menu" onclick="displayMenu()">
                <i class="fa-solid fa-bars icon-bars"></i>
                <i class="fa-solid fa-xmark icon-close"></i>
            </button>
        </div>
    </nav>






    <section class="pemesanan">
        <div class="wrapper">
            <h4>Form Pemesanan</h4>
            <p>Silahkan isi form ini untuk melakukan pemesanan</p>

            <div class="grid">
                <div class="item">
                    <div class="item-detail">

                        <!-- Form in HTML -->
                        <!-- Other HTML code -->

                        <form method="post">
                            <div class="col-12">

                                <input type="text" class="input" id="id_pesanan" name="id_pesanan" hidden>
                                <input type="text" class="input" id="id_user" name="id_user" hidden>


                                <label for="nama">Nama Produk</label>
                                <select name="id_produk" class="select">
                                    <?php foreach ($produk as $prdk) : ?>
                                        <option value="<?= $prdk['id_produk'] ?>"><?= $prdk['nama_produk'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="text" class="input" id="jumlah" name="jumlah">
                            </div>

                            <div class="col-12">
                                <input type="text" id="harga" name="harga" hidden>
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="input" id="harga" name="harga" value="<?= $produk['id_produk'] - $produk['harga'] ?>" disabled>

                            </div>



                            <!-- Assuming you handle the ID generation on the server side -->

                            <input type="date" value="<?= date('Y-m-d'); ?>" name="tanggal_pemesanan" hidden>
                            <button type="submit" name="tambah" class="col-2">Pesan</button>
                        </form>

                        <!-- Other HTML code -->


                    </div>
                </div>
            </div>

        </div>
    </section>
    <footer>
        <div class="wrapper">&copy; 2023 KettyPetshop Denpasar Indonesia</div>
    </footer>
    <script src="js/main.js"></script>
</body>

</html>