<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <p class="fs-5 fw-light mb-0 text-gray-800">Tambah Kendaraan</p>
    </div>

    <div class="container bg-white px-5 py-5 mb-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="<?=base_url('simpan-kendaraan')?>">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ID Nopol</label>
                        <input type="text" class="form-control" id="email" placeholder="Masukkan Nopol Kendaraan"
                            name="nopol" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Merk Kendaraan</label>
                        <select class="form-select" aria-label="Default select example" name="merk">
                            <option selected>Pilih Merk Kendaraan</option>
                            <option value="Honda">Honda</option>
                            <option value="Daihatzu">Daihatzu</option>
                            <option value="Nisan">Nisan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jenis Kendaraan</label>
                        <select class="form-select" aria-label="Default select example" name="jenis">
                            <option selected>Jenis Kendaraan</option>
                            <option value="Sapeda Motor">Sapeda Motor</option>
                            <option value="Mobil">Mobil</option>
                            <option value="Mobil Angkutan Umum">Mobil Angkutan Umum</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tahun Pembuatan Kendaraan</label>
                        <select class="form-select" aria-label="Default select example" name="tahun">
                            <?php for($a=2000; $a<=2022; $a++) { ?>
                            <option value="<?=$a?>"><?=$a?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Bahan Bakar</label>
                        <select class="form-select" aria-label="Default select example" name="bahanbakar">
                            <option value="solar">Solar</option>
                            <option value="pertalite">Pertalite</option>
                            <option value="pertamax">Pertamax</option>
                            <option value="pertamax turbo">Pertamax Turbo</option>
                        </select>
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