<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
</head>

<body style="background-color: hsl(0, 0%, 96%)">
    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h1 class="my-5 display-3 fw-bold ls-tight">Mau Pesan Kendaraan? <br />
                            <span class="text-primary">Semau ada disini ?</span>
                        </h1>
                    </div>

                    <div class="col-lg-5 mb-5 mb-lg-0">
                        <?php if(session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-danger text-center">
                            <?php echo session()->getFlashdata('pesan') ?>
                        </div>
                        <?php endif ?>

                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <p class="text-center fs-4">Login Disini!</p>
                                <form method="post" action="<?=base_url('simpan-login')?>">
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example3" class="form-control" name="user" />
                                        <label class="form-label" for="form3Example3">Masukkan Username</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4" class="form-control" name="pass" />
                                        <label class="form-label" for="form3Example4">Masukkan Password</label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4">
                                        Proses Login
                                    </button>

                                    <!-- Register buttons -->
                                    <div class="text-center">
                                        <p>Belom Punya Akun? <a href="<?=base_url('daftar-admin')?>"> Daftar</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->

</body>

</html>