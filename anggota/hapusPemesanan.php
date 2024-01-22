<?php

require_once "Anggota.php";

$anggota = new Anggota;

$id_pemesanan = $_GET['id_pemesanan'];

if ($anggota->hapusPemesanan($id_pemesanan) > 0) {
      echo "<script>
            alert('Pembayaran berhasil');
            document.location.href = 'data-pemesanan.php';
      </script>";
} else {
      echo "  <script>
            alert('Pembayarn Berhasil');
            document.location.href = 'data-pemesanan.php';
            </script>";
}
