<section class="hero-slider">
      <div class="owl-carousel owl-theme slider1">
            <?php
            $slider = $this->Model_main->slide();
            foreach ($slider->result_array() as $row) :
            ?>
                  <div class="item w-100">
                        <img src="<?=base_url();?>asset/foto_slide/<?=$row['gambar'];?>" alt="">
                  </div>
            <?php endforeach;?>
      </div>
</section>