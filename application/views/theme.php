<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Pakar Diagnosa Kerusakan Printer</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url("theme/"); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url("theme/"); ?>/css/sb-admin-2.css" rel="stylesheet">


<!-- additional component --> 
<link href="<?php echo base_url(); ?>/theme/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>/theme/vendor/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>/theme/vendor/sweetalert2/sweetalert2.css" rel="stylesheet" />





  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url("theme/"); ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url("theme/"); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url("theme/"); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url("theme/"); ?>/js/sb-admin-2.min.js"></script>


<!--Select2 js -->
<script src="<?php echo base_url(); ?>/theme/vendor/select2/select2.full.min.js"></script>


<!-- Data tables -->
<script src="<?php echo base_url(); ?>/theme/vendor/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>/theme/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>/theme/vendor/sweetalert2/sweetalert2.js"></script>

<script src="<?php echo base_url(); ?>/theme/vendor/jqueryform/jquery.form.min.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SISTEM PAKAR PRINTER</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      

      <li class="nav-item">
                <a class="nav-link <?php echo ($this->controller=="home")?"active":""; ?>" href="<?php echo site_url("home"); ?>">
                  <i class="fa fa-home"></i>
                  <span>DASHBOARD</span>
                </a>
      </li>

<?php if($_SESSION['userdata'][0]['level'] == 1 ) : ?>  
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>DATA MASTER</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            
           
            <a class="collapse-item"  href="<?php echo site_url("gejala") ?>">GEJALA </a>
<a class="collapse-item" href="<?php echo site_url("kerusakan") ?>">KERUSAKAN </a>
<a class="collapse-item" href="<?php echo site_url("kerusakan/pengetahuan") ?>">PENGETAHUAN </a>
<a class="collapse-item" href="<?php echo site_url("referensi") ?>">REFERENSI </a>
<!-- <a class="collapse-item" href="<?php echo site_url("kemiripan") ?>">KEMIRIPAN GEJALA </a> -->
          </div>
        </div>
      </li>



      <li class="nav-item">
                <a class="nav-link  <?php echo ($this->controller=="konsumen")?"active":""; ?>" href="<?php echo site_url("konsumen"); ?>">
                  <i class="fa fa-user"></i>
                  <span>DATA KONSUMEN</span>
                </a>
              </li>
             <li class="nav-item">
                <a class="nav-link <?php echo ($this->controller=="laporan")?"active":""; ?>" href="<?php echo site_url("konsultasi/rekap"); ?>">
                  <i class="fa fa-file"></i>
                  <span>LAPORAN REKAPITULASI</span>
                </a>
              </li>   
<?php endif; ?> 
      <li class="nav-item">
                <a class="nav-link <?php echo ($this->controller=="konsultasi")?"active":""; ?>" href="<?php echo site_url("konsultasi"); ?>">
                  <i class="fa fa-star"></i>
                  <span>KONSULTASI</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?php echo ($this->controller=="konsultasi/listview")?"active":""; ?>" href="<?php echo site_url("konsultasi/listview"); ?>">
                  <i class="fa fa-window-restore"></i>
                  <span>LIHAT DATA KONSULTASI</span>
                </a>
              </li>


     

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
           

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
             
            <!-- Nav Item - Alerts -->
             

            <!-- Nav Item - Messages -->
             

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['userdata'][0]['nama']; ?></span>
                <img class="img-profile rounded-circle" src="">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ganti Password
                </a>
                 
                <a class="dropdown-item" href="<?php echo site_url("login/logout"); ?>"  >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> -->

<div class="card">
  <div class="bg-primary card-header">
    <h4 class="text-white"><?php echo $title; ?> </h4>
  </div>
  <div class="card-body">
    <!-- <h5 class="card-title">Special title treatment</h5> -->
    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a> -->
    <?php echo $content; ?>
  </div>
</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy; 2019. Cindy  - USTJ Jayapura </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
   

  
</body>

</html>
