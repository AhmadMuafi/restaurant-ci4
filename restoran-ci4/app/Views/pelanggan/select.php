<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<?php

if (isset($_GET['page_page'])) {
    $page = $_GET['page_page'];
    $jumlah = 3;
    $no = ($jumlah * $page) - $jumlah + 1;
} else {
    $no = 1;
}

?>

<div class="row">
    <div class="">
        <h3><?php echo $judul; ?></h3>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Email</th>
                <th>Aksi</th>
                <th>Status</th>
            </tr>

            <?php $no ?>
            <?php foreach ($pelanggan as $key => $value) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $value['pelanggan'] ?></td>
                    <td><?php echo $value['alamat'] ?></td>
                    <td><?php echo $value['telp'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><a href="<?= base_url() ?>/admin/pelanggan/delete/<?= $value['idpelanggan'] ?>"><img src="<?= base_url('/icon/trash.svg') ?>" alt=""></a>
                    </td>
                    <?php
                    if ($value['aktif'] == 1) {
                        $aktif = 'AKTIF';
                    } else {
                        $aktif = 'NON AKTIF';
                    }
                    ?>
                    <td><a href="<?= base_url() ?>/admin/pelanggan/update/<?= $value['idpelanggan'] ?>/<?= $value['aktif'] ?>"><?= $aktif ?></a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
        <?php echo $pager->links('page', 'bootstrap') ?>
    </div>
</div>


<?= $this->endsection() ?>