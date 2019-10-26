    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
	<i class="fas"><img src="<?php echo base_url('img/doaLogo.png') ?>" width="52px" /></i>
        </div>
        <div class="sidebar-brand-text mx-3">D.O.A</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Utama
      </div>

      <!-- Nav Pendaftaran Semula - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-archive"></i>
          <span>Rekod Maklumat Am</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('admin/ejen/index'); ?>">Ejen Pendaftar</a>
            <a class="collapse-item" href="<?php echo site_url('admin/syarikat/index'); ?>">Syarikat Pendaftar</a>
            <a class="collapse-item" href="<?php echo site_url('admin/pembekal/index'); ?>">Pembekal</a>
            <a class="collapse-item" href="<?php echo site_url('admin/pengilang/index'); ?>">Pengilang</a>
            <a class="collapse-item" href="<?php echo site_url('admin/perawis/index'); ?>">Perawis Aktif</a> 
	    <a class="collapse-item" href="<?php echo site_url('admin/dagangan/index'); ?>">Produk Dagangan</a>
          </div>
        </div>
      </li>

      <!-- Nav Pendaftaran Semula - Pages Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-address-card"></i>
          <span>Pendaftaran Semula</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('admin/borangA/index'); ?>">Templat Borang A</a>
	    <!-- <a class="collapse-item" href="buttons.html">Tambah Perawis</a> -->
          </div>
        </div>
      </li>

      <!-- Nav Import Permit - Pages Collapse Menu 
      <!-- <li class="nav-item">
      <!--  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
      <!--    <i class="fas fa-fw fa-address-card"></i>
      <!--    <span>Import Permit</span>
      <!--  </a>
      <!--  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
      <!--    <div class="bg-white py-2 collapse-inner rounded">
      <!--      <a class="collapse-item" href="buttons.html">Senarai Permit</a>
      <!--      <!-- <a class="collapse-item" href="buttons.html">Tambah Perawis</a> 
      <!--    </div>
      <!--  </div>
      <!--</li>

      <!-- Nav Sokongan Eskport - Pages Collapse Menu 
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-fw fa-address-card"></i>
          <span>Sokongan Eskport</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="buttons.html">Templat</a>
	     <a class="collapse-item" href="buttons.html">Tambah Perawis</a> 
          </div>
        </div>
      </li>-->
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Utiliti
      </div>


      <!-- Nav Tetapan Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Tetapan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="buttons.html">Pengguna</a>
	    <!-- <a class="collapse-item" href="buttons.html">Tambah Perawis</a> -->
          </div>
        </div>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fab fa-fw fa-leanpub"></i>
          <span>Panduan Pengguna</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
