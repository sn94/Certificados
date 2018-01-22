<?php

class Referenciales_model extends CI_Model{
    
    
public function __construct(){
   parent::__construct();
   $this->load->database();
   
}  
    
public function nacionalidades_cod($arg){
    $condicion="  where idnacio=$arg";
$query= $this->db->query("select idnacio, descrip from nacio ".$condicion);
$queryr=  $query->result_array();
return $queryr;
  
    
}

public function Nacionalidades_($arg=""){
    
$query= $this->db->query("select idnacio, descrip from nacio " );
$queryr=  $query->result_array();
return $queryr;
  
}

public function nacionalidades($arg=""){
    $condicion="";
if( $arg !=""){
    $arg=  strtolower(trim( $arg ));$condicion=" where lower(trim(descrip)) like '%$arg%'   limit 5 offset 0";
$query= $this->db->query("select idnacio, descrip from nacio ".$condicion);
$queryr=  $query->result_array();
return $queryr;
 
}else{ return array();  }
    
}


public function nacionali_json($arg=""){
$condicion="";
if( $arg !=""){
    $arg=  strtolower(trim( $arg ));
    $condicion=" where lower(trim(descrip)) like '%$arg%'   limit 5 offset 0";
}
$query= $this->db->query("select idnacio, descrip from nacio ".$condicion);
$queryr=  $query->result_array();
$jsonq= json_encode(  $queryr);
 return $jsonq;
}


public function profesiones($arg=""){
$condicion="";
if( $arg !=""){
    $arg=  strtolower(trim( $arg ));
    $condicion=" where lower(trim(descripcion)) like '%$arg%'";
}
$query= $this->db->query("select idprofesiones, descripcion from profesiones $condicion");
$queryr=  $query->result_array(); 
 return $queryr;
}

public function profesiones_json(){

$query= $this->db->query("select idprofesiones, descripcion from profesiones");
$queryr=  $query->result_array();
$resjson=  json_encode($queryr);
 return $resjson;
}






public function lugarFallecimiento($arg=""){
    $condicion="";
if( $arg !=""){
    $arg=  strtolower(trim( $arg ));
    $condicion=" where lower(trim(descrip)) like '%$arg%'";
}
$query= $this->db->query("select id, descrip from fallecidos.lugar_falleci $condicion");
$queryr=  $query->result_array();
 return $queryr;
}

public function causaFallecimiento($arg=""){
    $condicion="";
if( $arg !=""){
    $arg=  strtolower(trim( $arg ));
    $condicion=" where lower(trim(descrip)) like '%$arg%'";
}

$query= $this->db->query("select id, descrip from fallecidos.causa  $condicion");
$queryr=  $query->result_array();
 return $queryr;
}

public function circunstanciaFallecimiento( $arg=""){
       $condicion="";
if( $arg !=""){
    $arg=  strtolower(trim( $arg ));
    $condicion=" where lower(trim(descrip)) like '%$arg%'";
}
$query= $this->db->query("select id, descrip from fallecidos.circunstancia $condicion");
$queryr=  $query->result_array();
 return $queryr;
}




public function lugarExpedicion(){
       
$sql = "select id,usuario,lugexp,costo,costo_desc from certificado.inicerti";
$res= $this->db->query( $sql );
$re= $res->result_array();
return $re;
}

    
    
    
}