<div class="container-fluid">

    <!-- Page Heading -->
    <p class="fs-5 fw-light text-gray-800">Tabel Data</p>
    <!-- DataTales Example -->
    <div class="card shadow">

        <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success text-center">
            <?=session()->getFlashdata('pesan') ?>
        </div>
        <?php endif;?>

        <div class="card-header py-3">
            <h6 class="m-0 fw-light text-dark">Data Pemesanan Yang Belom Di konfirmasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nopol kendaraan</th>
                            <th>Nama Pemesan</th>
                            <th>Jenis Kendaraan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Status Pemesanan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($konfirmasip as $row): 
                            $ket = "";
                            if($row['status']==0){
                                $ket = "belom dikonfirmasi";
                            }else if($row['status']=="sudah dikonfirmasi");
                        ?>
                        <tr>
                            <td><?=$row['id_nopol_kendaraan'];?></td>
                            <td><?=$row['nama_pegawai']?></td>
                            <td><?=$row['jenis']?></td>
                            <td><?=$row['tgl_pemesanan']?></td>
                            <td><?=$ket?></td>
                            <td>
                                <span class="bg-primary px-2 py-1 fw-lighter text-light">
                                    <a class="text-decoration-none text-white"
                                        href="<?=base_url('proses-konfirmasi-pemesanan/'.$row['id_pemesanan'])?>">Konfirmasi</a>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>