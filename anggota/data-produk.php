<?php
session_start();

require 'Anggota.php';

$anggota = new Anggota;


$produk = $anggota->getAllProduk();

$id_user = $_SESSION['id_user'];



if (isset($_POST['tambah'])) {

        //check the progress
    ;
    if ($anggota->tambahPesanan($_POST) > 0) {
        echo "
            <script>
            alert('Pesanan berhasil ditambahkan');
            document.location.href = 'data-produk.php';
            </script>
        ";
    } else {
        echo " <script>
        alert('Pesanan gagal ditambahkan');
        document.location.href = 'data-produk.php';
        </script>
    ";
    }
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



    <section class="Product" id="Product">
        <div class="product-container"  >
            <?php

            $counter = 0; // Counter to keep track of products in a row
            foreach ($produk as $product) :
            ?>
                <div class="box">
                    <img src="../imgpetshop/<?= $product['image'] ?>" alt="<?= $product['nama_produk'] ?>">
                    <h5><?= $product['nama_produk'] ?></h5>
                    <p><?= $product['deskripsi'] ?></p>
                    <div class="content">
                        <span>Rp. <?= $product['harga'] ?></span>
                    </div>
                    <form action="" method="post">
                        <input type="hidden" value="<?= $_SESSION['id_user']; ?>" name="id_user">
                        <input type="hidden" value="<?= $product['id_produk']; ?>" name="id_produk">
                        <input type="hidden" value="<?= $product['harga']; ?>" name="harga">
                        <input type="hidden" value="<?= date('Y-m-d'); ?>" name="tanggal_pemesanan"><br>
                        <button name="tambah">Pesan</button>
                    </form>
                </div>

                <?php
                // Increment the counter
                $counter++;

                // If three products have been displayed, close the current row and reset the counter
                if ($counter === 3) {
                    echo '</div><div class="product-container">';
                    $counter = 0;
                }
                ?>

            <?php endforeach; ?>

        </div>
    </section>





    <footer>
        <div class="wrapper">&copy; 2023 KettyPetshop Denpasar Indonesia</div>
    </footer>
    <script src="js/main.js"></script>
</body>

</html>