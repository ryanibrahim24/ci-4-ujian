<?= $this->extend('layout\app') ?>

<?= $this->section('content') ?>

<section class="col-md-6 mx-auto">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <div class="row my-3 d-flex align-items-center justify-content-center">
                <div class="col col-md-5"><b class="float-end">EDIT DATA PENGGUNA</b></div>
                <div class="col col-md-4">
                    <a href="<?= url_to('employees') ?>" class="btn btn-info text-white btn-sm float-start">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="/employees/update/<?= $employee['id'] ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label class="col-sm-4 col-label-form border-end border-2">Nama Pegawai</label>
                    <div class="col-sm-8">
                        <input type="text" name="employee_name" class="form-control" placeholder="Masukan Nama Pegawai" value="<?= $employee['nama_pegawai'] ?>" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-label-form border-end border-2">Username</label>
                    <div class="col-sm-8">
                        <input type="text" name="employee_username" class="form-control" placeholder="Masukan Username" value="<?= $employee['username'] ?>" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-label-form border-end border-2">Email</label>
                    <div class="col-sm-8">
                        <input type="email" name="employee_email" class="form-control" placeholder="Masukan Email" value="<?= $employee['email'] ?>" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-label-form border-end border-2">No HP</label>
                    <div class="col-sm-8">
                        <input type="number" name="employee_nohp" class="form-control" placeholder="Masukan No HP" value="<?= $employee['nohp'] ?>" />
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-info text-white" value="Simpan" />
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ?>