<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="hid-menu">
      	Menu
      </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo app_base.'home' ?>">Home</a></li>
        <?php
        if($_SESSION['level_user'] == 'admin'){
        ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Surat Masuk <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo app_base.'create_suratmasuk' ?>">Buat Baru</a></li>
            <li><a href="<?php echo app_base.'index_suratmasuk' ?>">Agenda Surat Masuk</a></li>
          </ul>
        </li>
        <li><a href="<?php echo app_base.'index_suratkeluar' ?>">Surat Keluar</a></li>
        <li><a href="<?php echo app_base.'laporan ' ?>">Laporan</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Master <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo app_base.'index_master_penerima' ?>">Data Penerima</a></li>
            <li><a href="<?php echo app_base.'index_master_user' ?>">Data User</a></li>
          </ul>
        </li>
        <?php
        } 
        if($_SESSION['level_user'] == 'kalan'){
        ?>
        <li><a href="<?php echo app_base.'index_disposisi' ?>">Disposisi</a></li>
        <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrator <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php
            if($_SESSION['level_user'] == 'kalan'){
            ?>
            <li><a href="<?php echo app_base.'paraf' ?>">Paraf</a></li>
            <?php
            }
            ?>
            <li><a href="#">Ubah Password</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo app_base.'logout' ?>">Keluar</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav> 