<?php 
$session = session();
$nama = $session->get('nama');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>App Nurul Huda</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('niceAdmin/vendorNiceAdmin/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('niceAdmin/vendorNiceAdmin/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('niceAdmin/vendorNiceAdmin/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('niceAdmin/vendorNiceAdmin/quill/quill.snow.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('niceAdmin/vendorNiceAdmin/quill/quill.bubble.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('niceAdmin/vendorNiceAdmin/remixicon/remixicon.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('niceAdmin/vendorNiceAdmin/simple-datatables/style.css'); ?>" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="<?php echo base_url('niceAdmin/css/style.css'); ?>">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?php echo base_url(''); ?>" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <span class="d-none d-lg-block">En Ha</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar" hidden>
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown" hidden>

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown" hidden>

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <!-- <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle"> -->
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <!-- <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle"> -->
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <!-- <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle"> -->
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $nama;?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header" hidden>
              <h6>Kevin Anderson</h6>
              <span hidden>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li hidden>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li hidden>
              <hr class="dropdown-divider">
            </li>

            <li hidden>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li hidden>
              <hr class="dropdown-divider">
            </li>

            <li hidden>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li hidden>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('auth/logout'); ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url(''); ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item" hidden>
        <a class="nav-link collapsed" href="nilai_santri">
          <i class="bi bi-grid"></i>
          <span>nilai_santri</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('santri'); ?>">
          <i class="bi bi-grid"></i>
          <span>Santri</span>
        </a>
      </li>

      <li class="nav-item" hidden>
        <a class="nav-link collapsed" data-bs-target="#nilai" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Nilai</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="nilai" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('nilai_akhlaq_santri'); ?>">
              <i class="bi bi-circle"></i><span>Nilai Akhlaq Santri</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('nilai_santri'); ?>">
              <i class="bi bi-circle"></i><span>Nilai santri</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item" hidden>
        <a class="nav-link collapsed" data-bs-target="#mapel" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Mata Pelajaran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="mapel" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('mapel_tipe'); ?>">
              <i class="bi bi-circle"></i><span>Tipe Mapel</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('mapel_kategori'); ?>">
              <i class="bi bi-circle"></i><span>Kategori Mapel</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('mapel'); ?>">
              <i class="bi bi-circle"></i><span>Data Mapel</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('mapel_kelas'); ?>">
              <i class="bi bi-circle"></i><span>Mapel Per Kelas</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#administrasi" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Administrasi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="administrasi" class="nav-content collapse " data-bs-parent="#administrasi">
          <li>
            <a href="<?php echo base_url('tingkat'); ?>">
              <i class="bi bi-circle"></i><span>Tingkat</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('tahun_ajaran'); ?>">
              <i class="bi bi-circle"></i><span>Tahun Ajaran</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('semester'); ?>">
              <i class="bi bi-circle"></i><span>Semester</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('kelas'); ?>">
              <i class="bi bi-circle"></i><span>Kelas</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('siswa_kelas'); ?>">
              <i class="bi bi-circle"></i><span>Santri kelas</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Tagihan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('tagihan'); ?>">
              <i class="bi bi-circle"></i><span>Tagihan Master</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('tagihanPeriode'); ?>">
              <i class="bi bi-circle"></i><span>Tagihan Periode</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('tagihanDetail/index2'); ?>">
              <i class="bi bi-circle"></i><span>Tagihan Detail</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('tagihan/rekapbulan')."/".date("Y"); ?>">
              <i class="bi bi-circle"></i><span>Rekap Per Bulan</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('tagihan/rekapsantri'); ?>">
              <i class="bi bi-circle"></i><span>Rekap Per Santri</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <?= $this->renderSection('content') ?>
  </main><!-- End #main -->

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Rifki Ahmad Sururi</span></strong>.
    </div>
    <div class="credits">
    </div>
  </footer>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="<?php echo base_url('niceAdmin/vendorNiceAdmin/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?php echo base_url('niceAdmin/vendorNiceAdmin/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?php echo base_url('niceAdmin/vendorNiceAdmin/chart.js/chart.min.js') ?>"></script>
  <script src="<?php echo base_url('niceAdmin/vendorNiceAdmin/echarts/echarts.min.js'); ?>"></script>
  <script src="<?php echo base_url('niceAdmin/vendorNiceAdmin/quill/quill.min.js') ?>"></script>
  <script src="<?php echo base_url('niceAdmin/vendorNiceAdmin/simple-datatables/simple-datatables.js'); ?>"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script src="<?php echo base_url('niceAdmin/vendorNiceAdmin/tinymce/tinymce.min.js'); ?>"></script>
  <script src="<?php echo base_url('niceAdmin/vendorNiceAdmin/php-email-form/validate.js'); ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('niceAdmin/js/main.js?y=') . date("Yhis"); ?>"></script>

  <?= $this->renderSection('js') ?>

</body>

</html>