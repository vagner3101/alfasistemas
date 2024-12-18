<?= $this->extend('Admin/layout/master') ?>

<?= $this->section('main-content') ?>

<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Sample Page</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url("/") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Sample Page</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Index Page</h5><span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                </div>
                <div class="card-body">



                    <h2>Informações da Empresa</h2>
                    <p>Nome da Empresa: <?= esc($empresa_nome ?? 'Não definido') ?></p>
                    <p>ID da Empresa: <?= esc($empresa_id ?? 'Não definido') ?></p>

                    <?php if (!empty($empresa_data)): ?>
                        <h3>Dados da Empresa:</h3>
                        <pre><?= esc(print_r($empresa_data, true)) ?></pre>
                    <?php else: ?>
                        <p>Dados da empresa não disponíveis.</p>
                    <?php endif; ?>

                    <h3>Informações de Debug:</h3>
                    <pre><?= esc(print_r($debug_info, true)) ?></pre>

                    <h3>Todas as Empresas:</h3>
                    <pre><?= esc(print_r($debug_info['todas_empresas'] ?? [], true)) ?></pre>



                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url() ?>/assets/js/tooltip-init.js"></script>

<?= $this->endSection() ?>