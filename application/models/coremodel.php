<?php
class coremodel extends CI_Model {
        function __construct() {
                parent::__construct();
        }
     
function add_arr_head($arr,$index,$str) {
  $res[$index] = $str;
  foreach($arr as $x => $y) : 
  $res[$x] = $y;
  endforeach;
  return $res;
}

function arr_dropdown($vTable, $vINDEX, $vVALUE, $vORDERBY){
                $this->db->order_by($vORDERBY);
                $res  = $this->db->get($vTable);
                $ret = array();
                foreach($res->result_array() as $row) : 
                        $ret[$row[$vINDEX]] = $row[$vVALUE];
                endforeach;
                return $ret;

 }


 function arr_dropdown_gejala(){
    $this->db->order_by("kode");
    $res = $this->db->get("gejala");
    $arr = array();
    foreach($res->result() as $row) : 
        $arr[$row->id] = $row->kode." ".$row->gejala;
    endforeach;
    return $arr;
 }

function arr_dropdown_kerusakan(){
    $this->db->order_by("kode");
    $res = $this->db->get("kerusakan");
    $arr = array();
    foreach($res->result() as $row) : 
        $arr[$row->id] = $row->kode." ".$row->kerusakan;
    endforeach;
    return $arr;
 }

 function arr_dropdown_gejalax(){
    $this->db->order_by("kode");
    $res = $this->db->get("gejala");
    $arr = array();
    foreach($res->result() as $row) : 
        $arr[$row->id] = $row->kode." ".$row->gejala;
    endforeach;
    return $arr;
 }

}
?>
