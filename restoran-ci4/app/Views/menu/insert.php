<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo "<div class='alert alert-danger' role='alert'>";
        $error = session()->getFlashdata('info');
        foreach ($error as $key => $value) {
            echo $key . "=>" . $value;
            echo "<br>";
        }
        echo "</div>";
    }
    ?>
</div>


<div class="col">
    <h3>INSERT DATA</h3>
</div>

<div class="col-8">
    <form action="<?php echo base_url('/admin/menu/insert') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="Kategori">Kategori</label>
            <select class="form-control" name="idkategori" id="idkategori">
                <?php foreach ($kategori as $key => $value) : ?>
                    <option value="<?= $value['idkategori'] ?>"><?php echo $value['kategori'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Menu">Menu</label>
            <input type="text" name="menu" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Harga">Harga</label>
            <input type="text" name="harga" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Gambar">Gambar</label>
            <input type="file" name="gambar" required class="form-control">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="SIMPAN" name="simpan">
        </div>
    </form>
</div>


<?= $this->endsection() ?>