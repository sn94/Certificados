<?php
	
class Consulta_model extends CI_Model{
    
/** Parametros de
 * busqueda **/
 private $punto_pagina;
 private $tipo_bus;
 private $valor;
private $edad_desde;
private $edad_hasta;
private $sexo;
private $es_oficial;
private $nacionalidad;
private $nacio_origen;
private $vehiculos;/** Tipo de busq. vehiculo, por chapa, por nro de motor, chasis, etc **/
private $txtvehi;/** Valor proporcionado para busq. de vehiculo, puede ser la chapa, el nro. de motor, etc **/

/** Consulta **/
private $sql1="";


    
public function __construct(){
     
parent::__construct(); 
$this->load->database( ); 
    
}
    

 
     
   
public function lista_ci_temporal(){
    $this->load->model("Persona_model");//
    $this->load->model("RegistroJudicial_model");
// p.docu_origen, p.lugnac, ca.clave  personas p,cap001 ca
// and (p.nrodoc=pr.nrodoc or p.nrodoc=pr.ci_nuevo )
// and (ca.cidcap=p.nrodoc or ca.cidcap= pr.ci_nuevo) 
$sql="select pr.fechanac,pr.nrodoc,pr.ci_nuevo,pr.nombre,pr.apellido, pr.orig_datos 
from perso_repeti pr 
where pr.orig_datos='CERTI_EXTRA' or pr.orig_datos='Novedad' ";
$sql=$sql." ORDER BY pr.ci_nuevo limit 6";
$res= $this->db->query( $sql ); echo $res->num_rows()." <-- NUMERO DE FILAS";
return $res->result_array();
 
}


public function numero_ci_temporales(){
$sql="SELECT count(nrodoc) as cedula FROM perso_repeti where orig_datos='CERTI_EXTRA'";
$res= $this->db->query( $sql );
$resu=  $res->row_array();
return $resu['cedula'];
}
    
     
    
  




    
    
    
    
}