<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
  <div>
    <div class="logo-wrapper"><a href="<?= base_url("/app") ?>"><img class="img-fluid for-light" src="<?= base_url() ?>/assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="<?= base_url() ?>/assets/images/logo/logo_dark.png" alt=""></a>
      <div class="back-btn"><i class="fa fa-angle-left"></i></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="<?= base_url("/app") ?>"><img class="img-fluid" src="<?= base_url() ?>/assets/images/logo/logo-icon.png" alt=""></a></div>
    <nav class="sidebar-main">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">


          <li class="back-btn"><a href="<?= base_url("/app") ?>"><img class="img-fluid" src="<?= base_url() ?>/assets/images/logo/logo-icon.png" alt=""></a>
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
          </li>

          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url("/app/dashboard") ?>">
              <svg class="stroke-icon">
                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-bookmark"></use>
              </svg>
              <svg class="fill-icon">
                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-bookmark"> </use>
              </svg><span>Bookmarks</span></a></li>





          <li class="mega-menu"><a class="sidebar-link sidebar-title" href="#">
              <svg class="stroke-icon">
                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-others"></use>
              </svg>
              <svg class="fill-icon">
                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-others"></use>
              </svg><span>Others</span></a>
            <div class="mega-menu-container menu-content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col mega-box">
                    <div class="link-section">
                      <div class="submenu-title">
                        <h5>Error Page</h5>
                      </div>
                      <ul class="submenu-content opensubmegamenu">
                        <li><a href="<?= base_url("error-pages/error-400") ?>">Error 400</a></li>
                        <li><a href="<?= base_url("error-pages/error-401") ?>">Error 401</a></li>
                        <li><a href="<?= base_url("error-pages/error-403") ?>">Error 403</a></li>
                        <li><a href="<?= base_url("error-pages/error-404") ?>">Error 404</a></li>
                        <li><a href="<?= base_url("error-pages/error-500") ?>">Error 500</a></li>
                        <li><a href="<?= base_url("error-pages/error-503") ?>">Error 503</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col mega-box">
                    <div class="link-section">
                      <div class="submenu-title">
                        <h5> Authentication</h5>
                      </div>
                      <ul class="submenu-content opensubmegamenu">
                        <li><a href="<?= base_url("authentications/login") ?>" target="_blank">Login Simple</a></li>
                        <li><a href="<?= base_url("authentications/login_one") ?>" target="_blank">Login with bg image</a></li>
                        <li><a href="<?= base_url("authentications/login_two") ?>" target="_blank">Login with image two </a></li>
                        <li><a href="<?= base_url("authentications/login-bs-validation") ?>" target="_blank">Login With validation</a></li>
                        <li><a href="<?= base_url("authentications/login-bs-tt-validation") ?>" target="_blank">Login with tooltip</a></li>
                        <li><a href="<?= base_url("authentications/login-sa-validation") ?>" target="_blank">Login with sweetalert</a></li>
                        <li><a href="<?= base_url("authentications/sign-up") ?>" target="_blank">Register Simple</a></li>
                        <li><a href="<?= base_url("authentications/sign-up-one") ?>" target="_blank">Register with Bg Image </a></li>
                        <li><a href="<?= base_url("authentications/sign-up-two") ?>" target="_blank">Register with image two</a></li>
                        <li><a href="<?= base_url("authentications/sign-up-wizard") ?>" target="_blank">Register wizard</a></li>
                        <li><a href="<?= base_url("authentications/unlock") ?>">Unlock User</a></li>
                        <li><a href="<?= base_url("authentications/forget-password") ?>">Forget Password</a></li>
                        <li><a href="<?= base_url("authentications/reset-password") ?>">Reset Password</a></li>
                        <li><a href="<?= base_url("authentications/maintenance") ?>">Maintenance</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col mega-box">
                    <div class="link-section">
                      <div class="submenu-title">
                        <h5>Coming Soon</h5>
                      </div>
                      <ul class="submenu-content opensubmegamenu">
                        <li><a href="<?= base_url("comming-soons/comingsoon") ?>">Coming Simple</a></li>
                        <li><a href="<?= base_url("comming-soons/comingsoon-bg-video") ?>">Coming with Bg video</a></li>
                        <li><a href="<?= base_url("comming-soons/comingsoon-bg-img") ?>">Coming with Bg Image</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col mega-box">
                    <div class="link-section">
                      <div class="submenu-title">
                        <h5>Email templates</h5>
                      </div>
                      <ul class="submenu-content opensubmegamenu">
                        <li><a href="<?= base_url("email-templates/basic-template") ?>">Basic Email</a></li>
                        <li><a href="<?= base_url("email-templates/email-header") ?>">Basic With Header</a></li>
                        <li><a href="<?= base_url("email-templates/template-email") ?>">Ecomerce Template</a></li>
                        <li><a href="<?= base_url("email-templates/template-email-2") ?>">Email Template 2</a></li>
                        <li><a href="<?= base_url("email-templates/ecommerce-templates") ?>">Ecommerce Email</a></li>
                        <li><a href="<?= base_url("email-templates/email-order-success") ?>">Order Success</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>









        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
  </div>
</div>