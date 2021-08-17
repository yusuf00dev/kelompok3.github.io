<?= $this->extend('Template/templates.php') ?>
<?= $this->section('content'); ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
                    <div class="row">
                    <!-- Page Heading -->
                        <div class="card col-sm-8">
                            <div class="card-header">
                                Edit Anggota
                            </div>
                            <form action="/Anggota/update/<?= $anggota['idAnggota']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field($anggota['idAnggota']); ?>
                            <input type="hidden" name="idAnggota" value="<?= $anggota['idAnggota']; ?>">
                                <div class="card-body ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Nama</span>
                                        </div>
                                        <input type="text" name="nama" value="<?= (old('nama')) ? old('nama') : $anggota['nama']; ?>" class="form-control" placeholder="Ex.Abc" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Fakultas</span>
                                        </div>
                                        <input type="text" name="fakultas" value="<?= (old('fakultas')) ? old('fakultas') : $anggota['fakultas']; ?>" class="form-control" placeholder="Ex.Abc" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Alamat</span>
                                        </div>
                                        <input type="text" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $anggota['alamat']; ?>" class="form-control" placeholder="Ex.Abc" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">NIM</span>
                                        </div>
                                        <input type="number" name="nim" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" id="nim"  autofocus value="<?= (old('nim')) ? old('nim') : $anggota['nim']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nim'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">No. Telp</span>
                                        </div>
                                        <input type="number" name="noTelp" value="<?= (old('noTelp')) ? old('noTelp') : $anggota['noTelp']; ?>" class="form-control" placeholder="Ex.Abc" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                <?= $this->endSection(); ?>