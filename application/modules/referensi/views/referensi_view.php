<div class="row mb-3">
	<div class="col-md-3">
		<a href="#!" onclick="tambahbaru();" class="btn btn-success" ><i class="fa fa-plus"></i> TAMBAH BARU </a>
	</div>

</div>



<div class="table-responsive">
	<table id="tabel" class="table card-table table-vcenter">
		<thead >
			<tr>
				<th width="5%">NO </th>
				<th width="10%">NAMA </th>
				<th width="5%">JENIS PRINTER</th>				 
				<th width="10%">GEJALA</th>
				
				<th width="10%">KERUSAKAN</th>			
				<th width="50%">SOLUSI</th>				 
				<th width="10%">PROSES</th>
				 
			</tr>
		</thead>
		<tbody>
<?php 
$n=0;
foreach($record->result() as $row) : 
	$n++;
?>
			<tr>
				<th scope="row"><?php echo $n ?></th>
				<td><?php echo $row->nama; ?></td>
				<td><?php echo $row->jenis_printer; ?></td>
			 
				<td><?php echo $row->gejala; ?></td>
				<td><?php echo $row->kodekerusakan; ?></td>
				<td><?php echo $row->solusi; ?></td>

				
				 
				<td>
					<a href="#!"  onclick="edit('<?php echo $row->id; ?>','<?php echo $row->nama; ?>','<?php echo $row->jenis_printer; ?>','<?php echo $row->kerusakan_id; ?>');"  class="btn btn-warning text-light"><i class="fa fa-pencil"></i>Edit</a>
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
				<h5 class="modal-title" id="judul">Tambah Data Referensi </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="frmkriteria">
					<div class="form-group">
						<label for="nama" class="form-control-label">Nama </label>
						<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama ">
					</div>
					<div class="form-group">
						<label for="jenis_printer" class="form-control-label">Jenis Printer:</label>
						<input type="text"   name="jenis_printer" class="form-control" id="jenis_printer" placeholder="Jenis Printer">

					</div>

					 

					<div class="form-group">
						<label for="kerusakan_id" class="form-control-label">Kerusakan :</label>
						<?php 
						$arr_kerusakan  = $this->cm->arr_dropdown_kerusakan();
						echo form_dropdown("kerusakan_id",$arr_kerusakan,'','id="kerusakan_id" class="form-control"');
						?>

					</div>

					<div class="form-group">
						<label for="gejala" class="form-control-label">Gejala :</label>

						<?php 
	// $arr_kerusakan = $this->cm->arr_dropdown_penyakit();
	// $arr_kerusakan = array();
	$arr_gejala = $this->cm->arr_dropdown_gejala();
	echo form_dropdown("gejala_id[]",$arr_gejala,'','id="gejala_id" class="form-control" multiple="multiple" style="width:100%"');

	?>
  

					</div>

<input type="hidden" name="id" id="id">

				</form>
			</div>
			<div class="modal-footer">
				
				<button id="btnsimpan" type="button" class="btn btn-primary"><i class="fa fa fa-paper-plane"></i> SIMPAN</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<?php 
$this->load->view($this->controller."_view_js");
?>