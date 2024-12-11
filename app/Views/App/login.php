<?= $this->extend('Admin/others/layout/master') ?>

<?= $this->section('content') ?>
<div class="container-fluid p-0">
  <div class="row m-0">
    <div class="col-12 p-0">
      <div class="login-card">
        <div>
          <div><a class="logo" href="<?= base_url("/") ?>"><img class="img-fluid for-light" src="<?= base_url() ?>/assets/images/logo/logo.png" alt="looginpage"><img class="img-fluid for-dark" src="<?= base_url() ?>/assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
          <div class="login-main">
            <form class="theme-form">
              <h4>Sign in to account</h4>
              <p>Enter your email & password to login</p>
              <div class="form-group">
                <label class="col-form-label">Email Address</label>
                <input class="form-control" type="email" required="" placeholder="Test@gmail.com">
              </div>
              <div class="form-group">
                <label class="col-form-label">Password</label>
                <div class="form-input position-relative">
                  <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                  <div class="show-hide"><span class="show"> </span></div>
                </div>
              </div>
              <div class="form-group mb-0">
                <div class="checkbox p-0">
                  <input id="checkbox1" type="checkbox">
                  <label class="text-muted" for="checkbox1">Remember password</label>
                </div><a class="link" href="forget-password.php">Forgot password?</a>
                <div class="text-end mt-3">
                  <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                </div>
              </div>

              <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="<?= base_url("/app/dashboard") ?>">Create Account</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?= $this->endSection() ?>