<?php
class konsultasi extends master_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("coremodel","cm");
		 
		$this->controller = get_class($this);

    $this->method = null; 

	}

	function index(){
		// echo "fuckkk.."; exit;
		$data_array = array();

		$this->db->order_by("kode");

		$data_array['record'] = $this->db->get("gejala");



		 
		 
		$content = $this->load->view($this->controller."_view_form",$data_array,true);

		$this->set_title("KONSULTASI  PENYAKIT PERNAFASAN");
		$this->set_content($content);
		$this->render();
	}



function index2(){
$post = $this->input->post();
// show_array($post); exit;

$arr = array("tanggal"=>date("Y-m-d"),
			 "user_id"=>$_SESSION['userdata'][0]['id'] 

			 );

$this->db->insert("pemeriksaan",$arr);
$pemeriksaan_id = $this->db->insert_id();

foreach($post['gejala_id'] as $gejala_id): 
	$tmp['pemeriksaan_id'] = $pemeriksaan_id;
	$tmp['gejala_id'] = $gejala_id;
	$this->db->insert("pemeriksaan_detail",$tmp);
endforeach;

redirect("$this->controller/review/$pemeriksaan_id");



}

function review($id){
// $post = $this->input->post();
// show_array($post);
/// get gejala dan buat dalam bentuk array dengan format contoh sbb : 
// Array
// (
//     [gejala_id] => Array
//         (
//             [0] => 139
//             [1] => 122
//             [2] => 143
//             [3] => 125
//         )

// )	
$this->db->where("pemeriksaan_id",$id);
$rs = $this->db->get("pemeriksaan_detail");
foreach($rs->result() as $r): 
	$post['gejala_id'][] = $r->gejala_id;
endforeach;




// buat referensi array gejala 
$res = $this->db->get("gejala");
$ref_gejala = array();
foreach($res->result() as $rg): 
	$ref_gejala[$rg->id] = $rg->bobot;
endforeach;

 

 
	 // redirect("konsultasi/detail/$id_pemeriksaan");

// ambil data referensi pasien lama 
  $this->db->select("r.*, p.penyakit")
  ->from('referensi r')
  ->join('penyakit p','p.id = r.penyakit_id');
  $res = $this->db->get();

  $arr_ref = array();

  $arr_hasil = array();
  foreach($res->result() as $row): 
  		$arr_ref[$row->id] = array(
  			"nama" => $row->nama,
  			"umur" => $row->umur,
  			"jk"   => $row->jk,
  			"penyakit_id" => $row->penyakit_id,
  			"penyakit" => $row->penyakit
  		);

  		$this->db->where("referensi_id",$row->id);
  		$rs_ref = $this->db->get("referensi_detail");
  		foreach($rs_ref->result() as $rf ) : 
  			$arr_ref[$row->id]['gejala'][] = $rf->gejala_id ;
  		endforeach;
  		$total_bobot = 0;
  		$tmp =0;
  		foreach($ref_gejala as $gejala_id => $bobot): 


        $this->db->where("gejala_id_1",$gejala_id);
        $jumlah = $this->db->get("kemiripan")->num_rows();



        if(in_array($gejala_id,$arr_ref[$row->id]['gejala']) && $jumlah > 0 ) {
            // echo "$gejala_id adaaa.. di dalam db  <br />";

            $ids = implode(",",$post['gejala_id']);
            $sql = "select * from kemiripan where gejala_id_1 ='$gejala_id' and gejala_id_2 in($ids)";
            $rx = $this->db->query($sql);

            // echo $this->db->last_query()."<br />";
            if($rx->num_rows() == 1) {
                $dx = $rx->row();
                $arr_ref[$row->id]['kemiripan'][$gejala_id] = $dx->bobot;
            }
            else if($rx->num_rows() == 0 ) {
              $arr_ref[$row->id]['kemiripan'][$gejala_id] = 0;
            }
            else if($rx->num_rows() > 1 ) {
                $tmp = 0; 
                foreach($rx->result() as $rwx): 
                    if($rwx->bobot > $tmp ) {
                      $tmp = $rwx->bobot;
                    }
                endforeach;
                $arr_ref[$row->id]['kemiripan'][$gejala_id] = $tmp;
            }

        }
        else { 

          // echo "tidakada $gejala_id <br />";

  			 $x = (in_array($gejala_id,$arr_ref[$row->id]['gejala']))?1:0;
  			 $y = (in_array($gejala_id,$post['gejala_id']))?1:0; 
         $arr_ref[$row->id]['kemiripan'][$gejala_id] = !($x xor $y);
        }

  			 
        
  			 
  			 $tmp += $arr_ref[$row->id]['kemiripan'][$gejala_id] * $bobot;
  			 $total_bobot += $bobot;
  		endforeach;
  		$arr_ref[$row->id]['score'] = $tmp / $total_bobot;

  		$arr_hasil[$row->id] = $arr_ref[$row->id]['score']; 
      // break;
  endforeach;

arsort($arr_hasil);

 
$data_array['ref_gejala'] = $ref_gejala;

$data_array['arr_ref'] = $arr_ref;
$data_array['arr_hasil'] = $arr_hasil;

// show_array($ref_gejala);
// show_array($post);
// show_array($arr_ref);   

// show_array($arr_hasil);  exit;

// get data pasien 
$this->db->select("u.*, p.tanggal")
->from("pengguna u")
->join("pemeriksaan p","u.id = p.user_id")
->where("p.id",$id);

$data_array['userdata'] = $this->db->get()->row_array();


// get data gejala yang dialami 
$this->db->select("g.*")
->from("gejala g")
->join("pemeriksaan_detail pd","pd.gejala_id = g.id")
->where("pemeriksaan_id",$id);

$data_array['rec_gejala_hasil'] = $this->db->get();

// ambil data penyakit hasil 
$id_penyakit = "";
foreach($arr_hasil as $xy => $hasil): 
	$id_penyakit = $xy; 
	break;
endforeach;


// echo "id penyakit $id_penyakit"; exit;
// $this->db->where("id",$id_penyakit);
$this->db->where("id",$arr_ref[$id_penyakit]['penyakit_id']);
$data_array['penyakit'] = $this->db->get("penyakit")->row();

// terakhir update id penyakit ke data  pemeriksaan 
$this->db->where("id",$id);
$this->db->update("pemeriksaan",array("penyakit_id"=>$id_penyakit));


$content = $this->load->view($this->controller."_view_result",$data_array,true);

$this->set_title("HASIL DIAGNOSA");
$this->set_content($content);
$this->render();


}

