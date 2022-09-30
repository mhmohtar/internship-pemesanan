<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemesanan Kendaraan</title>
    <base href="<?php echo base_url('assets/');?>/" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fs-3 fst-italic text-light ps-5 ms-5" href="<?= base_url('index');?>">
                vehicle booking
            </a>
        </div>
    </nav>
    <section class="bg-secondary">
        <div class="container pt-5 pb-5">
            <div class="row pt-lg-5 pt-sm-0" height="100%">
                <div class="col-md-6">
                    <h1 class="fw-bolder sm-text-center">Mau Pesan Kendaraan?</h1>
                    <p class="fs-3 pt-3 mb-5">Semua ada disini!</p>
                    <a href="<?=base_url('masuk')?>"
                        class="justify-content-sm-center bg-primary text-light px-5 py-2 fs-5 rounded-2 text-decoration-none mb-5">Memulai</a>
                </div>
                <div class="col-md-6">
                    <div class="img d-flex justify-content-center">
                        <img src="<?php echo base_url('assets/images/logo.svg')?>"
                            class="img-responsive img-thumbnail w-75 rounded-5 lg-mt-0 mt-5 d-flex justify-content-center"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>