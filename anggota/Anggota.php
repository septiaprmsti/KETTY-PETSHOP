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

    public function tambahPesanan($data)
    {
        $conn = $this->conn;
        $id_user = $data['id_user'];
        $id_produk = $data['id_produk'];
        $harga = $data['harga'];
        $tanggal_pemesanan = $data['tanggal_pemesanan'];

        $query = "INSERT INTO pemesanan (id_user, id_produk, harga, tanggal_pemesanan) 
          VALUES ('$id_user', '$id_produk', '$harga', '$tanggal_pemesanan')";

        // Tampilkan kueri SQL untuk debugging
        echo "Kueri: $query";

        mysqli_query($conn, $query);


        // Use mysqli_insert_id() to get the last inserted ID
        $id = mysqli_insert_id($conn);

        if ($id > 0) {
            return $id;
        } else {
            return 0;
        }
    }


    public function lihatPemesanan()
    {
        // Ambil data peminjaman untuk anggota tertentu
        $result = $this->conn->query("SELECT pemesanan.id_pemesanan, produk.image,  user.id_user, produk.id_produk, produk.nama_produk, pemesanan.harga, pemesanan.tanggal_pemesanan
        FROM pemesanan
        INNER JOIN produk ON pemesanan.id_produk = produk.id_produk
        INNER JOIN user ON pemesanan.id_user = user.id_user;
        ");

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
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

    public function hapusPemesanan($id_pemesanan)
    {
        $conn = $this->conn;
        mysqli_query($conn, "DELETE FROM pemesanan WHERE id_pemesanan = $id_pemesanan");

        return mysqli_affected_rows($conn);
    }

    // Peminjaman


}
