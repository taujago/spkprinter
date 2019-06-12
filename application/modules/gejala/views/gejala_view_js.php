<script type="text/javascript">
var v_url = '';
$(document).ready(function(){

$("#tabel").dataTable(); 

$("#id_penyakit").select2();

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
		$("#kode").val('');
		$("#gejala").val('');
		v_url = '<?php echo site_url("$this->controller/save") ?>';


		$.ajax({
		url : '<?php echo site_url("$this->controller/get_penyakit_all") ?>/',
 		success : function(htmldata){
			 

	$("#id_penyakit").select2('destroy').html(htmldata).select2();
 
	
	



		}

	});  

	}



function edit(id,kode,gejala,bobot){
	$("#judul").html('EDIT DATA GEJALA ');
	
	v_url = '<?php echo site_url("$this->controller/update") ?>';



	$("#id").val(id);
	$("#kode").val(kode);
	$("#gejala").val(gejala);
	$("#bobot").val(bobot);
	$("#formModal").modal('show');




	 $.ajax({
		url : '<?php echo site_url("$this->controller/get_penyakit") ?>/'+id,
		success : function(htmldata){
			 

		$("#id_penyakit").select2('destroy').html(htmldata).select2();
 


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