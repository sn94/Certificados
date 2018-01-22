<?php
	
class Certificados_model extends CI_Model{


public function __construct(){
    parent::__construct();
    $this->load->database();
}






public function controlCertificado(){

$sql = "select id,certi_ini,certi_fin,fecha_ent,entregado_a,observa from certificado.control_certi";
 $where = array();
 $buscar= $this->input->get("buscar");
 if($buscar=='buscar'){
    $pagina= $this->input->get("pagina");
$circun10=  $this->input->get('txt-cod');
$depen10=$this->nativesession->get("depend");
$descrip10= $this->input->get('txt-desc');
if( $circun10){ array_push($where, "circun =" . $circun10);}
if( $depen10){ array_push($where, "depend like '%" .$depen10 . "%'");}
if( $descrip10){
$descrip10=strtoupper(  $descrip10); array_push($where, "descrip like '%" . $descrip10 . "%'");
   }
 if(count($where) > 0){$sql = $sql . " where " . implode($where, " and ");}
 
 }

//$sql=$sql." order by depend  LIMIT 20 OFFSET $pagina";
    
$res= $this->db->query(  $sql );
return $res->result_array();
}/*********************************************************/





}

