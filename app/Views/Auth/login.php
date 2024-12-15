<?= $this->extend('Admin/others/layout/master') ?>

<?= $this->section('content') ?>
<div class="container-fluid p-0">
  <div class="row m-0">
    <div class="col-12 p-0">
      <div class="login-card">
        <div>
          <div><a class="logo" href="<?= base_url("/") ?>"><img class="img-fluid for-light" src="<?= base_url() ?>/assets/images/logo/logo.png" alt="looginpage"><img class="img-fluid for-dark" src="<?= base_url() ?>/assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
          <div class="login-main">
            <?php if (session('message') !== null) : ?>
              <div class="alert alert-success" role="alert"><?= session('message') ?></div>
            <?php endif ?>
            <h4>Entrar</h4>
            <p>Insira sua credencial abaixo:</p>
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
            <form action="<?= url_to('login') ?>" method="post">
              <?= csrf_field() ?>
              <!-- Email -->
              <div class="form-group">
                <label class="col-form-label">Email Address</label>
                <input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="E-mail" value="<?= old('email') ?>" required>
              </div>
              <!-- Password -->
              <div class="form-group">
                <label class="col-form-label">Password</label>
                <div class="form-input position-relative">
                  <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="current-password" placeholder="Senha" required>
                  <div class="show-hide"><span class="show"> </span></div>
                </div>
              </div>
              <!-- Remember me -->
              <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                <div class="form-group mb-0">
                  <div class="checkbox p-0">
                    <input id="checkbox1" type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')): ?> checked<?php endif ?>>
                    <label class="text-muted" for="checkbox1">Lembrar Senha</label>
                  </div><a class="link" href="<?= url_to('magic-link') ?>">Esqueceu a sua Senha?</a>
                <?php endif; ?><!-- Submit -->
                <div class="text-end mt-3">
                  <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                </div>
                </div>
                <p class="mt-4 mb-0 text-center">Não tem uma conta?<a class="ms-2" href="<?= url_to('register') ?>">Registre-se aqui</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?= $this->endSection() ?>