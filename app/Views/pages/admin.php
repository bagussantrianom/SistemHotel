<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo ($title); ?></h1>
        </div>

        <!-- Content Row -->
        <center>
            <img src="<?= base_url('img/logoadmin.png') ?>" alt="">
        </center>

        <!-- /.container-fluid -->

    </div>
    <?= $this->endSection(); ?>