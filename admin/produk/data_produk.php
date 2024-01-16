<!-- section content -->
<section style="margin-top:60px;" class="content">
    <div class="title">
        <h4>Table Data Produk</h4>
        <a class="btn_add" href="?p=add-produk">Add Produk</a>
    </div>
    <table id="table">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Action</th>
        </tr>

        <?php
        $data = $admin->getAllProduk();

        if (empty($data)) : ?> <tr>
                <td colspan="6" align="center">Data Produk tidak ditemukan</td>
            </tr>
        <?php endif; ?>

        <?php $i = 1; ?>
        <?php foreach ($data as $prdk) : ?>

            <tbody id="data-table-body">
                <td><?= $i ?></td>
                <td><?= $prdk['nama_produk'] ?></td>
                <td><?= $prdk['deskripsi'] ?></td>
                <td><?= $prdk['harga'] ?></td>
                <td><?= $prdk['stok'] ?></td>
                <td><a href="?p=edit-produk&id_produk=<?= $prdk['id_produk']; ?>" class="btn_set">Edit</a> |
                    <a href="?p=hps-produk&id_produk=<?= $prdk["id_produk"]; ?>" class="btn_set" onclick="return confirm('anda yakin akan menghapus data ini?');">Hapus</a>
                </td>
            </tbody>
            <?php $i++; ?>
        <?php endforeach; ?>


    </table>
</section>
<!-- end content -->