<?= $this->extend('template/home') ?>
<?= $this->section('content') ?>

<div class="col-8 mx-auto">
    <h3>Registrasi Berhasil Silakan Login</h3>
    <div class="">
        <a href="<?= base_url('login/') ?>" class="btn btn-primary mt-2">Login</a>
    </div>
</div>

<?= $this->endsection() ?>