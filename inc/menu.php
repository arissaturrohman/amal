<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="index.php" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>

    <?php

    $level = $_SESSION['level'] == 'User';
    if ($level) {

     ?>

     <li class="nav-item">
       <a href="?page=masuk" class="nav-link">
         <i class="nav-icon fas fa-folder-open"></i>
         <p>
           Surat Masuk
         </p>
       </a>
     </li>
     <li class="nav-item">
       <a href="?page=keluar" class="nav-link">
         <i class="nav-icon fa fa-paper-plane"></i>
         <p>
           Surat Keluar
         </p>
       </a>
     </li>
     <li class="nav-item">
       <a href="?page=klasifikasi" class="nav-link">
         <i class="nav-icon fa fa-list-alt"></i>
         <p>
           Klasifikasi
         </p>
       </a>
     </li>

  <?php } else { ?>

    <li class="nav-item">
      <a href="?page=masuk" class="nav-link">
        <i class="nav-icon fas fa-folder-open"></i>
        <p>
          Surat Masuk
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="?page=keluar" class="nav-link">
        <i class="nav-icon fa fa-paper-plane"></i>
        <p>
          Surat Keluar
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="?page=klasifikasi" class="nav-link">
        <i class="nav-icon fa fa-list-alt"></i>
        <p>
          Klasifikasi
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="?page=pengaturan" class="nav-link">
        <i class=" nav-icon fa fa-cogs"></i>
        <p>
          Pengaturan
        </p>
      </a>
    </li>

  <?php } ?>

  <li class="nav-item">
      <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-sm">
        <i class="nav-icon fa fa-reply-all"></i>
        <p>
          Logout
        </p>
      </a>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
