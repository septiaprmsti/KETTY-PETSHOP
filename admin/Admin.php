<?php

require '../config/Database.php';

class Admin extends Database
{

    // Buku
    public function getAllProduk()
    {
        $query = " SELECT * FROM produk ";
        $produk = $this->query($query);

        return $produk;
    }

    public function getProdukById($id_produk)
    {
        $query = "SELECT * FROM produk WHERE id_produk = " . $id_produk;
        $produk = $this->query($query);

        if (empty($produk)) {
            return $produk;
        } else {
            return $produk[0];
        }
    }

    public function tambahDataProduk($data)
    {
        $conn = $this->conn;

        $id_produk = htmlspecialchars($data['id_produk']);
        $nama_produk = htmlspecialchars($data['nama_produk']);
        $deskripsi = htmlspecialchars($data['deskripsi']);
        $harga = htmlspecialchars($data['harga']);
        $stok = htmlspecialchars($data['stok']);



        mysqli_query($conn, "INSERT INTO produk VALUES ('$id_produk','$nama_produk','$deskripsi','$harga','$stok')");

        return mysqli_affected_rows($conn);
    }

    public function ubahDataProduk($data)
    {
        $conn = $this->conn;

        $id_produk = htmlspecialchars($data['id_produk']);
        $nama_produk = htmlspecialchars($data['nama_produk']);
        $deskripsi = htmlspecialchars($data['deskripsi']);
        $harga = htmlspecialchars($data['harga']);
        $stok = htmlspecialchars($data['stok']);

        mysqli_query($conn, "UPDATE produk SET
                          id_produk = '$id_produk',
                          nama_produk = '$nama_produk',
                          deskripsi = '$deskripsi',
                          harga = '$harga',
                          stok = '$stok'
                          
                          

                        WHERE id_produk = $id_produk
    ");

        return mysqli_affected_rows($conn);
    }

    public function hapusProduk($id_produk)
    {
        $conn = $this->conn;
        mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id_produk");

        return mysqli_affected_rows($conn);
    }

    // Peminjaman


}
