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
    <div class="col-4">
        <a class="btn btn-primary" href="<?= base_url('/admin/user/create') ?>" role="button">Tambah Data</a>
    </div>
    <div class="">
        <h3><?php echo $judul; ?></h3>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Email</th>
                <th>Level</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php $no ?>
            <?php foreach ($user as $key => $value) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $value['user'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><?php echo $value['level'] ?></td>
                    <?php if ($value['aktif'] == 1) $aktif = "AKTIF";
                    else $aktif = "BANNED"; ?>
                    <td>
                        <a href="<?= base_url() ?>/admin/user/update/<?= $value['iduser'] ?>/<?= $value['aktif'] ?>"><?= $aktif ?></a>
                    </td>
                    <td><a href="<?= base_url() ?>/admin/user/delete/<?= $value['iduser'] ?>"><img src="<?= base_url('/icon/trash.svg') ?>" alt=""></a>
                        <a href="<?= base_url() ?>/admin/user/find/<?= $value['iduser'] ?>"><img src="<?= base_url('/icon/pencil.svg') ?>" alt=""></a></td>
                </tr>
            <?php endforeach; ?>

        </table>
        <?php echo $pager->links('page', 'bootstrap') ?>
    </div>
</div>


<?= $this->endsection() ?>