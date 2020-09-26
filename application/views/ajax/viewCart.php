<a href="#" class="single-icon"><i class="ti-bag"></i> <?php if($record->num_rows() > 0) echo '<span class="total-count">' . $record->num_rows() . '</span>';?></a>
<!-- Shopping Item -->
<div class="shopping-item" style="max-height: 400px;overflow: auto">
    <div class="dropdown-cart-header">
        <span><?=$record->num_rows();?> Items</span>
        <a href="<?=base_url();?>produk/keranjang">View Cart</a>
    </div>
    <?php if($record->num_rows() > 0){ ?>
    <ul class="shopping-list">
        <?php foreach($record->result_array() as $row) : ?>
        <li>
            <a href="<?=base_url();?>produk/keranjang_delete/<?=$row['id_penjualan_detail'];?>" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
            <a class="cart-img" href="<?=base_url();?>produk/detail/<?=$row['produk_seo'];?>"><img src="<?=base_url();?>asset/foto_produk/<?=$row['gambar'];?>" alt="<?=$row['nama_produk'];?>"></a>
            <h4><a href="<?base_url();?>produk/detail/<?=$row['produk_seo'];?>"><?=$row['nama_produk'];?></a></h4>
            <?php if ($row['diskon']!='0'){ $diskon = "<del style='color:red'>".rupiah($row['harga_jual'])."</del>"; }else{ $diskon = ""; } ?>
            <p class="quantity"><?=$row['jumlah'];?>x - <span class="amount">Rp. <?=number_format($row['harga_jual'] - $row['diskon'], 0, ',', '.');?> <?=$diskon;?></span></p>
        </li>
        <?php endforeach;?>
    </ul>
    <div class="bottom">
        <div class="total">
            <?php $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-(b.diskon*a.jumlah)) as total, sum(b.berat*a.jumlah) as total_berat FROM `rb_penjualan_temp` a JOIN rb_produk b ON a.id_produk=b.id_produk where a.session='".$this->session->idp."'")->row_array();?>
            <span>Total</span>
            <span class="total-amount">Rp. <?=number_format($total['total'], 0, ',', '.');?></span>
        </div>
        <a href="<?=base_url();?>produk/checkouts/" class="btn animate">Checkout</a>
    </div>
    <?php } else {
        echo '<br><h5 class="text-muted text-center">Empty</h5><br>';
    } ?>
</div>