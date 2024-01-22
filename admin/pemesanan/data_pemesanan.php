<!-- section content -->
<section style="margin-top:60px;" class="content">
    <div class="title">
        <h4>Table Data Pemesanan</h4>
    </div>
    <table id="table">
        <tr>
            <th>No</th>
            <th>Id Pemesanan</th>
            <th>Id User</th>
            <th>Id Produk</th>
            <th>Nama Produk</th>
            <th>Gambar Produk</th>
            <th>Total Harga</th>
            <th>Tanggal Pesanan</th>
            <th>Action</th>
        </tr>

        <?php
        $data = $admin->lihatPemesanan();

        if (empty($data)) : ?> <tr>
                <td colspan="8" align="center">Data Produk tidak ditemukan</td>
            </tr>
        <?php endif; ?>

        <?php $i = 1; ?>
        <?php foreach ($data as $psn) : ?>

            <tbody id="data-table-body">
                <td><?= $i ?></td>
                <td><?= $psn['id_pemesanan'] ?></td>
                <td><?= $psn['id_user'] ?></td>
                <td><?= $psn['id_produk'] ?></td>
                <td><?= $psn['nama_produk'] ?></td>
                <td><img src="../imgpetshop/<?= $psn['image'] ?>" alt="<?= $psn['nama_produk'] ?>" style=" width: 100px; height: 100px;"></td>
                <td> Rp. <?= $psn['harga'] ?></td>
                <td><?= $psn['tanggal_pemesanan'] ?></td>
                <td>
                    <a href="?p=hps-pemesanan&id_pemesanan=<?= $psn["id_pemesanan"]; ?>" class="btn_set" onclick="return confirm('konfirmasi  pesanan ini?');">Konfirmasi Pesanan</a>
                </td>
            </tbody>
            <?php $i++; ?>
        <?php endforeach; ?>


    </table>
</section>
<!-- end content -->
