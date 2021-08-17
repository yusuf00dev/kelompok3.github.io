<?= $this->extend('Template/templates.php') ?>
<?= $this->section('content'); ?>
<div class="card">
  <div class="card-header">
    Pinjam Buku
  </div>
  <div class="card-body">
    <div class="input-group mb-3">
        <form action="/Pinjaman/simpanPeminjam" method="POST">
            <?= csrf_field(); ?>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Detail Buku</span>
                </div>
                <input type="text" value="<?= $buku['id']; ?>" name="idbuku" hidden>
                <input type="text" class="form-control" value="<?= $buku['judul']; ?> - <?= $buku['penerbit']; ?> - <?= $buku['pengarang']; ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect02">Anggota</label>
                </div>
                <select class="custom-select <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" name="nim" autofocus  id="inputGroupSelect02 nim">
                    <option value="">Pilih Anggota</option>
                    <?php $i = 1; ?>
                    <?php foreach ($anggota as $k) : ?>
                        <option value="<?= $k['idAnggota']; ?>"><?= $k['nama']; ?> - <?= $k['nim']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('nim'); ?>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label for="dtp_input2" class="input-group-text">Tahun</label>
                </div>
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" size="16" name="tahun" id="tahun" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    <div class="invalid-feedback">
                        <?= $validation->getError('tahun'); ?>
                    </div>
                </div>
                
                
            </div>
            <button type="submit" class="btn btn-primary">Tambah Peminjam</button>
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