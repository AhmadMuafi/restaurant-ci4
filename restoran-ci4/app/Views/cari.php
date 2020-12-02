<?= $this->extend('template/home') ?>
<?= $this->section('content') ?>

<h4 class="">Menu</h4>

<div class="row mt-3 mb-2">
    <?php foreach ($menu as $key => $value) : ?>
        <div class="card ml-3 mt-3" style="width: 16rem;">
            <img src="<?= base_url() ?>/upload/<?php echo $value['gambar'] ?>" style="height:160px;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $value['menu'] ?></h5>
                <p class="card-text">Rp. <?php echo $value['harga'] ?></p>
                <a href="<?= base_url('/cart/buy/' . $value['idmenu']) ?>" class="btn btn-primary">Beli</a>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?= $pager->makeLinks(1, $tampil, $total, 'bootstrap') ?>

<?= $this->endsection() ?>