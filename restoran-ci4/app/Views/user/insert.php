<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo session()->getFlashdata('info');
        foreach ($error as $key => $value) {
            echo $key . " => " . $value;
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
    <form action="<?php echo base_url('/admin/user/insert') ?>" method="post">
        <div class="form-group">
            <label for="User">user</label>
            <input type="text" name="user" required class="form-control">
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
            <label for="Level">Level</label>
            <select class="form-control" name="level" id="level">
                <?php foreach ($level as $key) : ?>
                    <option value="<?= $key ?>"><?php echo $key ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="SIMPAN" name="simpan">
        </div>
    </form>
</div>


<?= $this->endsection() ?>