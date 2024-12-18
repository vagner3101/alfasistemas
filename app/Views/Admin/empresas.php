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
                    <h5>Lista de empresas</h5><span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive signal-table">
                        <table class="table table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Domínio</th>
                                    <th scope="col">Plano </th>
                                    <th scope="col">vencimento</th>
                                    <th scope="col">Status</th>
                                    <th class="text-center" scope="col">Açoes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Geráfica 2N</td>
                                    <td>grafica1.alfasistemas.test</td>
                                    <td>Start</td>
                                    <td>31/12/2025</td>

                                    <td>
                                        <div class="badge badge-success label-square"><span class="f-14">Ativo</span></div>
                                    </td>

                                    <td class="text-center">

                                        <a class="btn btn-outline-info btn-sm p-2"
                                            href="#" title="Visualizar"> <i class="icofont icofont-eye-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-success btn-sm p-2"
                                            href="#" title="Logar"> <i class="icofont icofont-login"></i>
                                        </a>
                                        <a class="btn btn-outline-primary btn-sm p-2"
                                            href="#" title="Editar"> <i class="icofont icofont-ui-edit"></i>
                                        </a>
                                        <a class="btn btn-outline-warning btn-sm p-2"
                                            href="#" title="Suspender"> <i class="icofont icofont-ui-block"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm p-2"
                                            href="#" title="Excluir"> <i class="icofont icofont-trash"></i>
                                        </a>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>







                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url() ?>/assets/js/tooltip-init.js"></script>

<?= $this->endSection() ?>