<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Commerce | <?php echo $title ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/bootstrap/css/bootstrap.min.css">
  <link href="<?php echo base_url('asset/') ?>images/<?php echo $identitas_web['favicon'] ?>" rel="icon">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/asset/admin/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/morris/morris.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/daterangepicker/daterangepicker-bs3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link href="<?php echo base_url(); ?>asset/css/bootstrap-combobox.css" media="screen" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/select2/select2.css'); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/icomoon/styles.css'); ?>" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/admin/plugins/'); ?>sweetalert2/dist/sweetalert2.min.css" />
  <script src="<?php echo base_url('asset/admin/plugins/') ?>sweetalert2/dist/sweetalert2.min.js"></script>
  <script>
    var base_url = "<?php echo base_url(); ?>";
  </script>
  <style type="text/css">
    .files {
      position: absolute;
      z-index: 2;
      top: 0;
      left: 0;
      filter: alpha(opacity=0);
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
      opacity: 0;
      background-color: transparent;
      color: transparent;
    }
  </style>
  <script type="text/javascript" src="<?php echo base_url(); ?>/asset/admin/plugins/jQuery/jquery-1.12.3.min.js"></script>
  <script src="<?php echo base_url(''); ?>asset/ckeditor/ckeditor.js"></script>
  <style type="text/css">
    .checkbox-scroll {
      border: 1px solid #ccc;
      width: 100%;
      height: 114px;
      padding-left: 8px;
      overflow-y: scroll;
    }
  </style>
  <script type="text/javascript">
    function nospaces(t) {
      if (t.value.match(/\s/g)) {
        alert('Maaf, Username Tidak Boleh Menggunakan Spasi,..');
        t.value = t.value.replace(/\s/g, '');
      }
    }

    $(document).ready(function() {
      $('#country').change(function() {
        var country_id = $(this).val();
        $.ajax({
          type: "POST",
          url: "<?php echo site_url('auth/state'); ?>",
          data: "count_id=" + country_id,
          success: function(response) {
            $('#state').html(response);
          }
        })
      })

      $('#state').change(function() {
        var state_id = $(this).val();
        $.ajax({
          type: "POST",
          url: "<?php echo site_url('auth/city'); ?>",
          data: "stat_id=" + state_id,
          success: function(response) {
            $('#city').html(response);
          }
        })
      })
    })
  </script>
</head>

<body class="hold-transition sidebar-mini fixed skin-blue">
  <div class="wrapper">
    <header class="main-header">
      <?php include "main-header.php"; ?>
    </header>

    <aside class="main-sidebar">
      <?php include "menu-admin.php"; ?>
    </aside>

    <div class="content-wrapper">
      <section class="content-header">
        <h1> <?php echo $title ?> </h1>
      </section>

      <section class="content">
        <?php echo $contents; ?>
      </section>
      <div style='clear:both'></div>
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <?php include "footer.php"; ?>
    </footer>
  </div><!-- ./wrapper -->
  <!-- jQuery 2.1.4 -->
  <script src="<?php echo base_url(); ?>asset/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="<?php echo base_url(); ?>asset/admin/bootstrap/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="<?php echo base_url(); ?>asset/admin/plugins/morris/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url(); ?>asset/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url(); ?>asset/admin/plugins/knob/jquery.knob.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/admin/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url(); ?>asset/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url(); ?>asset/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url(); ?>asset/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url(); ?>asset/admin/plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>asset/admin/dist/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/js/bootstrap-combobox.js" type="text/javascript"></script>
  <script src="<?php echo base_url('asset/admin/plugins/select2/select2.min.js'); ?>"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.combobox').combobox()
    });
  </script>
  <script>
    $('.datepicker').datepicker();
    $('#rangepicker').daterangepicker();
    $(function() {
      $('.jatuh-tempo').hide();
      $('.select2').select2();
      $("#example1").DataTable();
      $("#example11").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });

      $('#example3').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "info": true,
        "autoWidth": false,
        "pageLength": 10,
        "order": [
          [4, "desc"]
        ]
      });

    });

    /** add active class and stay opened when selected */
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
      return this.href == url;
    }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {
      return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

    $(function() {
      $(".textarea").wysihtml5();
    });

    CKEDITOR.replace('editor1', {
      filebrowserImageBrowseUrl: '<?php echo base_url('asset/kcfinder'); ?>'
    });
  </script>
</body>

</html>