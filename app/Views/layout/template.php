<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- theme meta -->
  <meta name="theme-name" content="quixlab" />

  <title>Kelompok 1</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('images/favicon.png'); ?>" />
  <!-- Pignose Calender -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('plugins/pg-calendar/css/pignose.calendar.min.css'); ?>">
  <!-- Chartist -->
  <link rel="stylesheet" href="<?= base_url('plugins/chartist/css/chartist.min.css'); ?>">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css'); ?>">
  <!-- Custom Stylesheet -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>">
</head>

<body>
  <!--*******************
        Preloader start
    ********************-->
  <div id="preloader">
    <div class="loader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
      </svg>
    </div>
  </div>
  <!--*******************
        Preloader end
    ********************-->

  <!--**********************************
        Main wrapper start
    ***********************************-->
  <div id="main-wrapper">
    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header">
      <div class="brand-logo">
        <a href="<?= base_url('index.php'); ?>">
          <b class="logo-abbr"><img src="<?= base_url('images/logo.png'); ?>" alt="Logo" /></b>
          <span class="logo-compact"><img src="<?= base_url('images/logo-compact.png'); ?>" alt="Logo Compact" /></span>
          <span class="brand-title">
            <img src="<?= base_url('images/logo-text.png'); ?>" alt="Logo Text" />
          </span>
        </a>
      </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
      <div class="header-content clearfix">
        <div class="nav-control">
          <div class="hamburger">
            <span class="toggle-icon"><i class="icon-menu"></i></span>
          </div>
        </div>
        <div class="header-left"></div>
        <div class="header-right">
          <ul class="clearfix">
            <li class="icons dropdown">
              <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                <span class="activity active"></span>
                <img src="<?= base_url('images/user/logo.png'); ?>" height="40" width="40" alt="User Image" />
              </div>
              <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                <div class="dropdown-content-body">
                  <ul>
                    <li>
                      <!-- <a href= class="btn btn-primary mx-4 mb-3 mt-4">Logout</a> -->
                       <?php if(logged_in()) : ?>
                      <a href="<?= base_url('/logout'); ?>"><i class="icon-key"></i> <span>Logout</span></a>
                      <?php else :  ?>
                        <a href="<?= base_url('/login'); ?>"><i class="icon-key"></i> <span>Login</span></a>
                        <?php endif; ?>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    <div class="nk-sidebar">
      <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
          <li class="nav-label">Dashboard</li>
          <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
              <!-- <a href= class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a> -->
              <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
            </a>
            <ul aria-expanded="false">
              <li><a href="<?= base_url('index.php'); ?>">Home</a></li>
            </ul>
          </li>
          <li class="nav-label">Table</li>
          <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
              <i class="icon-menu menu-icon"></i><span class="nav-text">Table</span>
            </a>
            <ul aria-expanded="false">
              <!-- <li>
                <a href="./table-basic.html" aria-expanded="false">Data Buku</a>
              </li> -->
              <li>
                <a href="/pegawai" aria-expanded="false">Data Pegawai</a>
                <a href="/buku" aria-expanded="false">Data Buku</a>
              </li>
            </ul>
          </li>
          <li class="nav-label">Pages</li>
          <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
              <i class="icon-notebook menu-icon"></i><span class="nav-text">Pages</span>
            </a>
            <ul aria-expanded="false">
              <li><a href="/kelompok">Kelompok 1</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!--**********************************
            Sidebar end
        ***********************************-->

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
      <main role="main" class="flex-shrink-0">
        <?php echo $this->renderSection('content'); ?>
      </main>
      <!-- #/ container -->
    </div>
    <!--**********************************
            Content body end
        ***********************************-->

    <!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
      <div class="copyright">
        <p>
          Copyright & copy;<a href="#">Kelompok 1</a> Designed & Developed by
          <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018
        </p>
      </div>
    </div>
    <!--**********************************
            Footer end
        ***********************************-->
  </div>
  <!--**********************************
        Main wrapper end
    ***********************************-->
  <!--**********************************
        Scripts
    ***********************************-->
  <script src="<?= base_url('plugins/common/common.min.js'); ?>"></script>
  <script src="<?= base_url('js/custom.min.js'); ?>"></script>
  <script src="<?= base_url('js/settings.js'); ?>"></script>
  <script src="<?= base_url('js/gleek.js'); ?>"></script>
  <script src="<?= base_url('js/styleSwitcher.js'); ?>"></script>


  <!-- Chartjs -->
  <script src="<?= base_url('plugins/chart.js/Chart.bundle.min.js'); ?>"></script>
  <!-- Circle progress -->
  <script src="<?= base_url('plugins/circle-progress/circle-progress.min.js'); ?>"></script>
  <!-- Datamap -->
  <script src="<?= base_url('plugins/d3v3/index.js'); ?>"></script>
  <script src="<?= base_url('plugins/topojson/topojson.min.js'); ?>"></script>
  <script src="<?= base_url('plugins/datamaps/datamaps.world.min.js'); ?>"></script>
  <!-- Morrisjs -->
  <script src="<?= base_url('plugins/raphael/raphael.min.js'); ?>"></script>
  <script src="<?= base_url('plugins/morris/morris.min.js'); ?>"></script>

  <!-- Pignose Calender -->
  <script src="<?= base_url('plugins/moment/moment.min.js'); ?>"></script>
  <script src="<?= base_url('plugins/pg-calendar/js/pignose.calendar.min.js'); ?>"></script>
  <!-- ChartistJS -->
  <script src="<?= base_url('plugins/chartist/js/chartist.min.js'); ?>"></script>
  <script src="<?= base_url('plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js'); ?>"></script>

  <script src="<?= base_url('js/dashboard/dashboard-1.js'); ?>"></script>
</body>

</html>