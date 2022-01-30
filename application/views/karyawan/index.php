<div class="container">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="div row mt-3">
            <div class="col md 6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">Data Karyawan
                    <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Tombol tambah karyawan-->
    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>karyawan/tambah" class="btn btn-primary">Tambah Data Karyawan</a>
        </div>
    </div>

    <!-- Kolom untuk menambahkan fitur serch -->
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Karyawan..." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Table daftar karyawan -->
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>Daftar Karyawan</h1>
            <!-- memberi kondisi untuk fitur pencarian yang tidak tercari -->
            <?php if (empty($karyawan)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Karyawan Tidak Ditemukan!
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($karyawan as $kryw) : ?>
                    <li class="list-group-item">
                        <a href="<?= base_url(); ?>karyawan/hapus/<?= $kryw['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Apakah yakin akan menghapus!');">Hapus</a>
                        <a href="<?= base_url(); ?>karyawan/ubah/<?= $kryw['id']; ?>" class="badge badge-success float-right">Ubah</a>
                        <a href="<?= base_url(); ?>karyawan/detail/<?= $kryw['id']; ?>" class="badge badge-primary float-right">Detail</a>
                        <?= $kryw['nama']; ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>