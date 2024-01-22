<?php

if (isset($_POST['tambah'])) {
    if ($admin->tambahDataProduk($_POST) > 0) {
        echo
        "<script>
      alert('Data BERHASIL Ditambah!');
      window.location.href='?p=data-produk'
    </script>";
    } else {
        echo
        "<script>
      alert('Data GAGAL Ditambah!');
      window.location.href='?p=data-produk'
    </script>";
    }
}
?>

<!-- section content -->
<section style="margin-top:60px;" class="content">
    <div class="title">
        <h4>Tambah Data Produk</h4>
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="col-12">
            <label for="nama">Nama Produk</label>
            <input type="text" class="input" name="nama_produk" id="nama_produk" required>
        </div>
        <div class="col-12">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="input" id="deskripsi" name="deskripsi">
        </div>
        <div class="col-12">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="input" id="harga" name="harga">
        </div>
        <div class="col-12">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="input" id="stok" name="stok">
        </div>
        <div class="col-12">
            <label for="image" class="form-label">Gambar Produk</label>
            <input type="file" class="input" name="image">
        </div>
        <button type="submit" name="tambah" class="btn_add col-2">Simpan</button>
    </form>
</section>