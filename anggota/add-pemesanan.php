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
                        <form method="post">
                            <div class="col-12">
                                <label for="nama">Nama Produk</label>
                                <select name="" class="select">
                                    <option type="text" name="nama_produk" id="nama_produk" required>
                                </select>

                            </div>
                            <div class="col-12">
                                <label for="deskripsi" class="form-label">Jumlah</label>
                                <input type="text" class="input" id="deskripsi" name="deskripsi">
                            </div>
                            <div class="col-12">
                                <label for="harga" class="form-label">Total Harga</label>
                                <input type="number" class="input" id="harga" name="harga">
                            </div>
                            <div class="col-12">
                                <label for="stok" class="form-label">Tanggal Pemesanan</label>
                                <input type="number" class="input" id="stok" name="stok">
                            </div>
                            <button type="submit" name="tambah" class="col-2">Pesan</button>
                        </form>

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