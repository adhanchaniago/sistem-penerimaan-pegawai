<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php  echo (isset($title)) ? $title : "Sistem KEMKOMINFO"; ?> :: <?php echo $this->session->userdata('ADMIN')->nama ?></title>
  <meta name="description" content="Sistem Informasi Penerimaan Karyawan Kemkominfo Provinsi Bangka Belitung" />
  <meta property="og:url" content="<?php echo base_url() ?>" />
  <meta property="og:site_name" content="KOMINFO" />
  <meta property="og:title" content="Sistem Informasi Penerimaan karyawan" />
  <meta property="og:description" content="Sistem Informasi Penerimaan karyawan" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url("assets/Kominfo/css/z-style.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/public/bootstrap/css/bootstrap.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/public/font-awesome/css/font-awesome.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/public/ionicons/css/ionicons.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/public/plugins/select2/select2.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/public/dist/css/AdminLTE.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/public/dist/css/skins/skin-sakip.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/Kominfo/css/style-admin.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/public/dist/css/animate.css"); ?>">  
  <link  rel="stylesheet" href="<?php echo base_url("assets/public/dist/css/hover-min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/public/plugins/bootstrap-checkbox/awesome-bootstrap-checkbox.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/public/plugins/datepicker/datepicker3.min.css"); ?>">
<style type="text/css">.color{background-color: #A1A1A1;}</style>
<link rel="stylesheet" href="<?php echo base_url("assets/public/plugins/datatables/dataTables.bootstrap.css"); ?>">
 
  <link rel="stylesheet" href="<?php echo base_url("assets/public/summernote/summernote.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/Kominfo/css/form-wizard.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/public/plugins/autocomplete/tautocomplete.css?v=".md5(date('YmdHis'))); ?>">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/public/image/kominfo.png') ?>"/>



  <script src="<?php echo base_url("assets/public/plugins/jQuery/jquery-2.2.3.min.js"); ?>"></script> 
  <script src="<?php echo base_url("assets/public/bootstrap/js/bootstrap.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/plugins/slimScroll/jquery.slimscroll.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/plugins/fastclick/fastclick.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/dist/js/jquery.sticky.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/dist/js/app.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/dist/js/jquery.tableCheckbox.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/dist/js/jquery.printPage.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/plugins/bnotify/bootstrap-notify.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/dist/js/jquery.timeago.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/dist/js/moment.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/plugins/datepicker/bootstrap-datepicker.min.js"); ?>"></script>

  <script src="<?php echo base_url("assets/public/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/plugins/datatables/dataTables.bootstrap.min.js"); ?>"></script>
  

  <script src="<?php echo base_url("assets/public/summernote/summernote.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/plugins/mask-money/jquery.maskMoney.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/plugins/bnotify/bootstrap-notify.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/plugins/heightchart/highcharts.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/plugins/heightchart/modules/exporting.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/plugins/heightchart/modules/data.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/plugins/heightchart/modules/drilldown.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/plugins/autocomplete/tautocomplete.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/plugins/select2/select2.full.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/public/app/form-wizard.js"); ?>"></script>

  <script type="text/javascript"> 
      var base_url   = '<?php echo site_url(); ?>';
      var base_path  = '<?php echo base_url('assets/public'); ?>';
      var current_url = '<?php echo current_url(); ?>';
  </script>
  <script>
    
  $(function () {
    $('.select2').select2()
   
    $('#datepicker1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    })
  })
  
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

</script>  
</head>
<?php
/* End of file header.php */
/* Location: ./application/views/template/header.php */