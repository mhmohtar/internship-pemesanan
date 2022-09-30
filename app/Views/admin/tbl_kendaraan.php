<div class="container-fluid">

    <!-- Page Heading -->
    <p class="fs-5 fw-light font-monospace text-gray-800">Tabel Data</p>
    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 fw-light text-dark">Data Kendaraan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nopol kendaraan</th>
                            <th>Merk</th>
                            <th>Jenis Kendaraan</th>
                            <th>Tahun Pembuatan</th>
                            <th>Bahan Bakar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kendaraan as $row): 
                            $ket = "";
                            if($row['status']==0){
                                $ket = "Tersedia";
                            }else if($row['status']==1){
                                $ket = "Sudah Dipesan";
                            }
                        ?>
                        <tr>
                            <td><?=$row['id_nopol_kendaraan'];?></td>
                            <td><?=$row['merk']?></td>
                            <td><?=$row['jenis']?></td>
                            <td><?=$row['thn_pembuatan']?></td>
                            <td><?=$row['bhn_bakar']?></td>
                            <td>
                                <span class="bg-primary px-2 fw-light text-light"><?=$ket?></span>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>