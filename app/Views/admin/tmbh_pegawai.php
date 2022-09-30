<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <p class="fs-5 fw-light mb-0 text-gray-800">Tambah Pegawai</p>
    </div>

    <div class="container bg-white px-5 py-5 mb-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="<?=base_url('simpan-pegawai')?>">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Pegawai</label>
                        <input type="text" class="form-control" id="email" placeholder="Masukkan Pegawai" name="nama" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" value="laki-laki"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Laki Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" value="perempuan"
                                id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempatlahir" placeholder="Tempat Lahir"
                            name="tempat" />
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Agama</label>
                        <select class="form-select" aria-label="Default select example" name="agama">
                            <option selected>Pilih Agama</option>
                            <option value="islam">Islam</option>
                            <option value="hindu">Hindu</option>
                            <option value="budha">Budha</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            name="alamat"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Telepon</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">+62</span>
                            <input type="text" class="form-control" placeholder="No Telepon" aria-label="Username"
                                aria-describedby="basic-addon1" name="telepon">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"></label>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-primary">Simpan Pegawai</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>