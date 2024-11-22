<div class="container-fluid">


    <?php if (session()->has('info')): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Informação!</strong> <?= session('info') ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>

    <?php endif; ?>



    <?php if (session()->has('danger')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro!</strong> <?= session('danger') ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>

    <?php endif; ?>


    <?php if (session()->has('warning')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Atenção</strong> <?= session('warning') ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>

    <?php endif; ?>




    <?php if (session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso</strong> <?= session('success') ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>

    <?php endif; ?>

</div>

