<?= $this->extend('Admin/layout/master') ?>

<?= $this->section('main-content') ?>

<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12">
                <h3>Editar Empresa</h3>
            </div>
            <div class="col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url("/app") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Empresa</li>
                    <li class="breadcrumb-item active">Editar Empresa</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <script>
                var hasError = <?= json_encode(session()->has('error')) ?>;
                var hasSuccess = <?= json_encode(session()->has('success')) ?>;
                var errorMessage = <?= json_encode(session('error')) ?>;
                var successMessage = <?= json_encode(session('success')) ?>;
            </script>


            <form class="card" action="<?= url_to('empresa.salvar') ?>" method="POST" enctype="multipart/form-data">

                <div class="card-header">
                    <h4 class="card-title mb-0"></h4>
                </div>
                <div class="card-body">
                    <div class="row g-2">

                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="col">
                                    <div class="m-t-5 m-checkbox-inline custom-radio-ml">
                                        <label class="form-label">Tipo de Empresa</label>
                                        <div class="form-check form-check-inline radio radio-primary">
                                            <input class="form-check-input" id="tipo_empresa_pf" type="radio" name="tipo_empresa" value="PF" <?= old('tipo_empresa', $empresa['tipo_empresa'] ?? '') == 'PF' ? 'checked' : '' ?>>
                                            <label class="form-check-label mb-0" for="tipo_empresa_pf">Pessoa Física</label>
                                        </div>
                                        <div class="form-check form-check-inline radio radio-primary">
                                            <input class="form-check-input" id="tipo_empresa_pj" type="radio" name="tipo_empresa" value="PJ" <?= old('tipo_empresa', $empresa['tipo_empresa'] ?? '') == 'PJ' ? 'checked' : '' ?>>
                                            <label class="form-check-label mb-0" for="tipo_empresa_pj">Pessoa Jurídica</label>
                                        </div>
                                    </div>
                                    <?php if (session('errors.tipo_empresa')): ?>
                                        <div class="invalid-feedback d-block">
                                            <?= session('errors.tipo_empresa') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nome da Empresa</label>
                                <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome da Empresa" value="<?= old('nome', $empresa['nome'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Razão Social</label>
                                <input class="form-control" id="razao_social" name="razao_social" type="text" placeholder="Razão Social" value="<?= old('razao_social', $empresa['razao_social'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="cpf_cnpj" id="label_cpf_cnpj">CPF/CNPJ</label>
                                <input class="form-control" id="cpf_cnpj" name="cpf_cnpj" type="text" placeholder="CPF/CNPJ" value="<?= old('cpf_cnpj', $empresa['cpf_cnpj'] ?? '') ?>">
                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">CEP</label>
                                <input class="form-control" id="cep" name="cep" type="text" placeholder="CEP" value="<?= old('cep', $empresa['cep'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Rua</label>
                                <input class="form-control" id="rua" name="rua" type="text" placeholder="Rua" value="<?= old('rua', $empresa['rua'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Número</label>
                                <input class="form-control" id="numero" name="numero" type="text" placeholder="Número" value="<?= old('numero', $empresa['numero'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Bairro</label>
                                <input class="form-control" id="bairro" name="bairro" type="text" placeholder="Bairro" value="<?= old('bairro', $empresa['bairro'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Complemento</label>
                                <input class="form-control" id="complemento" name="complemento" type="text" placeholder="Complemento" value="<?= old('complemento', $empresa['complemento'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Cidade</label>
                                <input class="form-control" id="cidade" name="cidade" type="text" placeholder="Cidade" value="<?= old('cidade', $empresa['cidade'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <input class="form-control" id="estado" name="estado" type="text" placeholder="UF" value="<?= old('estado', $empresa['estado'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">WhatsApp</label>
                                <input class="form-control" id="whatsapp" name="whatsapp" type="text" placeholder="WhatsApp" value="<?= old('whatsapp', $empresa['whatsapp'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Instagram</label>
                                <input class="form-control" id="instagram" name="instagram" type="text" placeholder="Instagram" value="<?= old('instagram', $empresa['instagram'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Website</label>
                                <input class="form-control" id="website" name="website" type="text" placeholder="Website" value="<?= old('website', $empresa['website'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="E-mail" value="<?= old('email', $empresa['email'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="subdominio" class="form-label">Subdomínio</label>
                            <div class="input-group">
                                <input type="text" class="form-control <?= session('errors.subdominio') ? 'is-invalid' : '' ?>"
                                    id="subdominio" name="subdominio"
                                    value="<?= old('subdominio', $empresa['subdominio_display'] ?? '') ?>">
                                <span class="input-group-text">.<?= env('CentralDomain') ?></span>
                            </div>
                            <div id="subdominio-feedback" class="invalid-feedback d-block"></div>
                            <?php if (session('errors.subdominio')): ?>
                                <div class="invalid-feedback d-block">
                                    <?= session('errors.subdominio') ?>
                                </div>
                            <?php endif; ?>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Domínio Personalizado</label>
                                <input class="form-control" id="dominio" name="dominio" type="text" placeholder="Domínio Personalizado" value="<?= old('dominio', $empresa['dominio'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Logo do Sistema</label>
                                <input class="form-control" id="logo_sistema" name="logo_sistema" type="file">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Logo do Sistema (Pequeno)</label>
                                <input class="form-control" id="logo_sistema_pequeno" name="logo_sistema_pequeno" type="file">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Logo para Pedidos</label>
                                <input class="form-control" id="logo_pedidos" name="logo_pedidos" type="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">
                        <?php if ($empresa): ?>
                            Atualizar
                        <?php else: ?>
                            Cadastrar
                        <?php endif; ?>
                    </button>
                </div>

            </form>




        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url() ?>/assets/js/tooltip-init.js"></script>
<?= $this->include('app/js/mensagens') ?>
<?= $this->include('app/js/subdominio') ?>
<?= $this->include('app/js/empresa') ?>





<?= $this->endSection() ?>