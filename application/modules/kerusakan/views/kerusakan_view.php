<div class="row mb-3">
	<div class="col-md-3">
		<a href="#!" onclick="tambahbaru();" class="btn btn-success" ><i class="fa fa-plus"></i> TAMBAH BARU </a>
	</div>

</div>



<div class="table-responsive">
	<table id="tabel" class="table card-table table-vcenter text-nowrap">
		<thead >
			<tr>
				<th width="5%">NO </th>
				<th width="10%">GAMBAR</th>			
				<th width="5%">KODE </th>
				<th width="50%">KERUSAKAN</th>
				<th width="50%">SOLUSI</th>		
					 
				<th width="10%">PROSES</th>
				 
			</tr>
		</thead>
		<tbody>
<?php 
$n=0;
foreach($record->result() as $row) : 

$image = (!empty($row->gambar))?$row->gambar:"noimage.png";

	$n++;
?>
			<tr>
				<th scope="row"><?php echo $n ?></th>
				<td><img width="70px" height="70px" src="<?php echo base_url("uploads/$image") ?>"></td>
				<td><?php echo $row->kode; ?></td>
				<td><?php echo $row->kerusakan; ?></td>
				<td><?php echo $row->solusi; ?></td>

				 
				<td>
					<a href="#!"  onclick="edit('<?php echo $row->id; ?>','<?php echo $row->kode; ?>','<?php echo $row->kerusakan; ?>','<?php echo $row->solusi; ?>');"  class="btn btn-warning text-light"><i class="fa fa-pencil"></i>Edit</a>
					<a href="#!" onclick="hapus('<?php echo $row->id; ?>');"  class="btn btn-danger text-light"><i class="fa fa-trash"></i>Hapus	</a>
</td>
			</tr>
<?php endforeach; ?> 
		</tbody>
	</table>
</div>
<!-- table-responsive -->


<div class="modal fade" id="formModal" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="judul">Tambah Data kerusakan </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="frmkriteria" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				
					<div class="form-group">
						<label for="kode" class="form-control-label">Kode :</label>
						<input type="text" name="kode" class="form-control" id="kode">
					</div>
					<div class="form-group">
						<label for="gejala" class="form-control-label">kerusakan:</label>
						<input type="text"  name="kerusakan" class="form-control" id="kerusakan">

					</div>

					<div class="form-group">
						<label for="solusi" class="form-control-label">Solusi:</label>
						<input type="text"  name="solusi" class="form-control" id="solusi">

					</div>

					 
					<div class="form-group">
						<label for="gejala" class="form-control-label">Gejala :</label>

						<?php 
	// $arr_kerusakan = $this->cm->arr_dropdown_kerusakan();
	$arr_kerusakan = array();
	echo form_dropdown("id_gejala[]",$arr_kerusakan,'','id="id_gejala" class="form-control" multiple="multiple" style="width:100%"');

	?>
  

					</div>

					<div class="form-group">
						<label for="solusi" class="form-control-label">Gambar :</label>
						<input type="file"  name="gambar" class="form-control" id="gambar">

					</div>

<input type="hidden" name="id" id="id">

				
			</div>
			<div class="modal-footer">
				
				<button id="btnsimpan" type="submit" class="btn btn-primary"><i class="fa fa fa-paper-plane"></i> SIMPAN</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div></form>
		</div>
	</div>
</div>

<?php 
$this->load->view($this->controller."_view_js");
?>