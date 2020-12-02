<?= $this->extend('template/home') ?>
<?= $this->section('content') ?>

<div class="">
    <h3>Histori Pembelian</h3>
</div>

<div class="row mt-4">
    <div class="col">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>

            <?php $no = 1 ?>
            <?php foreach ($order as $key) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $key['tglorder'] ?></td>
                    <td><?php echo $key['menu'] ?></td>
                    <td>Rp. <?php echo number_format($key['harga'], 0, 0, ','); ?></td>
                    <td><?php echo $key['jumlah'] ?></td>
                    <td>Rp. <?php echo number_format($key['harga'] * $key['jumlah'], 0, 0, ','); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?= $this->endsection() ?>