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
            <?= form_open(route_to('units.update', $unit->id), hidden: ['_method' => 'PUT']) ?>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" name="name" value="<?= old('name') ?? $unit->name; ?>"
                           id="name" placeholder="Digite seu nome">
                    <?= show_error_imput('name')?>

                </div>

                <div class="form-group col-md-4">
                    <label for="tel">Telefone:</label>
                    <input type="text" class="form-control" name="phone" value="<?= old('phone') ?? $unit->phone; ?>"
                           id="phone"
                           placeholder="Digite seu telefone">
                    <?= show_error_imput('phone')?>

                </div>

                <div class="form-group col-md-4">
                    <label for="coordinator">Coordenador:</label>
                    <input type="text" class="form-control" name="coordinator"
                           value="<?= old('coordinator') ?? $unit->coordinator; ?>" id="coordinator"
                           placeholder="Coordenador">
                    <?= show_error_imput('name')?>

                </div>

                <div class="form-group col-md-4">
                    <label for="text">starttime:</label>
                    <input type="time" class="form-control" name="starttime"
                           value="<?= old('starttime') ?? $unit->starttime; ?>" id="starttime"
                           placeholder="Hora do inicio">
                    <?= show_error_imput('name')?>

                </div>

                <div class="form-group col-md-4"> <label for="text">endtime:</label>
                    <input type="time" class="form-control" name="endtime"
                           value="<?= old('endtime') ?? $unit->endtime; ?>" id="endtime" placeholder="Termio do seviço">
                    <?= show_error_imput('name')?>

                </div>
                <div class="form-group col-md-4">
                    <label for="servicetime">Tempo de serviço:</label>
                    <input type="text" class="form-control" name="servicetime"
                           value="<?= old('servicetime') ?? $unit->servicetime; ?>" id="servicetime"
                           placeholder="servicetime">
                    <?= show_error_imput('name')?>

                </div>

                <div class="form-group col-md-4">
                    <label for="address">Endereço:</label>
                    <input type="text" class="form-control" name="address"
                           value="<?= old('address') ?? $unit->address; ?>" id="address" placeholder="Endereço">
                    <?= show_error_imput('name')?>

                </div>

                <div class="form-group col-md-4">
                    <label for="text">email:</label>
                    <input type="email" class="form-control" name="email" value="<?= old('email') ?? $unit->email; ?>"
                           id="email" placeholder="email ">
                    <?= show_error_imput('name')?>

                </div>

            </div>

            <div class="custom-control custom-checkbox">
                <?= form_hidden('active', '0'); ?>
                <input type="checkbox" class="custom-control-input" name="active" id="active"
                       value="1" <?= ($unit->active == 1) ? 'checked' : ''; ?>>
                <label class="custom-control-label" for="active">Ativo</label>

            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <?= form_close(); ?>

        </div>
    </div>


    <?= $this->endSection(); ?>

    <?= $this->section('js'); ?>
    <!-- Page level plugins -->

    <?= $this->endSection(); ?>

