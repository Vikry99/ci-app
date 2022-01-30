<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        Form Ubah Data Karyawan
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $karyawan['id']; ?>">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $karyawan['nama']; ?>">
                                <!-- Pesan Error SAtu Persatu per Form -->
                                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="npm">Npm</label>
                                <input type="text" name="npm" class="form-control" id="npm" value="<?= $karyawan['npm']; ?>">
                                <small class="form-text text-danger"><?= form_error('npm'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="<?= $karyawan['email']; ?>">
                                <small class="form-text text-danger"><?= form_error('email'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="divisi">Divisi</label>
                                <select class="form-control" id="divisi" name="divisi">
                                    <?php foreach ($divisi as $dvs) : ?>
                                        <?php if ($dvs == $karyawan['divisi']) : ?>
                                            <option value="<?= $dvs; ?>" selected><?= $dvs; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $dvs; ?>"><?= $dvs; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>