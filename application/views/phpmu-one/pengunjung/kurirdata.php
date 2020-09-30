<?php
if(!empty($data)){
	$i=0;
	foreach($data as $row){
		$i+=1;
		$tarif=$row['cost'][0]['value'];
		$service=$row['service'];
		$deskripsi=$row['description'];
		$waktu=$row['cost'][0]['etd']?$row['cost'][0]['etd']:"-";
		?>
		<div class="col-md-12">
			<div class="radio" style='margin: 0px;'>
				<label>
					<input type="radio" name="service" class="service" data-id="<?php echo $i; ?>" value="<?php echo $service; ?>"/> <?php echo $deskripsi; ?>
				</label>
			</div>
			<input type="hidden" name="tarif" id="tarif<?php echo $i; ?>" value="<?php echo $tarif; ?>"/>
			<p style='margin-left: 19px;'>
				Tarif <b>Rp <?php echo number_format($tarif,0); ?></b><br/>
				Estimasi sampai <b><?php echo $waktu; ?> hari</b>
			</p>
		</div>
		<?php			
	}
?>
<?php }

if($ongkir=='0'){ ?>
<div class="col-md-12">
	<div class="radio" style='margin: 0px;'>
		<label>
			<input type="radio" name="service" data-id="1" class="service" value="Cash on delivery"/> Pembayaran Ditempat
		</label>
	</div>
	<input type="hidden" name="tarif" id="tarif1" value="1"/>
	<p style='margin-left: 19px;'>
		Tarif <b>Tidak diketahui</b><br/>
		Estimasi sampai <b>Tidak diketahui</b>
	</p>
</div>

<?php } ?>

<script>
$(document).ready(function(){
$(".service").each(function(o_index,o_val){
	$(this).on("change",function(){
		var service = $(this).val();
		var did=$(this).attr('data-id');
		var tarif=$("#tarif"+did).val();
		var kurir = '<?=$kurir;?>';
		if(did !== 1){
			$("#ongkir").val(tarif);
		}
		hitung(tarif, did);
		simpan(service, kurir);
	});
});
});
</script>