<?php
// $attributes = array('class' => 'search-form', 'role' => 'form');
// echo form_open_multipart('konfirmasi/tracking', $attributes);
// echo "<div class='alert alert-info'>Masukkan No Invoice atau No Transaksi Terlebih dahulu!</div>
//       <div class='search-top'>
//         <input type='text' placeholder='Search here...' name='search'>
//         <button value='search' type='submit'><i class='ti-search'></i></button>
//     </div>

//       <div class='box-footer'>
//         <button type='submit' name='submit1' class='btn btn-info'>Cek Invoice</button>
//       </div>";
// echo form_close();
?>
<!-- Start Checkout -->
<section class="shop checkout section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12">
        <div class="checkout-form">
          <h2>Tracking Order</h2>
          <p>Cek keberadaan barang yang kamu pesan.</p>
          <!-- Form -->
          <form class="form" method="post" action="<?php echo base_url('konfirmasi/tracking') ?>">
            <div class="row">
              <div class="col-lg-9 col-md-9 col-12">
                <div class="form-group">
                  <label>Kode Transaksi<span>*</span></label>
                  <input type="text" name="search" placeholder="Masukan Kode Transaksi Anda!" required="required" autocomplete="off">
                </div>
              </div>
              <div class="col-lg-3 col-md-12 col-12">
                <div class="form-group" style="margin-top: 30px;">
                  <div class="single-widget get-button">
                    <div class="content">
                      <div class="button">
                        <button type="submit" name="submit1" class="btn">Cek Invoice</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!--/ End Form -->
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ End Checkout -->