// function list(){
// 	echo "flow";
// }
function listview(){

$this->method="listview";


$data_array = array();

$this->db->select('p.*,u.nama,u.umur,u.jk,u.alamat')
->from('pemeriksaan p')
->join('pengguna u','p.user_id = u.id');
$this->db->order_by("tanggal","desc");

if($_SESSION['userdata'][0]['level'] == 0 ) {
	$this->db->where("p.user_id",$_SESSION['userdata'][0]['id']);
}

$data_array['rec_pemeriksaan'] = $this->db->get();



$content = $this->load->view($this->controller."_list_view",$data_array,true);

$this->set_title("DATA KONSULTASI PEMERIKSAAN");
$this->set_content($content);
$this->render();

}
 

function laporan(){

  $this->method = "laporan";

$sql = " select * from ( 
SELECT p.*, 
       count(pm.id) as jumlah , 
      sum( if(u.jk='L',1,0)) as L,
      sum( if(u.jk='P',1,0)) as P     
  
    FROM penyakit p 
left join pemeriksaan pm on p.id = pm.penyakit_id
left join pengguna u on u.id = pm.user_id 
  group by p.id 
  ) x 
  order by x.jumlah desc
";

$data_array['record'] = $this->db->query($sql);

$content = $this->load->view($this->controller."_laporan_view",$data_array,true);

$this->set_title("LAPORAN REKAPITULASI HASIL PEMERIKSAAN");
$this->set_content($content);
$this->render();


}



}

?>
