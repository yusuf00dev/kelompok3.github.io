<?= $this->extend('Template/templates.php') ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
<div class="card">
  <div class="card-header">
    Daftar Anggota
  </div>
  <div class="card-body">
  <a href="<?= base_url('daftar-anggota'); ?>" class="btn btn-primary mb-2">Tambah Anggota</a>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Nim</th>
      <th scope="col">Jurusan</th>
      <th scope="col">No.Telp</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($anggota as $k) : ?>
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td><?= $k['nama']; ?></td>
      <td><?= $k['alamat']; ?></td>
      <td><?= $k['nim']; ?></td>
      <td><?= $k['fakultas']; ?></td>
      <td><?= $k['noTelp']; ?></td>
      <td><a href="/edit-anggota/<?= $k['idAnggota']; ?>" class="btn btn-primary">Edit</a> 
        <form action="/hapus-anggota/<?= $k['idAnggota']; ?>" method="post" class="d-inline">
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
</div>
</div>
<?= $this->endSection(); ?>