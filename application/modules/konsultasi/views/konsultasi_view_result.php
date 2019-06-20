<!-- <div class="card">
<div class="card-header">
	<h3 class="card-title">DATA DIAGNOSA </h3>
</div>
<div class="card-body">

<div class="row">
	<div class="col-md-3"><strong> Nama Pasien </strong></div>
	<div class="col-md-3">: <?php echo $userdata['nama']; ?> </div>

	<div class="col-md-3"><strong> Umur Pasien </strong></div>
	<div class="col-md-3">: <?php echo $userdata['umur']; ?> Tahun </div>

	<div class="col-md-3"><strong> JK </strong></div>
	<div class="col-md-3">: <?php echo $userdata['jk']; ?> </div>

	<div class="col-md-3"><strong> No. HP </strong></div>
	<div class="col-md-3">: <?php echo $userdata['hp']; ?> </div>

	<div class="col-md-3"><strong> Alamat </strong></div>
	<div class="col-md-3">: <?php echo $userdata['alamat']; ?> </div>
	<div class="col-md-3"><strong> Tanggal Pemeriksaan </strong></div>
	<div class="col-md-3">: <?php echo flipdate($userdata['tanggal']); ?> </div>

</div> -->

<center><h3>LAPORAN HASIL DIAGNOSA KERUSAKAN PRINTER </h3> </center>

<table class="table  table-bordered">
	<tr><td width="30%">Nama Pelanggan </td><td> : <?php echo $userdata['nama']; ?></td></tr>
	<tr><td>Alamat </td><td> : <?php echo $userdata['alamat']; ?></td></tr>
	<tr><td>Email  </td><td> : <?php echo $userdata['email']; ?></td></tr>
	<tr><td>No. hp  </td><td> : <?php echo $userdata['hp']; ?></td></tr>

</table>


<HR />

<strong>Gejala  kerusakan: </strong> <br />
<ol>
	<?php 

	foreach($rec_gejala_hasil->result() as $row): ?>
		<li><?php echo $row->gejala; ?></li>
	<?php endforeach; ?>
</ol>
 
<br />
<strong>Hasil Diagnosa </strong>
<br />
<strong>Kerusakan  : </strong> <br />
<?php echo $kerusakan->kerusakan; ?>
<br /><br />
<strong>Solusi : </strong><br />
<?php echo $kerusakan->solusi; ?>
<br/><br />
<strong> Dokumen manual  : </strong> <br /> 
<?php echo (!empty($kerusakan->dokumen))?"<a target='blank' href='".base_url("uploads/$kerusakan->dokumen")."'>$kerusakan->dokumen</a>":""; ?>
</div>	
</div> 


<div class="mt-5 table-responsive">

<h3>HASIL PERHITUNGAN</h3>

	<table id="tabel" class="table table-bordered card-table table-vcenter text-nowrap">

<thead >
		
		<tr>
			<th rowspan="3" >NO. </th>
			<th rowspan="3" > ALTERNATIF </th>
			<th colspan="<?php echo count($data_gejala); ?>" > GEJALA DAN BOBOT </th>
			<th rowspan="3" > SKOR DAN BOBOT </th>
		</tr>
		<tr>
			<?php 
				foreach($data_gejala as $dg) : 
			?>
				<th><?php echo $dg['kode'] ?></th>
			<?php endforeach; ?>
		</tr>

		<tr>
			<?php 
			$total_bobot = 0; 
				foreach($data_gejala as $dg) : 
				$total_bobot += $dg['bobot']; 
			?>
				<th><?php echo $dg['bobot'] ?></th>
			<?php endforeach; ?>
		</tr>
		 
</thead>
<TBODY>
	<?php 
	$n=0;
	foreach($arr_ref as $id => $row):
		$n++;
	?>
	<tr>
		<td>
			<?php echo $n; ?>
		</td>
		<td>
			<?php echo $row['nama']; ?>
		</td>
		<?php 
		// $total_bobot = 0;
		$total_jumlah = 0; 
		foreach($row['kemiripan'] as $id_gejala => $bobot ) :  
			// $total_bobot += empty($bobot)?"0":$bobot;
			$total_jumlah += $arr_ref[$id]['jumlah'][$id_gejala];
			?>
			<td><?php echo empty($bobot)?"0":$bobot; ?> / 
				<?php echo  $arr_ref[$id]['jumlah'][$id_gejala]; ?>
			 </td>
		<?php endforeach; ?>
		<TD>
			<?php echo $total_jumlah."/".$total_bobot."=". ($total_jumlah/$total_bobot); ?>
		</TD>
	</tr>
	<?php endforeach; ?>
	
</TBODY>

<tbody>
 

		</tbody>
	</table>
</div>


<div class="card mt-5">
<div class="card-header">
	<h3 class="card-title">DATA KEMIRIPAN </h3>
</div>
<div class="card-body">
<table id="kemiripantb" class="table table-striped">
	<thead>
		<tr>
			<th>No.</th>
			<TH>Kasus Lama</TH>
			<th>Jarak Kasus lama dan baru </th>
			<th>Kerusakan</th>
			<th>Solusi</th>
		</tr>
	</thead>
	<tbody>
		<?php $n=0; 
		foreach($arr_hasil as $id => $bobot ) : 
		$n++; 
		?>
			<tr>
				<td><?php echo $n; ?> </td>
				<td><?php echo $arr_ref[$id]['nama']; ?></td>
				<td><?php echo number_format($bobot,2); ?></td>
				<td><?php echo $arr_ref[$id]['kerusakan']; ?></td>
				<td><?php echo $arr_ref[$id]['solusi']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
</div>
 






 

<div class="card mt-5">
<div class="card-header">
	<h3 class="card-title">RINCIAN PERHITUNGAN   </h3>
</div>

<dir class="row">
	<div class="col-md-12">
	<H5>GEJALA YANG DIPILIH</H5>
	<ul>
		<?php foreach($data_gejala_pilihan as $gj):  ?>
		<li><?php echo $gj['kode']." -  ".$gj['gejala']; ?></li>
<?php endforeach; ?>
	</ul>


	</div>	
</div>
								







</div>   


<script type="text/javascript">
	$(document).ready(function(){
		$("#kemiripantb").dataTable();
	});
</script>

 