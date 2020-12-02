<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo session()->getFlashdata('info');
        echo "</div>";
    }
    ?>
</div>


<div class="col">
    <h3>INSERT DATA</h3>
</div>

<div class="col-8">
    <form action="<?php echo base_url('/admin/kategori/insert') ?>" method="post">
        <div class="form-group">
            <label for="Kategori">Kategori</label>
            <input type="text" name="kategori" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Keterangan">Keterangan</label>
            <input type="text" name="keterangan" required class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="SIMPAN" name="simpan">
        </div>
    </form>
</div>


<?= $this->endsection() ?>