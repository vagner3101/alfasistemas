<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
  <div>
    <div class="logo-wrapper"><a href="<?= url_to("dashboard") ?>"><img class="img-fluid for-light" src="<?= base_url() ?>/assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="<?= base_url() ?>/assets/images/logo/logo_dark.png" alt=""></a>
      <div class="back-btn"><i class="fa fa-angle-left"></i></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="<?= url_to("dashboard") ?>"><img class="img-fluid" src="<?= base_url() ?>/assets/images/logo/logo-icon.png" alt=""></a></div>


    <nav class="sidebar-main">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">



          <li class="back-btn"><a href="<?= url_to("dashboard") ?>"><img class="img-fluid" src="<?= base_url() ?>/assets/images/logo/logo-icon.png" alt=""></a>
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
          </li>

          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= url_to("dashboard") ?>">
              <svg class="stroke-icon">
                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-home"></use>
              </svg>
              <svg class="fill-icon">
                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-home"> </use>
              </svg><span>Dashboard</span></a></li>

          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= url_to('/') ?>">
              <svg class=" stroke-icon">
                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-ecommerce"></use>
              </svg>
              <svg class="fill-icon">
                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-ecommerce"> </use>
              </svg><span>Prdidos</span>
            </a></li>

          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= url_to('/') ?>">
              <svg class=" stroke-icon">
                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-user"></use>
              </svg>
              <svg class="fill-icon">
                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-user"> </use>
              </svg><span>Clientes</span>
            </a></li>

          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= url_to('/') ?>">
              <svg class=" stroke-icon">
                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-board"></use>
              </svg>
              <svg class="fill-icon">
                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-board"> </use>
              </svg><span>Produtos</span>
            </a></li>


          <?php if (auth()->user()->inGroup('admin', 'superadmin')): ?>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= url_to('/') ?>">
                <svg class=" stroke-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-button"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-button"> </use>
                </svg><span>Fornecedores</span>
              </a></li>

            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= url_to('/') ?>">
                <svg class=" stroke-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-charts"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-charts"> </use>
                </svg><span>Financeiro</span>
              </a></li>

            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= url_to('/') ?>">
                <svg class=" stroke-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-form"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-form"> </use>
                </svg><span>Relatórios</span>
              </a></li>


            <li class="sidebar-list">
              <a class="sidebar-link sidebar-title link-nav" href="<?= url_to('configura.empresa') ?>">
                <svg class="stroke-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-to-do"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-to-do"> </use>
                </svg>
                <span>Empresa</span>
              </a>
            </li>

            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-others"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-others"></use>
                </svg><span>Configurações</span></a>
              <ul class="sidebar-submenu">
                <li><a href="<?= base_url("user/user-profile") ?>">Formas de Pagamento</a></li>
                <li><a href="<?= base_url("user/edit-profile") ?>">Formas de Entrega</a></li>
                <li><a href="<?= base_url("user/user-cards") ?>">Status de Pedidos</a></li>
                <li><a href="<?= base_url("user/user-cards") ?>">Usuarios</a></li>
              </ul>
            </li>
          <?php endif; ?>



          <?php if (auth()->user()->inGroup('superadmin')): ?>
            <li class="sidebar-main-title">
              <div>
                <h6 class="lan-1">Super Admin</h6>
              </div>
            </li>
            <li class="sidebar-list">
              <a class="sidebar-link sidebar-title link-nav" href="<?= url_to('home.admin') ?>">
                <svg class="stroke-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-widget"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-widget"> </use>
                </svg>
                <span>Dashboard Admin</span>
              </a>
            </li>

            <li class="sidebar-list">
              <a class="sidebar-link sidebar-title link-nav" href="<?= url_to('/') ?>">
                <svg class="stroke-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-home"> </use>
                </svg>
                <span>Empresas</span>
              </a>
            </li>

            <li class="sidebar-list">
              <a class="sidebar-link sidebar-title link-nav" href="<?= url_to('/') ?>">
                <svg class="stroke-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-user"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-user"> </use>
                </svg>
                <span>Usuarios</span>
              </a>
            </li>

            <li class="sidebar-list">
              <a class="sidebar-link sidebar-title link-nav" href="<?= url_to('/') ?>">
                <svg class="stroke-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-learning"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-learning"> </use>
                </svg>
                <span>Planos</span>
              </a>
            </li>

            <li class="sidebar-list">
              <a class="sidebar-link sidebar-title link-nav" href="<?= url_to('/') ?>">
                <svg class="stroke-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-sample-page"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#fill-sample-page"> </use>
                </svg>
                <span>Relatórios</span>
              </a>
            </li>



          <?php endif; ?>




        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
  </div>
</div>