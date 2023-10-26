<?= $this->extend('layout\app') ?>


<?= $this->section('content') ?>
<section class="col-sm-7 mx-auto">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <div class="row my-3 d-flex align-items-center justify-content-center">
        <div class="col col-md-6"><b class="float-end">DATA PENGGUNA</b></div>
        <div class="col col-md-3">
            <a href="<?= url_to('employees/create') ?>" class="btn btn-info text-white btn-sm float-start">+ TAMBAH DATA</a>
        </div>
        <div class="col col-md-3">
            <a href="<?= url_to('logout') ?>" class="btn btn-warning text-white btn-sm float-end">Logout</a>
        </div>
    </div>
    <div class="card mb-5">
        <div class="card-body">
            <div class="float-end mb-4">
                <form action="" class="mg-top-15 text-right">
                    <input type="text" name="kata_kunci" placeholder="Pencarian">
                    <input type="submit" name="submit" class="btn btn-info text-white">
                </form>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th class="bg-info text-white text-center">No</th>
                    <th class="bg-info text-white text-center">Nama</th>
                    <th class="bg-info text-white text-center">Email</th>
                    <th class="bg-info text-white text-center">No HP</th>
                    <th class="bg-info text-white text-center">OPSI</th>
                </tr>
                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                <?php if (count($employe) > 0) : ?>
                    <?php foreach ($employe as $o) : ?>
                        <tr>
                            <th><?= $i++ ?></th>
                            <td><?= $o['nama_pegawai'] ?></td>
                            <td><?= $o['email'] ?></td>
                            <td><?= $o['nohp'] ?></td>
                            <td>
                                <a href="employees/edit/<?= $o['id'] ?>" class="btn btn-success">Edit</a>
                                <form action="/employees/<?= $o['id'] ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" onsubmit="return confirm('Hapus data permanen?')" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center">No Data Found</td>
                    </tr>
                <?php endif; ?>


            </table>
            <?= $pager->links() ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>