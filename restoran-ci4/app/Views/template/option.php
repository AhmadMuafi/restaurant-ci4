<div class="form-group">
    <select class="form-control" onchange="this.form.submit()" name="idkategori" id="idkategori">
        <option value="1">Cari...</option>
        <?php foreach ($kategori as $key => $value) : ?>
            <option value="<?= $value['idkategori'] ?>"><?php echo $value['kategori'] ?></option>
        <?php endforeach; ?>
    </select>
</div>