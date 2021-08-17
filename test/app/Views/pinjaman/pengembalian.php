<?= $this->extend('Template/templates.php') ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Pinjaman</h1>
<table class="table">
<caption>List of Book</caption>
<thead>
<tr>
<th scope="col">No</th>
<th scope="col">Nama Peminjam</th>
<th scope="col">Judul Buku</th>
<th scope="col">Peminjaman</th>
<th scope="col">Aksi</th>
</tr>
</thead>
<tbody>
<?php $i = 1; ?>
<?php foreach ($prosespinjam as $k) : ?>
    <tr>
        <th scope="row"><?= $i++; ?></th>
        <td ><?= $k['nama']; ?></td>
        <td><?= $k['judul']; ?> </td>
        <td><?= $k['tglPeminjaman']; ?> </td>
        <td><?= $k['tglPengembalian']; ?> </td>
        <td>
            <form action="/Pengembalian/save" method="POST">
                <input type="text" name="idpeminjaman" value="<?= $k['idpeminjaman']; ?>" hidden>
                <input type="text" name="idbuku" value="<?= $k['id']; ?>" hidden>
                <input type="text" name="stok" value="<?= $k['stok']; ?>" hidden>
                <input type="text" name="judulbuku" value="<?= $k['judul'];; ?>" hidden>
                <input type="text" name="namapeminjam" value="<?= $k['nama'];; ?>" hidden>
                <input type="text" name="tglPeminjaman" value="<?= $k['tglPeminjaman'];; ?>" hidden>
                <input type="text" name="tglExpPengembalian" value="<?= $k['tglPeminjaman'];; ?>" hidden>
                <input type="text" name="tglPengembalian" value="<?= $hariIni; ?>" hidden>
            <button type="submit" class="btn btn-primary">kembalikan</button>
            </form>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>

</div>
<?= $this->endSection(); ?>