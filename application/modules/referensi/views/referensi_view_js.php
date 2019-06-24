<script type="text/javascript">
var v_url = '';
$(document).ready(function(){

$("#tabel").dataTable(); 

$("#gejala_id").select2();

	$("#btnsimpan").click(function(){
		$.ajax({
			url : v_url,
			data : $("#frmkriteria").serialize(),
			dataType : 'json',
			type : 'post',
			success : function(obj){

				if(obj.error==false) {
					$("#formModal").modal('hide');
					// swal.fire('Info',obj.message,'success');

					swal.fire({title: "Info", text: obj.message , type: "success"}).then(function(){

						location.reload();

					});
					
					// 
				}
				else {
					swal.fire('Errr',obj.message,'danger');
				}


			}
		});
	});





});


	function tambahbaru(){
		$("#formModal").modal('show');
		$("#judul").html('TAMBAH DATA BASIS ATURAN ');
		$("#kode").val('');
		$("#penyakit").val('');
		v_url = '<?php echo site_url("$this->controller/save") ?>';


		$.ajax({
		url : '<?php echo site_url("$this->controller/get_gejala_all") ?>/',
 		success : function(htmldata){
			 

		$("#id_gejala").select2('destroy').html(htmldata).select2();
 
	
	



		}

	});  

	}



function edit(id,nama,kerusakan_id){
		$("#judul").html('EDIT DATA BASIS ATURAN ');
	
	v_url = '<?php echo site_url("$this->controller/update") ?>';



	$("#id").val(id);
	$("#nama").val(nama);
 	$("#kerusakan_id").val(kerusakan_id).attr('selected','selected');
 	$("#formModal").modal('show');




	 $.ajax({
		url : '<?php echo site_url("$this->controller/get_gejala") ?>/'+id,
		success : function(htmldata){
			 

		$("#gejala_id").select2('destroy').html(htmldata).select2();
 


		}

	});  

	 
}


function hapus(id) {

Swal.fire({
  title: 'Apakah anda yakin ?',
  text: "Anda akan menghapus data!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Lanjutkan'
}).then((result) => {
  if (result.value) {
     
  		$.ajax({
  			url : '<?php echo site_url("$this->controller/hapus") ?>/'+id,
  			dataType : 'json',
  			success : function(obj) {
  				if(obj.error==false) {
  					
					swal.fire({title: "Info", text: obj.message , type: "success"}).then(function(){

						location.reload();

					});
					 
				}
				else {
					swal.fire('Errr',obj.message,'danger');
				}
  			}
  		});


  }
})



}



</script>