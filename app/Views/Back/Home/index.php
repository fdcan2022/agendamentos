<?= $this->extend('Layout/main'); ?>

<?= $this->section('title'); ?>

<?= $title ?? ''; ?>

<?= $this->endSection(); ?>

<?= $this->section('css'); ?>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?? ''; ?></h1>
<p>  <?= $description ?? ''; ?> </p>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?= $this->endSection(); ?>

<?= $this->section('js'); ?>

<?= $this->endSection(); ?>

