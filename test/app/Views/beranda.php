<?= $this->extend('Template/templates.php') ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Beranda</h1>
<table class="table">
<caption>List of Book</caption>
<thead>
<tr>
    <th scope="col">No</th>
    <th scope="col">Judul</th>
    <th scope="col">penerbit</th>
    <th scope="col">pengarang</th>
    <th scope="col">tahun</th>
    <th scope="col">Stok</th>
    <th scope="col">Aksi</th>
</tr>
</thead>
<tbody>
<?php $i = 1; ?>
<?php foreach ($buku as $k) : ?>
<tr>
<th scope="row"><?= $i++; ?></th>
      <td><?= $k['judul']; ?></td>
      <td><?= $k['penerbit']; ?></td>
      <td><?= $k['pengarang']; ?></td>
      <td><?= $k['tahun']; ?></td>
      <td><?= $k['stok']; ?></td>
    <td><a href="/proses-pinjam/<?= $k['id']; ?>" class="btn btn-primary">Pinjam</a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</div>
<?= $this->endSection(); ?>