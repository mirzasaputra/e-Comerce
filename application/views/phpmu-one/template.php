<?php
$iden = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="phpmu.com">
  <meta name="description" content="<?php echo $iden['meta_deskripsi']; ?>">
  <meta name="keywords" content="<?php echo $iden['meta_keyword']; ?>">
  <meta name="robots" content="all,index,follow">
  <meta http-equiv="Content-Language" content="id-ID">
  <meta NAME="Distribution" CONTENT="Global">
  <meta NAME="Rating" CONTENT="General">
  <link rel="canonical" href="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
  <meta property="og:locale" content="id_ID" />
  <meta property="og:title" content="<?php echo $title; ?>" />
  <meta property="og:description" content="<?php echo $iden['meta_deskripsi']; ?>" />
  <meta property="og:url" content="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
  <meta property="og:site_name" content="<?php echo $iden['nama_website']; ?>" />
  <?php $identitas_web = $this->db->get('identitas')->row_array() ?>
  <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>asset/images/<?php echo $identitas_web['favicon'] ?>" />
  <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>asset/css/default.css" rel="stylesheet" media="screen" />
  <link href="<?php echo base_url(); ?>asset/css/nivo-slider.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>/asset/admin/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/timepicker/bootstrap-timepicker.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>/asset/admin/plugins/jQuery/jquery-1.12.3.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/select2/select2.css'); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset/admin/plugins/icomoon/styles.css'); ?>" type="text/css" />
  <script type="text/javascript">
    function nospaces(t) {
      if (t.value.match(/\s/g)) {
        alert('Maaf, Username Tidak Boleh Menggunakan Spasi,..');
        t.value = t.value.replace(/\s/g, '');
      }
    }

    function toDuit(number) {
      var number = number.toString(),
        duit = number.split('.')[0],
        duit = duit.split('').reverse().join('')
        .replace(/(\d{3}(?!$))/g, '$1,')
        .split('').reverse().join('');
      return 'Rp ' + duit;
    }
  </script>
</head>

<body>
  <nav class="navbar navbar-default" style='border-radius:0px;'>
    <?php include "main-menu.php"; ?>
  </nav>

  <div class="container container-content">
    <div class='row'>
      <?php
      if ($this->uri->segment(1) == '' or $this->uri->segment(1) == 'main') {
        echo "<div class='col-md-3 hidden-xs'>";
        $kategori = $this->Model_app->view('rb_kategori_produk');
        foreach ($kategori->result_array() as $row) {
          echo "<a style='text-align:left' class='btn btn-sm btn-block btn-primary' href='" . base_url() . "produk/kategori/$row[kategori_seo]'><span class='glyphicon glyphicon-record'></span> $row[nama_kategori]</a>";
        }

        echo "</div>
      <div class='col-md-9'>";
        include "slide.php";
        echo "</div>";
      }

      if ($this->uri->segment(1) != '' and $this->uri->segment(1) != 'produk' or $this->uri->segment(2) == 'keranjang' or $this->uri->segment(2) == 'checkouts') {
        echo "<div class='col-md-8'>";
      } else {
        echo "<div class='col-md-12'>";
      }
      echo $contents;
      echo "</div>";

      if ($this->uri->segment(1) != '' and $this->uri->segment(1) != 'produk' or $this->uri->segment(2) == 'keranjang' or $this->uri->segment(2) == 'checkouts') {
        echo "<div class='col-md-4'>
        <div class='col-md-12 box-sidebar'>";
        include "sidebar.php";
        echo "</div>
      </div>";
      }
      ?>
    </div>
  </div> <!-- /container -->
  <div style="clear:both"></div>
  <footer style='background:#e3e3e3; border-top:1px solid #cecece'>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <center>
            <small class='text-footer'>Copyright (c) 2019 - <b><?php echo $iden['nama_website']; ?></b>, Develop by Rendra Triyanto <br>
              <?php echo $iden['alamat']; ?> - <?php echo $iden['no_telp']; ?></small>
          </center>
          </p>
        </div>
      </div>
    </div>
  </footer>

  <div class="modal fade" id="uploadfoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h5 class="modal-title" id="myModalLabel">Ganti Foto Profile anda?</h5>
        </div>
        <center>
          <div class="modal-body">
            <?php
            $attributes = array('class' => 'form-horizontal', 'role' => 'form');
            echo form_open_multipart('members/foto', $attributes); ?>

            <div class="form-group">
              <center style='color:#8a8a8a'>Recomended (200 Kb atau 600 x 600) </center><br>
              <label for="inputEmail3" class="col-sm-3 control-label">Pilih Foto</label>
              <div style='background:#fff;' class="input-group col-sm-7">
                <span class="input-group-addon"><i class='fa fa-image fa-fw'></i></span>
                <input style='text-transform:lowercase;' type="file" class="form-control" name="userfile">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-1">
                <button type="submit" name='submit' class="btn btn-primary">Update Foto</button>
              </div>
            </div>

            </form>
            <div style='clear:both'></div>
          </div>
        </center>
      </div>
    </div>
  </div>

  <div class="modal fade" id="uploadfotoreseller" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h5 class="modal-title" id="myModalLabel">Ganti Foto Profile anda?</h5>
        </div>
        <center>
          <div class="modal-body">
            <?php
            $attributes = array('class' => 'form-horizontal', 'role' => 'form');
            echo form_open_multipart('reseller/foto', $attributes); ?>

            <div class="form-group">
              <center style='color:#8a8a8a'>Recomended (200 Kb atau 600 x 600) </center><br>
              <label for="inputEmail3" class="col-sm-3 control-label">Pilih Foto</label>
              <div style='background:#fff;' class="input-group col-sm-7">
                <span class="input-group-addon"><i class='fa fa-image fa-fw'></i></span>
                <input style='text-transform:lowercase;' type="file" class="form-control" name="userfile">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-1">
                <button type="submit" name='submit' class="btn btn-primary">Update Foto</button>
              </div>
            </div>

            </form>
            <div style='clear:both'></div>
          </div>
        </center>
      </div>
    </div>
  </div>

  <?php $this->Model_main->kunjungan(); ?>

  <!-- Bootstrap core JavaScript
