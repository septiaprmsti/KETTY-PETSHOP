<?php

if (empty($_GET)) {
    include 'dashboard.php';
}

if (isset($_GET["p"])) {
    if ($_GET["p"] == "home") {
        require 'home.php';
    } elseif ($_GET["p"] == "dashboard") {
        require 'dashboard.php';
    } elseif ($_GET["p"] == "data-produk") {
        require 'produk/data_produk.php';
    } elseif ($_GET["p"] == "edit-produk") {
        require 'produk/edit_produk.php';
    } elseif ($_GET["p"] == "add-produk") {
        require 'produk/add_produk.php';
    } elseif ($_GET["p"] == "hps-produk") {
        if ($admin->hapusProduk($_GET["id_produk"]) > 0) {
            echo "
            <script>
              alert('Data BERHASIL Dihapus');
              window.location.href='?p=data-produk';
            </script>";
        } else {
            echo "
            <script>
              alert('Data GAGAL Dihapus');
              window.location.href='?p=data-produk';
            </script>";
        }
    } elseif ($_GET["p"] == "data-pemesanan") {
        require 'pemesanan/data_pemesanan.php';
    } elseif ($_GET["p"] == "hps-pemesanan") {
        if ($admin->hapusPemesanan($_GET["id_pemesanan"]) > 0) {
            echo "
            <script>
              alert('Konfirmasi Berhasil');
              window.location.href='?p=data-pemesanan';
            </script>";
        } else {
            echo "
            <script>
              alert('Konfirmasi Gagal');
              window.location.href='?p=data-pemesanan';
            </script>";
        }
    }
}
