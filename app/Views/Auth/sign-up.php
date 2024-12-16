<?= $this->extend('Admin/others/layout/master') ?>

<?= $this->section('content') ?>
<div class="container-fluid p-0">
  <div class="row m-0">
    <div class="col-12 p-0">
      <div class="login-card">
        <div>
          <div><a class="logo" href="<?= base_url("/") ?>"><img class="img-fluid for-light" src="<?= base_url() ?>/assets/images/logo/logo.png" alt="looginpage"><img class="img-fluid for-dark" src="<?= base_url() ?>/assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
          <div class="login-main">


            <form class="theme-form" action="<?= url_to('register') ?>" method="post">
              <?= csrf_field() ?>
              <h4>Crie Sua Conta</h4>
              <p>Finalize seu cadastro e inicie o seu <spam class='txt-success'>Teste Grátis</spam>
              </p>
              <?php if (session('error') !== null) : ?>
                <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
              <?php elseif (session('errors') !== null) : ?>
                <div class="alert alert-danger" role="alert">
                  <?php if (is_array(session('errors'))) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                      <?= $error ?>
                      <br>
                    <?php endforeach ?>
                  <?php else : ?>
                    <?= session('errors') ?>
                  <?php endif ?>
                </div>
              <?php endif ?>
              <!-- login -->
              <div class="form-group">
                <label class="col-form-label pt-0">Login</label>
                <div class="row g-2">
                  <div class="col-12">
                    <input type="text" class="form-control" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required>
                  </div>
                </div>
              </div>
              <!-- Email -->
              <div class="form-group">
                <label class="col-form-label">Email</label>
                <input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
              </div>
              <!-- Password -->
              <div class="form-group">
                <label class="col-form-label">Senha</label>
                <div class="form-input position-relative">
                  <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required>
                </div>
              </div>
              <!-- Password (Again) -->
              <div class="form-group">
                <label class="col-form-label">Confirme a Senha</label>
                <div class="form-input position-relative">
                  <input type="password" class="form-control" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>" required>
                </div>
              </div>
              <div class="form-group mb-0">
                <div class="checkbox p-0">
                  <input id="checkbox1" type="checkbox" name="aceito_termos" value="1">
                  <label class="text-muted" for="checkbox1">Aceito os <a class="ms-2" href="#">Termos de Uso</a></label>
                </div>
                <button class="btn btn-primary btn-block w-100" type="submit">Criar Minha Conta</button>
              </div>
              <p class="mt-4 mb-0">Você já tem uma conta?<a class="ms-2" href="<?= url_to('login') ?>">Faça Login</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>