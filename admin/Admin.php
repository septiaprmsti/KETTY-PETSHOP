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

        $nama_produk = htmlspecialchars($data['nama_produk']);
        $deskripsi = htmlspecialchars($data['deskripsi']);
        $harga = htmlspecialchars($data['harga']);
        $stok = htmlspecialchars($data['stok']);
        $image = $_FILES['image']['name'];
        $tmpImg = $_FILES['image']['tmp_name'];

        $newFile = uniqid() . "-" . $image;
        move_uploaded_file($tmpImg, '../imgpetshop/' . $newFile);

        $query = mysqli_query($conn, "INSERT INTO produk VALUES (null,'$nama_produk','$deskripsi','$harga','$stok', '$newFile')");

        var_dump($query);

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

        if ($_FILES["image"]["error"] != 4) {
            $image = $_FILES['image']['name'];
            $tmpImg = $_FILES['image']['tmp_name'];

            $newFile = uniqid() . "-" . $image;
            move_uploaded_file($tmpImg, '../imgpetshop/' . $newFile);


            mysqli_query($conn, "UPDATE produk SET
                              id_produk = '$id_produk',
                              nama_produk = '$nama_produk',
                              deskripsi = '$deskripsi',
                              harga = '$harga',
                              stok = '$stok',
                              image = '$newFile'
                             WHERE id_produk = $id_produk
        ");
        }

        return mysqli_affected_rows($conn);
    }

    public function lihatPemesanan()
    {
        // Ambil data peminjaman untuk anggota tertentu
        $result = $this->conn->query("SELECT pemesanan.id_pemesanan, user.id_user, produk.image, produk.id_produk, produk.nama_produk, pemesanan.harga, pemesanan.tanggal_pemesanan
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

    public function hapusProduk($id_produk)
    {
        $conn = $this->conn;
        mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id_produk");

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
