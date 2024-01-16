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



    <section class="data-pemesanan">
        <div class="wrapper">
            <h4>Daftar Pemesanan</h4>
            <table id="table">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal Pesanan</th>
                    <th>Action</th>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Makanan Kucing</td>
                    <td>2</td>
                    <td>300000</td>
                    <td>21 Desember 2024</td>
                    <td>
                        <form method="post">
                            <button>Bayar</button>
                        </form>
                    </td>
                </tr>


            </table>
        </div>
    </section>




    <footer>
        <div class="wrapper">&copy; 2023 KettyPetshop Denpasar Indonesia</div>
    </footer>
    <script src="js/main.js"></script>
</body>

</html>