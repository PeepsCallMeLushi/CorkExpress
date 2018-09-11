<?php
require_once 'functions/functions.php';
session_start();
validacao();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>コークエクスプレス  ●  Welcome!</title>
    <?php include 'connections/conn.php'; ?>
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
      <!-- HEADER MOBILE-->
      <header class="header-mobile d-block d-lg-none">
          <div class="header-mobile__bar">
              <div class="container-fluid">
                  <div class="header-mobile-inner">
                      <a class="logo" href="index.html">
                          <img src="images/icon/placeholder2.png" alt="CoolAdmin" />
                      </a>
                      <button class="hamburger hamburger--slider" type="button">
                          <span class="hamburger-box">
                              <span class="hamburger-inner"></span>
                          </span>
                      </button>
                  </div>
              </div>
          </div>
          <nav class="navbar-mobile">
              <div class="container-fluid">
                  <ul class="navbar-mobile__list list-unstyled">
                    <li>
                          <a class="js-arrow" href="#">
                              <i class="fas fa-copy"></i>Informações Pessoais</a>
                              <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                  <li>
                                      <a href="platform.php">Perfil</a>
                                  </li>
                                  <li>
                                      <a href="?an=9">Recibos</a>
                                  </li>
                                </ul>
                      </li>
                      <?php
                        if($_SESSION["departamento"]=='1'){
                          echo'
                          <li>
                              <a class="js-arrow" href="#">
                                  <i class="fas fa-copy"></i>Gestão de users</a>
                                  <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                      <li>
                                          <a href="?an=1">Criação de utilizadores</a>
                                      </li>
                                      <li>
                                          <a href="?an=2">Listagem de utilizadores</a>
                                      </li>
                                    </ul>
                          </li>
                          <li>
                              <a href="?an=4">
                                  <i class="fas fa-table"></i>Categorias Profissionais</a>
                          </li>
                          <li>
                              <a class="js-arrow" href="#">
                                  <i class="fas fa-calendar-alt"></i>Faturação</a>
                                  <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="?an=7">Emitir Recibo</a>
                                        </li>
                                        <li>
                                      <a href="?an=11">Listagem de Recibos</a>
                                  </li>
                                    </ul>
                          </li>';
                        }
                       ?>
                  </ul>
              </div>
          </nav>
      </header>
      <!-- END HEADER MOBILE-->
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/placeholder2.png" alt="A imagem não funciona" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Informações Pessoais</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="platform.php">Perfil</a>
                                    </li>
                                    <li>
                                        <a href="?an=9">Recibos</a>
                                    </li>
                                  </ul>
                        </li>
                        <?php
                          if($_SESSION["departamento"]=='1'){
                            echo'
                            <li>
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Gestão de users</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        <li>
                                            <a href="?an=1">Criação de utilizadores</a>
                                        </li>
                                        <li>
                                            <a href="?an=2">Listagem de utilizadores</a>
                                        </li>
                                      </ul>
                            </li>
                            <li>
                                <a href="?an=4">
                                    <i class="fas fa-table"></i>Categorias Profissionais</a>
                            </li>
                            <li>
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-calendar-alt"></i>Faturação</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        <li>
                                            <a href="?an=7">Emitir Recibo</a>
                                        </li>
                                        <li>
                                            <a href="?an=11">Listagem de Recibos</a>
                                        </li>
                                      </ul>
                            </li>';
                          }
                         ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['nome']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['nome']; ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $_SESSION['email']; ?></span>
                                                </div>

                                            <div class="account-dropdown__footer">
                                                <?php echo '<a href="connections/close.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>'?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
              <?php
              @$an = $_REQUEST["an"];
              switch ($an) {
                case '1':
                  // code...
                  include 'fragments\newuser.php';
                  break;
                case '2':
                    // code...
                  include 'fragments\userlist.php';
                  break;
                  case '3':
                    // code...
                    include 'fragments\edituser.php';
                    break;
                    case '4':
                      // code...
                      include 'fragments\catprofs.php';
                      break;
                      case '5':
                        // code...
                        include 'fragments\catprofsedit.php';
                        break;
                        case '6':
                          // code...
                          include 'fragments\profileedit.php';
                          break;
                          case '7':
                            // code...
                            include 'fragments\userlistFat.php';
                            break;
                            case '8':
                              // code...
                              include 'fragments\faturas.php';
                              break;
                              case '9':
                                // code...
                                include 'fragments\faturaslist.php';
                                break;
                                case '10':
                                  // code...
                                  include 'fragments\faturasSingular.php';
                                  break;
                                  case '11':
                                    // code...
                                    include 'fragments\faturaslistempresa.php';
                                    break;
                default:
                  // code...
                  include 'fragments\profile.php';
                  break;
              }
               ?>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
</body>

</html>
<!-- end document-->
