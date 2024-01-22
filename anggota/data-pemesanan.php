<?php
session_start();

require 'Anggota.php';

$anggota = new Anggota;




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



    <section class="data-pemesanan">
        <div class="wrapper">
            <h4>Daftar Pemesanan</h4>
            <table id="table">
                <tr>
                    <th>No</th>
                    <th>Gambar Produk</th>
                    <th>Nama Produk</th>
                    <th> Harga</th>
                    <th>Tanggal Pesanan</th>
                    <th>Action</th>
                </tr>

                <?php
                $data = $anggota->lihatPemesanan();

                if (empty($data)) : ?> <tr>
                        <td colspan="8" align="center">Data Produk tidak ditemukan</td>
                    </tr>
                <?php endif; ?>

                <?php $i = 1; ?>
                <?php foreach ($data as $psn) : ?>

                    <tbody id="data-table-body">
                        <td><?= $i ?></td>
                        <td><img src="../imgpetshop/<?= $psn['image'] ?>" alt="<?= $psn['nama_produk'] ?>" style=" width: 100px; height: 100px;"></td>
                        <td><?= $psn['nama_produk'] ?></td>
                        <td><?= $psn['harga'] ?></td>
                        <td><?= $psn['tanggal_pemesanan'] ?></td>
                        <td>
                            <a href="hapusPemesanan.php?id_pemesanan=<?= $psn['id_pemesanan']; ?>" onclick="return confirm('yakin?');">Bayar</a>
                        </td>
                    </tbody>
                    <?php $i++; ?>
                <?php endforeach; ?>


            </table>
        </div>
    </section>




    <footer>
        <div class="wrapper">&copy; 2023 KettyPetshop Denpasar Indonesia</div>
    </footer>
    <script src="js/main.js"></script>
</body>

</html>