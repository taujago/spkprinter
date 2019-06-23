<?php
class referensi extends master_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("coremodel","cm");
		 
		$this->controller = get_class($this);

	}

	function index(){
		// echo "fuckkk.."; exit;
		$data_array = array();


		$this->db->select('r.*, p.kode as kodekerusakan, p.solusi, group_concat(g.kode) as gejala ',false)
		->from('referensi r')
		->join("referensi_detail rd","r.id = rd.referensi_id")
		->join("gejala g","g.id = rd.gejala_id")
		->join("kerusakan p","p.id = r.kerusakan_id ")
		->order_by("g.kode")
		->group_by("r.id");

		$res = $this->db->get();
		$data_array['record'] = $res; 
		 
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_title("DATA  BASIS ATURAN");
		$this->set_content($content);
		$this->render();
	}

	function save(){


		$post = $this->input->post();
		// show_array($post); exit;

		$this->load->library('form_validation');
 		$this->form_validation->set_rules('nama','Nama','required');
 		$this->form_validation->set_rules('jenis_printer','Jenis Printer','required');
 		
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');

 		if($this->form_validation->run() == TRUE ) { 
 			unset($post['id']);

 			$arr_gejala = isset($post['gejala_id'])?$post['gejala_id']:array();

 			unset($post['gejala_id']);

 			$res = $this->db->insert("referensi",$post);
 			$referensi_id = $this->db->insert_id();

 			if($res){

 				$this->db->where("referensi_id",$referensi_id);
 				$this->db->delete("referensi_detail");

 				foreach($arr_gejala as $gejala_id):
 					$arr_ref = array(

 						"gejala_id" => $gejala_id,
 						"referensi_id" => $referensi_id
 					);
 					// show_array($arr_pengetahuan); 
 					$this->db->insert("referensi_detail",$arr_ref);
 				endforeach;


 				$ret = array("error"=>false,"message"=>"Data referensi berhasil disimpan");
 			}
 			else {
 				$ret = array("error"=>true,"message"=>"Data referensi disimpan".mysql_error());
 			}
 		}
 		else {
 			$ret = array("error"=>true,"message"=>validation_errors());
 		}

 		echo json_encode($ret);
	}
 


 function update(){


		$post = $this->input->post();

		$this->load->library('form_validation');
 		$this->form_validation->set_rules('nama','Nama','required');
 		$this->form_validation->set_rules('jenis_printer','Jenis Printer','required');
 		
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');

 		if($this->form_validation->run() == TRUE ) { 
 			// unset($post['id']);


 			$arr_gejala = isset($post['gejala_id'])?$post['gejala_id']:array();

 			unset($post['gejala_id']);


 			$this->db->where("id",$post['id']);
 			$res = $this->db->update("referensi",$post);
 			$referensi_id = $post['id'];

 			if($res){

 				$this->db->where("referensi_id",$referensi_id);
 				$this->db->delete("referensi_detail");

 				foreach($arr_gejala as $gejala_id):
 					$arr_ref = array(

 						"gejala_id" => $gejala_id,
 						"referensi_id" => $referensi_id
 					);
 					// show_array($arr_pengetahuan); 
 					$this->db->insert("referensi_detail",$arr_ref);
 				endforeach;



 				$ret = array("error"=>false,"message"=>"Data referensi berhasil diupdate");
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
	$res = $this->db->delete("referensi");
	if($res){

		$this->db->where("referensi_id",$id);
		$this->db->delete("referensi_detail");


		$ret = array("error"=>false,"message"=>"Data harga berhasil dihapus");
	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus".mysql_error());

	}
	echo json_encode($ret);
}


function get_gejala($referensi_id){

	$this->db->where("referensi_id",$referensi_id);
	$res = $this->db->get("referensi_detail");
	$arr_referensi = array();
	foreach($res->result() as $row) : 
		$arr_referensi[] = $row->gejala_id;
	endforeach;

	// show_array($arr_referensi);exit;

	$this->db->order_by("kode");
	$res  = $this->db->get("gejala");

	foreach($res->result() as $row_gejala): 
		$selected = ( in_array($row_gejala->id, $arr_referensi) )?"selected":"";
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
