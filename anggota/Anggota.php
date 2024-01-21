<?php

require '../config/Database.php';

class Anggota extends Database
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

    public function tambahPemesanan($data)
    {
        $conn = $this->conn;

        // Assuming you have a table named 'pemesanan' to store orders
        $id_user = htmlspecialchars($data['id_user']);
        $id_produk = htmlspecialchars($data['id_produk']);
        $jumlah = htmlspecialchars($data['jumlah']);

        // Fetch relevant data using JOINs
        $query = mysqli_query($conn, "SELECT pemesanan.id_pemesanan, user.id_user, produk.id_produk, pemesanan.jumlah, pemesanan.total_harga, pemesanan.tanggal_pemesanan
                                    FROM pemesanan
                                    INNER JOIN produk ON pemesanan.id_produk = produk.id_produk
                                    INNER JOIN user ON pemesanan.id_user = user.id_user
                                    WHERE pemesanan.id_produk = '$id_produk' AND pemesanan.id_user = '$id_user'");

        $result = mysqli_fetch_assoc($query);

        if ($result) {
            $id_user = $result['id_user'];
            $id_produk = $result['id_produk'];
            $jumlah = $result['jumlah'];
            $total_harga = $result['total_harga'];
            $tanggal_pemesanan = $result['tanggal_pemesanan'];

            // Insert data into the 'pemesanan' table
            $query = mysqli_query($conn, "INSERT INTO pemesanan (id_pemesanan,id_user, id_produk, jumlah, total_harga, tanggal_pemesanan) 
                             VALUES ('','$id_user', '$id_produk', '$jumlah', '$total_harga', '$tanggal_pemesanan')");


            return $query;
        } else {
            // Handle the case where the data is not found
            return false;
        }
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
