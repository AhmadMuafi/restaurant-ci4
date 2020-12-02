<?= $this->extend('template/home') ?>
<?= $this->section('content') ?>

<h4 class="mb-4">Registrasi Pelanggan</h4>


<form action="<?php echo base_url('/daftar/insert') ?>" method="post">
    <div class="form-group">
        <label for="User">Pelanggan</label>
        <input type="text" name="pelanggan" required class="form-control">
    </div>
    <div class="form-group">
        <label for="User">Alamat</label>
        <input type="text" name="alamat" required class="form-control">
    </div>
    <div class="form-group">
        <label for="User">Telp</label>
        <input type="text" name="telp" required class="form-control">
    </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" name="email" required class="form-control">
    </div>
    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" name="password" required class="form-control">
    </div>
    <div class="form-group">
        <label for="Password">Konfirmasi Password</label>
        <input type="password" name="konfirmasi" required class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" class="btn-primary" value="SIMPAN" name="simpan">
    </div>
</form>

<?= $this->endsection() ?>