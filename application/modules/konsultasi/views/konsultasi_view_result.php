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
<HR />

<strong>Gejala yang dipilih : </strong> <br />
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
 



<!-- 

<div class="card">
<div class="card-header">
	<h3 class="card-title">HASIL PERHITUNGAN   </h3>
</div>
								


<div class="table-responsive">
	<table id="tabel" class="table card-table table-vcenter text-nowrap">

<thead >
		
		<tr><th>NO. </th>
			<th > PENYAKIT </th>
			<th > SCORE </th>
		</tr>
		 
</thead>

<tbody>
 

		</tbody>
	</table>
</div>
</div>  -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#kemiripantb").dataTable();
	});
</script>

 