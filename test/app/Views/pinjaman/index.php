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
<th scope="col">Judul Buku</th>
<th scope="col">Nama Peminjam</th>
<th scope="col">Tgl Peminjaman</th>
<th scope="col">Tgl Exp Pengembalian</th>
<th scope="col">Tgl Pengembalian</th>

</tr>
</thead>
<tbody>
<?php $i = 1; ?>
<?php foreach ($prosespinjam as $k) : ?>
    <tr>
        <th scope="row"><?= $i++; ?></th>
        <td ><?= $k['judulbuku']; ?></td>
        <td ><?= $k['namapeminjam']; ?></td>
        <td ><?= $k['tglPeminjaman']; ?></td>
        <td ><?= $k['tglExpPengembalian']; ?></td>
        <td ><?= $k['tglPengembalian']; ?></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>

</div>
<?= $this->endSection(); ?>