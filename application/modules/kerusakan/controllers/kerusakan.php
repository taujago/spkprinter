<?php
class kerusakan extends master_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("coremodel","cm");
		 
		$this->controller = get_class($this);

	}

	function index(){
		// echo "fuckkk.."; exit;
		$data_array = array();


		$this->db->select('*')->from('kerusakan');
		$res = $this->db->get();
		$data_array['record'] = $res; 
		 
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_title("DATA  KERUSAKAN DAN SOLUSI");
		$this->set_content($content);
		$this->render();
	}

	function save(){


		$post = $this->input->post();
		// show_array($post); exit;



		if(isset($_FILES['dokumen'])) { 

			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'pdf';
	        $config['max_size']             = 10000;
	        // $config['max_width']            = 1024;
	        // $config['max_height']           = 768;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('dokumen'))
	        {
	                $error =   $this->upload->display_errors();
	                
	                // $this->load->view('upload_form', $error);
	                echo json_encode(array("error"=>true,"message"=>$error));
	                exit;
	        }
	        else {
	        	$dg =  $this->upload->data();
	        	// show_array($dg); 
	        	$post['dokumen'] = $dg['file_name'];
	        }

    	}

		$this->load->library('form_validation');
 		$this->form_validation->set_rules('kode','Kode','required');
 		$this->form_validation->set_rules('kerusakan','Kerusakan','required');
 		
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');

 		if($this->form_validation->run() == TRUE ) { 
 			unset($post['id']);

 			$arr_gejala = isset($post['id_gejala'])?$post['id_gejala']:array();

 			unset($post['id_gejala']);

 			$res = $this->db->insert("kerusakan",$post);
 			$id_kerusakan = $this->db->insert_id();

 			if($res){

 				$this->db->where("id_kerusakan",$id_kerusakan);
 				$this->db->delete("pengetahuan");

 				foreach($arr_gejala as $id_gejala):
 					$arr_pengetahuan = array(

 						"id_gejala" => $id_gejala,
 						"id_kerusakan" => $id_kerusakan
 					);
 					// show_array($arr_pengetahuan); 
 					$this->db->insert("pengetahuan",$arr_pengetahuan);
 				endforeach;


 				$ret = array("error"=>false,"message"=>"Data kerusakan berhasil disimpan");
 			}
 			else {
 				$ret = array("error"=>true,"message"=>"Data gagal disimpan".mysql_error());
 			}
 		}
 		else {
 			$ret = array("error"=>true,"message"=>validation_errors());
 		}

 		echo json_encode($ret);
	}
 


 function update(){


		$post = $this->input->post();

		if(isset($_FILES['dokumen'])) { 

			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'pdf';
	        $config['max_size']             = 100000;
	        // $config['max_width']            = 10240;
	        // $config['max_height']           = 768;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('dokumen'))
	        {
	                $error =   $this->upload->display_errors();
	                
	                // $this->load->view('upload_form', $error);
	                echo json_encode(array("error"=>true,"message"=>$error));
	                exit;
	        }
	        else {
	        	$dg =  $this->upload->data();
	        	// show_array($dg); 
	        	$post['dokumen'] = $dg['file_name'];
	        }

    	}

		$this->load->library('form_validation');
 		$this->form_validation->set_rules('kode','Kode','required');
 		$this->form_validation->set_rules('kerusakan','kerusakan','required');
 		
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');

 		if($this->form_validation->run() == TRUE ) { 
 			// unset($post['id']);


 			$arr_gejala = $post['id_gejala'];

 			unset($post['id_gejala']);


 			$this->db->where("id",$post['id']);
 			$res = $this->db->update("kerusakan",$post);

 			if($res){

 				$this->db->where("id_kerusakan",$post['id']);
 				$this->db->delete("pengetahuan");

 				foreach($arr_gejala as $id_gejala):
 					$arr_pengetahuan = array(

 						"id_gejala" => $id_gejala,
 						"id_kerusakan" => $post['id']
 					);
 					$this->db->insert("pengetahuan",$arr_pengetahuan);
 				endforeach;



 				$ret = array("error"=>false,"message"=>"Data kerusakan berhasil diupdate");
 			}
 			else {
 				$ret = array("error"=>true,"message"=>"Data gagal diupdate".mysql_error());
 			}
 		}
 		else {
 			$ret = array("error"=>true,"message"=>validation_errors());
 		}

 		echo json_encode($ret);
	}




