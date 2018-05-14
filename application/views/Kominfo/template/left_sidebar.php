<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php if ($this->muniversal->get_account_by_login($this->session->userdata('ID'))->photo == NULL): ?>
        <img src="<?php echo base_url('assets/public/image/avatar.jpg') ?>" class="img-circle" alt="<?php echo strtoupper($this->muniversal->get_account_by_login($this->session->userdata('ID'))->nama) ?>">
        <?php else: ?>
        <img src="<?php echo base_url('assets/public/image/'.$this->muniversal->get_account_by_login($this->session->userdata('ID'))->photo) ?>" class="img-circle" alt="<?php echo strtoupper($this->muniversal->get_account_by_login($this->session->userdata('ID'))->nama) ?>">
        <?php endif ?>
        
      </div>
      <div class="pull-left info">
        <p><?php echo strtoupper($this->muniversal->get_account_by_login($this->session->userdata('ID'))->nama) ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $this->muniversal->get_account_by_login($this->session->userdata('ID'))->level; ?> </a>
      </div>
      <div style="margin-bottom: 40px;"></div>
    </div>

    <?php if ($this->muniversal->get_account_by_login($this->session->userdata('ID'))->level == 'Admin') : ?>
    <ul class="sidebar-menu">
      <li class="<?php echo active_link_method('index','home'); ?>">
        <a href="<?php  echo site_url('home') ?>">
          <i class="fa fa-home"></i> <span>Home</span>
        </a>
      </li>

      <li class="<?php echo active_link_method('index','panduan').active_link_method('create','panduan').active_link_method('update','panduan') ?>">
        <a href="<?php  echo site_url('panduan') ?>">
          <i class="fa fa-book"></i> <span>Panduan Sistem</span>
        </a>
      </li>

      
      <li class="<?php echo active_link_method('index','pelamar').active_link_method('update','pelamar') ?>">
        <a href="<?php  echo site_url('pelamar') ?>">
          <i class="fa fa-user"></i> <span>Data Pelamar</span>
        </a>
      </li>

      <li class="<?php echo active_link_method('create','pelamar'); ?>">
        <a href="<?php  echo site_url('pelamar/create') ?>">
          <i class="fa fa-user"></i> <span>Input Data Pelamar</span>
        </a>
      </li>

      <li class="treeview <?php echo active_link_multiple(array('bobot','kriteria','sub_kriteria')); ?>">
        <a href="#">
          <i class="fa fa-wrench"></i> <span> Master Penilaian</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo active_link_controller('index','bobot').active_link_controller('bobot','create').active_link_controller('bobot','update') ?>">
            <a href="<?php echo site_url('bobot') ?>"><i class="fa fa-angle-double-right"></i> Bobot Gap</a>
          </li>

          <li class="<?php echo active_link_controller('kriteria') ?>">
            <a href="<?php echo site_url('kriteria') ?>"><i class="fa fa-angle-double-right"></i>Kriteria</a>
          </li>

          <li class="<?php echo active_link_controller('sub_kriteria') ?>">
            <a href="<?php echo site_url('sub_kriteria') ?>"><i class="fa fa-angle-double-right"></i> Sub_Kriteria</a>
          </li>
<!--           <li class="">
            <a href=""><i class="fa fa-angle-double-right"></i>Nilai Standar Prusahaan</a>
          </li> -->
          <li class="">
            <a href=""><i class="fa fa-angle-double-right"></i> Analisa</a>
          </li>
          <li class="">
            <a href=""><i class="fa fa-angle-double-right"></i> Hasil</a>
          </li>
        </ul>
      </li>

      <li class="#">
        <a href="#">
          <i class="fa fa-home"></i> <span>Pengumuman</span>
        </a>
      </li>
      <li class="treeview <?php echo active_link_multiple(array('account','pengguna')); ?>">
        <a href="#">
          <i class="fa fa-wrench"></i> <span> Pengaturan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo active_link_controller('pengguna') ?>">
            <a href="<?php echo site_url('pengguna') ?>"><i class="fa fa-angle-double-right"></i> Pengguna Sistem</a>
          </li>
          <li class="<?php echo active_link_controller('account') ?>">
            <a href="<?php echo site_url('account') ?>"><i class="fa fa-angle-double-right"></i> Akun</a>
          </li>
        </ul>
      </li>
    </ul>
    <?php endif; ?>

    <?php if ($this->muniversal->get_account_by_login($this->session->userdata('ID'))->level == 'Username') : ?>
    <ul class="sidebar-menu">
      <li class="<?php echo active_link_method('index','home'); ?>">
        <a href="<?php  echo site_url('home') ?>">
          <i class="fa fa-home"></i> <span>Home</span>
        </a>
      </li>
      <li class="#">
        <a href="#">
          <i class="fa fa-home"></i> <span>Pengumuman</span>
        </a>
      </li>
      <li class="<?php echo active_link_method('index','panduan').active_link_method('create'); ?>">
        <a href="<?php  echo site_url('panduan') ?>">
          <i class="fa fa-book"></i> <span>Panduan Sistem</span>
        </a>
      </li>

    </ul>

    <?php endif; ?>

  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
    <?php
    /**
    * Generated Page Title
    *
    * @return stringsas
    **/
    echo $page_title;
    /**
    * Generate Breadcrumbs from library
    *
    * @var string
    **/
    ?>
  </section>
  <section class="content">
    <?php

    ?>