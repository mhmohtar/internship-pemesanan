<div class="container-fluid">

    <!-- Page Heading -->
    <p class="fs-5 fw-light font-monospace text-gray-800">Tabel Data</p>
    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 fw-light text-dark">Data Status Pemesanan </h6>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($statusp as $row): 
                            $ket = "";
                            if($row['statusp']==1){
                                $ket = "<span class='bg-primary px-2 py-1 fw-bolder text-light rounded-1 fs-6'>Pemesanan dikonfirmasi</span>";
                            }elseif($row['statusp']==0){
                                $ket = "<span class='bg-danger px-1 py-0 fw-bolder text-light rounded-1 fs-6'>Belom dikonfirmasi</span>";
                            }
                        ?>
                        <tr>
                            <td><?=$row['id_nopol_kendaraan'];?></td>
                            <td><?=$row['nama_pegawai']?></td>
                            <td><?=$row['jenis']?></td>
                            <td><?=$row['tgl_pemesanan']?></td>
                            <td><?=$ket?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>