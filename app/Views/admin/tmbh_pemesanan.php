<!-- https://www.helmykediri.com/2015/10/auto-complete-form-isian-dengan-php_93.html -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <p class="fs-5 mb-0 text-gray-800 fw_light">Tambah Pemesanan</p>
    </div>

    <div class="container bg-white px-5 py-3">
        <div class="row">
            <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success text-center">
                <?php echo session()->getFlashdata('pesan') ?>
            </div>
            <?php endif ?>
            <form method="post" action="<?=base_url('proses-pemesanan')?>">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Masukkan ID Pegawai</label>
                        <input type="text" class="form-control" id="idpegawai" placeholder="Masukkan Nama"
                            name="idpegawai" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pilih Kendaraan </label>
                        <input type="text" class="form-control" id="nopol"
                            placeholder="Masukkan ID Kendaraan yang dipesan" name="nopol" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"> </label>
                        <button class="btn btn-primary" type="submit">Proses Pemesanan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>