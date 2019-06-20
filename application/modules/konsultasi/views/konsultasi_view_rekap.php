<form id="fcari">

<div class="row">

<div class="col-md-3">
	<div class="form-group">
 	<label for="bulan"><strong> Bulan :  </strong></label>
 	<?php 
 		$m = date("m");

 		$arr = array(1=>"JANUARI","FEBRUAI","MARET",'APRIL','MEI','JUNI','JULI'
 			,'AGUSTUS','SEPTERMBER','NOVEMBER','DESEMBER');

 		echo form_dropdown("bulan",$arr,$m,'id="bulan" class="form-control"');


 	?>
 	</div>
</div>

<div class="col-md-3">
	<div class="form-group">
 	<label for="tahun"><strong> Tahun :  </strong></label>
 	 
 	<input type="text" name="tahun" id="tahun" class="form-control" value="<?php echo date("Y"); ?>" />
 	</div>
</div>

<div class="col-md-3">
	<div class="form-group">
 	<label for="tahun"><strong> &nbsp;</strong></label>
 	
 	<button id="tampil" type="button" class="btn btn-block btn-primary"><i class="fa fa-list"></i> TAMPILKAN </button> 
 	
 	</div>
</div>


</div>

</form>

<div class="row mt-5">
	
<div class="col-md-12" id="hasil">
	
</div>


</div>



<script type="text/javascript">
	$(document).ready(function(){

		$("#tampil").click(function(){


			$.ajax({
						url : '<?php echo site_url("$this->controller/get_rekap") ?>',
						type : 'post',
						data : $("#fcari").serialize(),
						success : function(htmldata) {
							$("#hasil").html(htmldata);
						}
					});

		});
		
	});
</script>