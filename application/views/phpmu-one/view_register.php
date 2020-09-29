<section class="shop checkout section">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-12 mx-auto">
        <div class="checkout-form">
          <h2 class="text-center"><i class="fa fa-user"></i> Register</h2>
          <br><br>
          <div class="alert alert-danger d-none" id="pesanError"></div>
          <div class="alert alert-success d-none" id="pesanSuccess"></div>
          <!-- Form -->
          <form class="form" id="login" method="post" action="<?php echo base_url('auth/register') ?>">
            <div class="form-group">
                <input type="text" name="nama" placeholder="Nama Lengkap" required autofocus>
                <input type="hidden" name="submit">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>                
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group" style="margin-top: 30px;">
                <div class="single-widget get-button p-0 w-100">
                    <div class="content w-100">
                      <div class="button w-100">
                        <button type="submit" id="btn-submit" class="btn w-100">Register</button>
                      </div>
                    </div>
                  </div>
                </div>
                <center><span>Sudah punya akun? <a class="text-primary" href="<?=base_url();?>auth/register">Login</a></span></center>
          </form>
          <!--/ End Form -->
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ End Checkout -->

<script>  
$(document).ready(function(){
    $('#login').submit(function(e){
        e.preventDefault();
        $('#btn-submit').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
        $('#btn-submit').addClass('disabled');
        $('#pesanError').addClass('d-none');
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(data){
                if(data.hasil == true){
                    $('#btn-submit').removeClass('disabled');
                    $('#btn-submit').html('Register');
                    $('#pesanSuccess').html(data.pesan);
                    $('#pesanSuccess').removeClass('d-none');
                    window.location.assign('<?=base_url();?>members/profile/');
                } else {
                    $('#btn-submit').removeClass('disabled');
                    $('#btn-submit').html('Register');
                    $('#pesanError').html(data.pesan);
                    $('#pesanError').removeClass('d-none');
                }
            }
        })
    })
})
</script>


<?php
echo "<p class='sidebar-title'> Pendaftaran Members</p>
<div class='alert alert-info'><b>PENTING!</b> - Contact information </div>
<br>";
$attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
echo form_open_multipart('auth/register',$attributes); 
  echo "<div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>Nama Lengkap</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-12'>
                <input type='text' class='required form-control' name='c'>
            </div>
            </div>
        </div>

        <div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>No Telpon/Hp</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-6'>
                <input type='number' class='required number form-control' name='j'  minlength='10'>
            </div>
            </div>
        </div>

        <div class='form-group'>
            <label for='inputPassword3' class='col-sm-3 control-label'>Alamat</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-lg-12'>
                <input type='text' class='required form-control' name='e'>
            </div></div>
        </div>

        <div class='form-group'>
            <label for='inputPassword3' class='col-sm-3 control-label'>Kota</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-lg-12'>
                <select class='form-control select2' name='h' required>
                    <option value=''>- Pilih -</option>";
                    foreach ($kota as $rows) {
                        echo "<option value='$rows[kota_id]'>$rows[nama_kota]</option>";
                    }
                echo "</select>
            </div></div>
        </div>

        <div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>Email</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-12'>
                <input type='email' class='required email form-control' name='d'>
            </div>
            </div>
        </div>

        <div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>Username</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-6'>
                <input type='text' class='required form-control' name='a' onkeyup=\"nospaces(this)\" required>
            </div>
            </div>
        </div>


        <div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>Password</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-6'>
                <input type='password' class='required form-control' onkeyup=\"nospaces(this)\" name='b' required>
            </div>
            </div>
        </div>

        <br>
        <div class='form-group'>
            <div class='col-sm-offset-2'>
                <button type='submit' name='submit' class='btn btn-primary'>Daftar</button>
                <a  class='btn btn-default' href='".base_url()."auth/login'>Sudah Punya Akun?</a>
            </div>
        </div>
    </form>";
