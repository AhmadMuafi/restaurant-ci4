<?= $this->extend('template/home') ?>
<?= $this->section('content') ?>

<div class="row mt-2">
    <?php if ($cart->totalitems() === 0) : ?>
        <div class="alert alert-warning mx-auto" role="alert">
            Keranjang masih kosong silakan belanja lagi di <a href="<?= base_url('home') ?>" class="alert-link">Beranda</a>
        </div>
    <?php else : ?>
        <div class="col">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Hapus</th>
                </tr>

                <?php $no = 1 ?>
                <?php foreach ($cart->contents() as $key) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $key['name'] ?></td>
                        <td>Rp. <?php echo number_format($key['price'], 0, 0, ','); ?></td>
                        <td>
                            <?php echo anchor('/cart/kurang/' . $key['qty'] . '/' . $key['rowid'], '<span style="padding: 5px 13px; margin-right: 2px;" class="btn btn-primary">-</span>') ?>
                            <?php echo $key['qty'] ?>
                            <?php echo anchor('/cart/tambah/' . $key['qty'] . '/' . $key['rowid'], '<span style="padding: 5px 11px; margin-left: 2px;" class="btn btn-success">+</span>') ?>
                        </td>
                        <td>Rp. <?php echo number_format($key['price'] * $key['qty']); ?></td>
                        <td><?php echo anchor('/cart/remove/' . $key['rowid'], '<span style="padding: 5px 10px;" class="btn btn-danger">Hapus</span>') ?></td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <td colspan="5">
                        <h3>Grand Total :</h3>
                    </td>
                    <td>
                        <b>Rp. <?php echo number_format($cart->total(), 0, 0, ','); ?></b>
                    </td>
                </tr>
            </table>
            <a href="<?= base_url('/cart/checkout') ?>" class="btn btn-warning mb-4 btn-lg">Checkout</a>
        </div>
    <?php endif; ?>
</div>

<?= $this->endsection() ?>