<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <title>Restoran Jowo</title>
</head>

<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="col-md-3">
                        <a class="navbar-brand" href="<?= base_url('/home') ?>">
                            <h3>Restoran Jowo</h3>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="col-md-9">
                        <?php
                        if (!empty(session()->get('pelanggan'))) {
                            echo '<div class="float-right mt-2">
                                <a href=' . base_url('login/logout') . '>Logout</a>
                            </div>
                            <div class="float-right mt-2 mr-4">
                                <p>Pelanggan : ' . session()->get('pelanggan') . '</p></div>
                            <div class="float-right mt-2 mr-4">
                                <a href=' . base_url('cart/') . '>Cart ( ' . $cart->totalItems() . ' )</a>
                            </div>
                            <div class="float-right mt-2 mr-4">
                                <a href=' . base_url('/histori/index/' . session()->get('idpelanggan')) . '>Histori</a>
                            </div>
                        ';
                        } else {
                            echo '
                            <div class="float-right mt-2">
                            <a href=' . base_url('login/') . '>Login</a>
                        </div>
                        <div class="float-right mt-2 mr-4">
                            <a href=' . base_url('daftar/') . '>Daftar</a>
                        </div>
                        ';
                        }
                        ?>
                    </div>
                </nav>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-3">
                <h4>Kategori</h4>
                <hr>
                <div class="card">
                    <?php if (empty($row)) { ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="<?= base_url('/home') ?>">Semua</a></li>
                            <?php foreach ($kategori as $key => $value) : ?>
                                <li class="list-group-item"><a href="<?= base_url('/home/select' . '/' . $value['idkategori']) ?>"><?php echo $value['kategori'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>

            <div class="col-9 px-2">

                <?= $this->renderSection('content') ?>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <p class="text-center">2020 - copyright@ahmadmuafi.com</p>
            </div>
        </div>
    </div>


</body>

</html>