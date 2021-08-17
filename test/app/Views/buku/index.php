<?= $this->extend('Template/templates.php') ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
                <h3>Daftar Buku</h3>
                    <!-- Page Heading -->
                    <a href="<?= base_url('tambah-buku'); ?>" class="btn btn-primary mb-3">Tambah Buku</a>
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
      <td><a href="/edit-buku/<?= $k['id']; ?>" class="btn btn-primary">Edit</a> 
        <form action="/buku/<?= $k['id']; ?>" method="post" class="d-inline">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Hapus</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

                </div>
                <!-- /.container-fluid -->
<?= $this->endSection(); ?>