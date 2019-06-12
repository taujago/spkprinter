


	<div class="card">
	<div class="card-header">
		<h3 class="card-title">DATA ALTERNATIF HANDPHONE</h3>
	</div>
									


<div class="table-responsive">
	<table id="tabel" class="table card-table table-vcenter text-nowrap">
		<thead >
			<tr>
				 
				<th width="10%" rowspan="2" style=" font-weight: bodl; vertical-align: middle;">ALTERNATIF</th>
				<th width="70%" colspan="6" style=" font-weight: bodl; text-align: center;">KRITERIA</th>
				 
			</tr>
			<tr>
				
				 
				<th width="">C1</th>
				<th width="">C2</th>
				<th width="">C3</th>
				<th width="">C4</th>
				<th width="">C5</th>
				<th width="">C6</th>
				 
				 
			</tr>
		</thead>
		<tbody>
<?php 
$n=0;
foreach($record->result() as $row) : 
	$n++;
?>
			<tr>
				 
				<td><?php echo $row->merk; ?></td>
				<td><?php echo $row->c1_bobot; ?></td>
				<td><?php echo $row->c2_bobot; ?></td>
				<td><?php echo $row->c3_bobot; ?></td>
				<td><?php echo $row->c4_bobot; ?></td>
				<td><?php echo $row->c5_bobot; ?></td>
				<td><?php echo $row->c6_bobot; ?></td>
				 
				 
			</tr>
<?php endforeach; ?> 
		</tbody>
	</table>
</div>
</div> <!-- card --> 
<!-- table-responsive -->

 <div class="row mb-3">
	<div class="col-md-3">
		<a href="<?php echo site_url("konsultasi/result"); ?>"   class="btn btn-success" ><i class="fa fa-arrow-right"></i> LANJUTKAN </a>
	</div>

</div>

<?php 
// $this->load->view($this->controller."_view_js");
?>