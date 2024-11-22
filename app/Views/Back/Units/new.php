<?= $this->extend('Layout/main'); ?>

<?= $this->section('title'); ?>
<?= $title ?? ''; ?>
<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
    <link href="<?= base_url('back/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?? ''; ?></h6>
        </div>
        <div class="card-body">
            <?= form_open(route_to('units.create')) ?>

            <?=$this->include('Back/Units/_form') ?>

            <?= form_close(); ?>
        </div>
    </div>

    <?= $this->endSection(); ?>

    <?= $this->section('js'); ?>
    <!-- Page level plugins -->

    <script src="<?=base_url("/")?>mask/jquery.mask.min.js"></script>

    <script src="<?=base_url("/")?>mask/app.js"></script>
<?= $this->endSection(); ?>