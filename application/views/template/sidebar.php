<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('upload/images/users')?>/<?= $this->session->userdata('avatar') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?=$this->session->userdata('username')?></p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li>
              <a href="<?php echo site_url('dashboard2') ?>">
                <i class="fa fa-home"></i> <span>Beranda</span>
              </a>
            </li>
            <?php if($this->session->userdata('group_id')=='1' ){ ?> 
            <li>
              <a href="<?php echo site_url('monitoring') ?>">
              <i class="fa fa-upload"></i> <span>Monitoring</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('tim') ?>">
                <i class="fa fa-home"></i> <span>Kelola Tim</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('laporantim') ?>">
                <i class="fa fa-home"></i> <span>Laporan</span>
              </a>
            </li>
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">