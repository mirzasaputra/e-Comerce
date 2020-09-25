<section class="shop checkout section">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-12 mx-auto">
        <div class="checkout-form">
          <h2 class="text-center"><i class="fa fa-user"></i> Login</h2>
          <br><br>
          <div class="alert alert-danger d-none" id="pesanError"></div>
          <div class="alert alert-success d-none" id="pesanSuccess"></div>
          <!-- Form -->
          <form class="form" id="login" method="post" action="<?php echo base_url('auth/login') ?>">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
                <input type="hide" class="d-none" name="login">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group" style="margin-top: 30px;">
                  <div class="single-widget get-button p-0 w-100">
                    <div class="content w-100">
                      <div class="button w-100">
                        <button type="submit" id="btn-submit" class="btn w-100">Login</button>
                      </div>
                    </div>
                  </div>
                </div>
                <center><span>Belum punya akun? <a class="text-primary" href="">Buat akun</a></span></center>
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
                    $('#btn-submit').html('Login');
                    $('#pesanSuccess').html(data.pesan);
                    $('#pesanSuccess').removeClass('d-none');
                    window.location.assign('<?=base_url();?>produk');
                } else {
                    $('#btn-submit').removeClass('disabled');
                    $('#btn-submit').html('Login');
                    $('#pesanError').html(data.pesan);
                    $('#pesanError').removeClass('d-none');
                }
            }
        })
    })
})
</script>