================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url(); ?>asset/js/jquery-1.12.3.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/js/jquery.nivo.slider.js"></script>
  <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url('asset/admin/plugins/select2/select2.min.js'); ?>"></script>
  <script type="text/javascript">
    $(window).load(function() {
      $('#slider').nivoSlider();
    });
  </script>
  <script src="<?php echo base_url() ?>asset/js/jquery.validate.js"></script>
  <script>
    $(document).ready(function() {
      $("#formku").validate();
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#formkuu").validate();
    });
  </script>
  <script src="<?php echo base_url(); ?>asset/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url(); ?>asset/admin/plugins/timepicker/bootstrap-timepicker.js"></script>
  <script type="text/javascript">
    $('.datepicker').datepicker();
    $('.timepicker').timepicker()
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      /// make loader hidden in start
      $('#loading').hide();
      $('#username').blur(function() {
        var username_val = $("#username").val();
        // show loader
        $('#loading').show();
        $.post("<?php echo site_url() ?>members/username_check", {
          a: username_val
        }, function(response) {
          $('#loading').hide();
          $('#messageusername').html('').html(response.messageusername).show();
        });
        return false;
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      /// make loader hidden in start
      $('#loading').hide();
      $('#sponsor').blur(function() {
        var sponsor_val = $("#sponsor").val();
        // show loader
        $('#loading').show();
        $.post("<?php echo site_url() ?>members/sponsor_check", {
          sps: sponsor_val
        }, function(response) {
          $('#loading').hide();
          $('#messagesponsor').html('').html(response.messagesponsor).show();
        });
        return false;
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      /// make loader hidden in start
      $('#loading').hide();
      $('#presenter').blur(function() {
        var presenter_val = $("#presenter").val();
        // show loader
        $('#loading').show();
        $.post("<?php echo site_url() ?>members/presenter_check", {
          psr: presenter_val
        }, function(response) {
          $('#loading').hide();
          $('#messagepresenter').html('').html(response.messagepresenter).show();
        });
        return false;
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      /// make loader hidden in start
      $('#loading').hide();
      $('#kodeaktivasi').blur(function() {
        var kodeaktivasi_val = $("#kodeaktivasi").val();
        // show loader
        $('#loading').show();
        $.post("<?php echo site_url() ?>members/paket_check", {
          kode: kodeaktivasi_val
        }, function(response) {
          $('#loading').hide();
          $('#messagekode').html('').html(response.messagekode).show();
        });
        return false;
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      /// make loader hidden in start
      $('#loading').hide();
      $('#email').blur(function() {
        var email_val = $("#email").val();
        var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
        if (filter.test(email_val)) {
          // show loader
          $('#loading').show();
          $.post("<?php echo site_url() ?>members/email_check", {
            d: email_val
          }, function(response) {
            $('#loading').hide();
            $('#message').html('').html(response.message).show();
          });
          return false;
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      /// make loader hidden in start
      $('#loading').hide();
      $('#ktp').blur(function() {
        var ktp_val = $("#ktp").val();
        // show loader
        $('#loading').show();
        $.post("<?php echo site_url() ?>members/ktp_check", {
          g: ktp_val
        }, function(response) {
          $('#loading').hide();
          $('#messagektp').html('').html(response.messagektp).show();
        });
        return false;
      });
    });

    $(function() {
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
  </script>
  <?php include "modal.php"; ?>
</body>

</html>