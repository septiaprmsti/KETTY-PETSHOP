<!-- section content -->
<section style="margin-top:60px;" class="content">
    <div class="title">
        <h4>Table Data Pemesanan</h4>
        <a class="btn_add" href="?p=add-produk">Add Produk</a>
    </div>
    <table id="table">
        <tr>
            <th>No</th>
            <th>Id Pemesanan</th>
            <th>Id User</th>
            <th>Id Produk</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Tanggal Pesanan</th>
            <th>Action</th>
        </tr>

        <?php
        // $data = $admin->getAllPemesanan();

        if (empty($data)) : ?> <tr>
                <td colspan="9" align="center">Data Produk tidak ditemukan</td>
            </tr>
        <?php endif; ?>

        <!-- <?php $i = 1; ?>
        <?php foreach ($data as $psn) : ?>

            <tbody id="data-table-body">
                <td><?= $i ?></td>
                td><?= $psn['id_pemesanan'] ?></td>
                <td><?= $psn['id_user'] ?></td>
                <td><?= $psn['id_produk'] ?></td>
                <td><?= $psn['nama_produk'] ?></td>
                <td><?= $psn['jumlah'] ?></td>
                <td><?= $psn['total_harga'] ?></td>
                <td><?= $psn['tanggal_pemesanan'] ?></td>
                <td><a href="?p=edit-produk&id_produk=<?= $psn['id_produk']; ?>" class="btn_set">Edit</a> |
                    <a href="?p=hps-produk&id_produk=<?= $psn["id_produk"]; ?>" class="btn_set" onclick="return confirm('anda yakin akan menghapus data ini?');">Hapus</a>
                </td>
            </tbody>
            <?php $i++; ?>
        <?php endforeach; ?> -->


    </table>
</section>
<!-- end content -->