<div class="row">
    <div class="form-group col-md-4">
        <label for="name">Nome:</label>
        <input type="text" class="form-control" name="name" value="<?= old('name') ?? $unit->name; ?>"
               id="name" placeholder="Digite seu nome">
        <?= show_error_imput('name')?>

    </div>

    <div class="form-group col-md-4">
        <label for="tel">Telefone:</label>
        <input type="text" class="form-control phone_with_ddd" name="phone" value="<?= old('phone') ?? $unit->phone; ?>"
               id="phone"
               placeholder="Digite seu telefone">
        <?= show_error_imput('phone')?>

    </div>

    <div class="form-group col-md-4">
        <label for="coordinator">Coordenador:</label>
        <input type="text" class="form-control" name="coordinator"
               value="<?= old('coordinator') ?? $unit->coordinator; ?>" id="coordinator"
               placeholder="Coordenador">
        <?= show_error_imput('coordinator')?>

    </div>

    <div class="form-group col-md-4">
        <label for="text">starttime:</label>
        <input type="time" class="form-control" name="starttime"
               value="<?= old('starttime') ?? $unit->starttime; ?>" id="starttime"
               placeholder="Hora do inicio">
        <?= show_error_imput('starttime')?>

    </div>

    <div class="form-group col-md-4"> <label for="text">endtime:</label>
        <input type="time" class="form-control" name="endtime"
               value="<?= old('endtime') ?? $unit->endtime; ?>" id="endtime" placeholder="Termio do seviço">
        <?= show_error_imput('endtime')?>

    </div>
    <div class="form-group col-md-4">
        <label for="servicetime">Tempo de serviço:</label>
        <?= show_error_imput('servicetime')?>
        <?= $timesInterval ?>


    </div>

    <div class="form-group col-md-4">
        <label for="address">Endereço:</label>
        <input type="text" class="form-control" name="address"
               value="<?= old('address') ?? $unit->address; ?>" id="address" placeholder="Endereço">
        <?= show_error_imput('address')?>

    </div>

    <div class="form-group col-md-4">
        <label for="text">email:</label>
        <input type="email" class="form-control" name="email" value="<?= old('email') ?? $unit->email; ?>"
               id="email" placeholder="email ">
        <?= show_error_imput('email')?>

    </div>

</div>
<div class="custom-control custom-checkbox">
    <?= form_hidden('active', '0') ?>
    <input type="checkbox" class="custom-control-input" name="active" id="active"
           value="1" <?= ($unit->active == 1) ? 'checked' : '' ?>>
    <label class="custom-control-label" for="active">Ativo</label>
</div>

<button type="submit" class="btn btn-primary">Enviar</button>
<a href="<?= route_to('units') ?>" class="btn btn-danger">Voltar</a>
