<div class="row">
    <div class="col-md-3">
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Pelamar </span>
                <span class="info-box-number"><?php echo $this->db->count_all('tbl_pelamar'); ?> <small>calon Pelamar</small></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <?php if ($this->muniversal->get_account_by_login($this->session->userdata('ID'))->level == 'Admin') : ?>
                <a href="<?php echo base_url('pelamar') ?>"><span style="color:#FFFFFF; ">Selanjutnya...</span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-child"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Penerima </span>
                <span class="info-box-number">50 <small>penerima</small></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span>Selanjutnya...</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-hourglass-end"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Proses Penilaian </span>
                <span class="info-box-number"><?php echo $this->db->count_all('notifikasi'); ?> <small>Proses</small></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span>Selanjutnya...</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="glyphicon glyphicon-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Pengguna Sistem</span>
                <span class="info-box-number"><?php echo $this->db->count_all('users'); ?> <small>Orang</small></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                 <?php if ($this->muniversal->get_account_by_login($this->session->userdata('ID'))->level == 'Admin') : ?>
                <a href="<?php echo base_url('pengguna') ?>"><span style="color:#FFFFFF; ">Selanjutnya...</span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
     
</div>

   