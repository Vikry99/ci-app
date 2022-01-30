<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        Form Tambah Data Karyawan
                    </div>
                    <div class="card-body">

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="exampleFormControlInput1">
                                <!-- Pesan Error SAtu Persatu per Form -->
                                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="npm">Npm</label>
                                <input type="text" name="npm" class="form-control" id="npm">
                                <small class="form-text text-danger"><?= form_error('npm'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                                <small class="form-text text-danger"><?= form_error('email'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="divisi">Divisi</label>
                                <select class="form-control" id="divisi" name="divisi">
                                    <option value="Programmer">Programmer</option>
                                    <option value="Pemasaran">Pemasaran</option>
                                    <option value="Kepegawaian">Kepegawian</option>
                                    <option value="Peneliti">Peniliti</option>
                                    <option value="Umum">Umum</option>
                                    <option value="Administrasi">Administrasi</option>
                                </select>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>