function hapus($id) {

	$this->db->where("id",$id);
	$res = $this->db->delete("kerusakan");
	if($res){

		$this->db->where("id_kerusakan",$id);
		$this->db->delete("pengetahuan");


		$ret = array("error"=>false,"message"=>"Data harga berhasil dihapus");
	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus".mysql_error());

	}
	echo json_encode($ret);
}


function get_gejala($id_kerusakan){

	$this->db->where("id_kerusakan",$id_kerusakan);
	$res = $this->db->get("pengetahuan");
	$arr_pengetahuan = array();
	foreach($res->result() as $row) : 
		$arr_pengetahuan[] = $row->id_gejala;
	endforeach;

	// show_array($arr_pengetahuan);exit;

	$this->db->order_by("kode");
	$res  = $this->db->get("gejala");

	foreach($res->result() as $row_gejala): 
		$selected = ( in_array($row_gejala->id, $arr_pengetahuan) )?"selected":"";
		echo "<option value=$row_gejala->id $selected>$row_gejala->kode $row_gejala->gejala</option>";

		// $arr[] = array("id"=>$row_gejala->id,"text"=>"$row_gejala->kode $row_gejala->kerusakan");
	endforeach;

	// $ret = array("result"=>$arr);

	// echo json_encode($arr);



}


function get_gejala_all(){

	 

	// show_array($arr_pengetahuan);exit;

	$this->db->order_by("kode");
	$res  = $this->db->get("gejala");

	foreach($res->result() as $row_gejala): 
		 
		echo "<option value=$row_gejala->id >$row_gejala->kode $row_gejala->gejala</option>";

		// $arr[] = array("id"=>$row_gejala->id,"text"=>"$row_gejala->kode $row_gejala->kerusakan");
	endforeach;

	// $ret = array("result"=>$arr);

	// echo json_encode($arr);



}


function pengetahuan(){


// $data_array['rec_kerusakan'] = $res; 

$data_array['rec_gejala'] = $this->db->get("gejala");

$n=0;
$res  = $this->db->get("kerusakan");

foreach($res->result() as $row) : 
	$n++;
	
	$this->db->where("id_kerusakan",$row->id);
	$rs_pen  = $this->db->get("pengetahuan");
	$arr_gejala = array();
	foreach($rs_pen->result() as $rpen): 
		$arr_gejala[] = $rpen->id_gejala;
	endforeach;



	$arr[$n]['no'] = $n;
	$arr[$n]['kode'] = $row->kode;
	$arr[$n]['kerusakan'] = $row->kerusakan;
	$x=0;
	foreach($data_array['rec_gejala']->result() as $rg): 
		$arr[$n][$x] =  (in_array($rg->id,$arr_gejala))?$rg->kode:"";
		$x++;
	endforeach;


endforeach;

// show_array($arr); exit;
$data_array['data'] = $arr;

// get pengetahuan by gejala

$data_array['rec_kerusakan'] = $this->db->get("kerusakan");

$n=0;
$res = $this->db->get("gejala");
$data_gejala = array();
foreach($res->result() as $row) : 
	$n++;
	
	$this->db->where("id_gejala",$row->id);
	$rs_gj  = $this->db->get("pengetahuan");
	// echo $this->db->last_query()."<hr />";
	$arr_kerusakan = array();
	foreach($rs_gj->result() as $rpen): 
		$arr_kerusakan[] = $rpen->id_kerusakan;
	endforeach;
	// echo "id $row->id"; 
	// show_array($arr_kerusakan);



	$data_gejala[$n]['no'] = $n;
	$data_gejala[$n]['kode'] = $row->kode;
	$data_gejala[$n]['gejala'] = $row->gejala;
	$x=0;
	foreach($data_array['rec_kerusakan']->result() as $rg): 
		$data_gejala[$n][$x] =  (in_array($rg->id,$arr_kerusakan))?$rg->kode:"";
		$x++;
	endforeach;


endforeach;

// show_array($data_gejala); 
$data_array['data_gejala'] = $data_gejala;
// show_array($data_array['data_gejala']); exit;
$content = $this->load->view($this->controller."_pengetahuan_view",$data_array,true);

$this->set_title("DATA  PENGETAHUAN");
$this->set_content($content);
$this->render();



}


}

?>
