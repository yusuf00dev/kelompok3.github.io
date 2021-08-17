<?= $this->extend('Template/templates.php') ?>
<?= $this->section('content'); ?>
                <div class="container-fluid">
                    <div class="row">
                    <!-- Page Heading -->
                        <div class="card col-sm-8">
                            <div class="card-header">
                                Edit Buku
                            </div>
                            <form action="/Buku/update/<?= $buku['id']; ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field($buku['id']); ?>
                                <input type="hidden" name="id" value="<?= $buku['id']; ?>">
                                <div class="card-body ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Judul Buku</span>
                                        </div>
                                        <input type="text"  class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $buku['judul']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('judul'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Penerbit</span>
                                        </div>
                                        <input type="text" name="penerbit" class="form-control" value="<?= (old('penerbit')) ? old('penerbit') : $buku['penerbit']; ?>" placeholder="Ex.Abc" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Pengarang</span>
                                        </div>
                                        <input type="text" name="pengarang" class="form-control" value="<?= (old('pengarang')) ? old('pengarang') : $buku['pengarang']; ?>" placeholder="Ex.Abc" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label for="dtp_input2" class="input-group-text">Tahun</label>
                                        </div>
                                        <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input name="tahun" class="form-control" size="16" type="text" value="<?= (old('tahun')) ? old('tahun') : $buku['tahun']; ?>" readonly>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Stok</span>
                                        </div>
                                        <input type="number" name="stok" class="form-control" value="<?= (old('stok')) ? old('stok') : $buku['stok']; ?>" placeholder="Ex.123" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
                <script src="<?= base_url('plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'); ?>"></script>
                <script src="<?= base_url('plugin/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.fr.js'); ?>"></script>
                <script type="text/javascript">
                    $('.form_date').datetimepicker({
                        language:  'En',
                        weekStart: 1,
                        todayBtn:  1,
                        autoclose: 1,
                        todayHighlight: 1,
                        startView: 2,
                        minView: 2,
                        forceParse: 0
                    });
                </script>
<?= $this->endSection(); ?>