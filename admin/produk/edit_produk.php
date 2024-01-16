<?php


$id_produk = $_GET["id_produk"];

if (isset($_POST['ubah'])) {
    if ($admin->ubahDataProduk($_POST) > 0) {
        echo
        "<script>
      alert('Data BERHASIL Diubah!');
      window.location.href='?p=data-produk'
    </script>";
    } else {
        echo
        "<script>
      alert('Data GAGAL Diubah!');
      window.location.href='?p=data-produk'
    </script>";
    }
}

$prdk = $admin->getProdukById($id_produk);
?>

<!-- section content -->
<section style="margin-top:60px;" class="content">
    <div class="title">
        <h4>Ubah Data Produk</h4>
    </div>
    <form method="post">

        <input type="text" class="input" name="id_produk" id="id_produk" hidden required value="<?= $prdk['id_produk'] ?>">

        <div class="col-12">
            <label for="nama">Nama Produk</label>
            <input type="text" class="input" name="nama_produk" id="nama_produk" required value="<?= $prdk['nama_produk'] ?>">
        </div>
        <div class="col-12">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="input" id="deskripsi" name="deskripsi" value="<?= $prdk['deskripsi'] ?>">
        </div>
        <div class="col-12">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="input" id="harga" name="harga" value="<?= $prdk['harga'] ?>">
        </div>
        <div class="col-12">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="input" id="stok" name="stok" value="<?= $prdk['stok'] ?>">
        </div>
        <button type="submit" name="ubah" class="btn_add col-2">Simpan</button>
    </form>
</section>