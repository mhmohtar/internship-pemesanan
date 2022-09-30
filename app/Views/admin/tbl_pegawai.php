<div class="container-fluid">

    <!-- Page Heading -->
    <p class="fs-5 fw-light font-monospace text-gray-800">Tabel Data</p>
    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 fw-light text-dark">Data Pegawai </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Pegawai</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pegawai as $row):?>
                        <tr>
                            <td><?=$row['id_pegawai'];?></td>
                            <td><?=$row['nama_pegawai'];?></td>
                            <td><?=$row['jenis_kelamin']?></td>
                            <td><?=$row['tempat_lahir']?></td>
                            <td><?=$row['agama']?></td>
                            <td><?=$row['alamat']?></td>
                            <td><?=$row['telepon']?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>