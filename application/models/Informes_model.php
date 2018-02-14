<?php
	
class Informes_model extends CI_Model{
    
  


    
public function __construct(){
     
parent::__construct(); 
$this->load->database();
$this->load->model("Utilidades_model");  

}
    
    
    
private function cantidad_cert_regu(){
//$this->load->model("Metadatos_model");
//$this->Metadatos_model->show_campos_tabla("certificado.certificado");
$usuario= $this->nativesession->get("usr");
$fecha=  $this->Utilidades_model->getTodayDate();

$sql="select count(*) as cantiregu from certificado.certificado where usucar='$usuario' and 
fecha_cert='$fecha' and anulado= 'R'";
$q= $this->db->query( $sql );
$r= $q->row_array();
if(sizeof($r)>0){  return $r['cantiregu'];}
 return "";
}




/*** resumen cobros */
public function resumen_cobros(){

}


public function arqueo_usuario_diario($datee){ 

$usua= $this->nativesession->get("usr");
$fecha= $datee!="" ? $datee :  $this->Utilidades_model->getTodayDate();
$sql="select  a.nrobol,b.serie,b.nrocert,b.anulado as anu_certi,a.exonerado,a.anulado,
(case when a.anulado='S' then 'ANU' 
      when a.exonerado='S' then 'EXO'
       when b.anulado='S' then 'CA' else 'CO' end) as estado,
(case when a.anulado='S' then 0 
      when a.exonerado='S' then 0 
      when b.anulado='S' then 0 
      else a.costo end) as costo,
a.fecha_bol,c.nombre || ' ' || c.apellido as nombape 
from certificado.boletas a 
inner join certificado.certificado b on (a.nrobol=b.nrobol) 
left join personas c on (b.nrodoc=c.nrodoc) 
where a.usucar='$usua' and a.fecha_bol='$fecha' ORDER BY a.fecha_bol, a.nrobol";
$quer=  $this->db->query(  $sql );
$resu['detalle']= $quer->result_array();

$canti_bol=0; // Total de boletas
$canti_exo=0; // Total exonerados
$canti_anu=0; // Total anulados
$canti_certi=0;// Total certificados
$canti_certi_anu=0;// Total certificados anulados
$canti_regu= $this->cantidad_cert_regu();
$total=0;// Total en costos
 

 foreach($resu['detalle'] as $it){
    $canti_certi= $canti_certi+1;
    $canti_bol= $canti_bol+1; // Cantidad de boletas excluyendo los anulados y exonerados
    
   if( $it['anulado'] =="S"){ // boletas anuladas por errores triviales
    $canti_anu= $canti_anu + 1;  $canti_bol= $canti_bol-1;
   }
   if( $it['exonerado']=="S"){// Sin costo, no se cobra
    $canti_exo= $canti_exo+ 1; $canti_bol= $canti_bol -1;
   }
   if( $it['anu_certi'] =="S"){// Certificados de antecedentes anulados
    $canti_certi_anu= $canti_certi_anu+1;  //$canti_bol= $canti_bol - 1;
   }
   $total= $total + int($it['costo']);  
    
 }/** End For **/
 $resu['totales']= 
 array('Cant certi'=>$canti_certi, 'Cant certi anu'=> $canti_certi_anu,'Cant certi reg'=>$canti_regu,
 'Cant bol'=>$canti_bol,'Cant bol exo'=>$canti_exo, 'Cant bol anu'=>$canti_anu,
 'Total'=>$total
 );
 return $resu;
}





public function arqueo_usuario_fecha(){}
public function arqueo_general(){} 




public function listado_boletas(  ){ 
  
      $fechaini= $this->input->post("txt-fecha-desde");
      $fechafin= $this->input->post("txt-fecha-hasta");
      $anulado=  $this->input->post("bol-anulados");
      $agrupar=  $this->input->post("bol-agrupar");


      $ANULADO=FALSE;
      $AGRUPAR=FALSE;

      if($anulado) $ANULADO= TRUE;
      /************** */
      if( $agrupar) $AGRUPAR= TRUE;
      

      $usuario= $this->nativesession->get("usr");
      if( !$usuario)
      $usuario= "william";
      //$this->input->post("txt-usuario");

      $sql="";
     
     $where = array();
 
       if($usuario){
        if($AGRUPAR)  $sql="select fecha_bol as Fecha, usucar as Usuario, count(*) as Cantidad from
         certificado.boletas ";
        else
        $sql='select fecha_bol as Fecha, usucar as Usuario, nrobol as "Nro. boleta", exonerado as Exonerado,
         costo as Costo, anulado as Anulado, fechaanu as  "Fecha de anu.",observa as " Obs.",
          usuanu as "Anulado por"  from certificado.boletas ' ;
 
        array_push($where, "usucar = '$usuario'");
        if( $ANULADO) array_push($where,  "anulado='S'");
        if(  $fechaini && $fechafin) array_push( $where,  "fecha_bol>='$fechaini' and fecha_bol<='$fechafin'");
      }

      if(count($where) > 0) $sql = $sql . ' where ' . implode($where, " and ");
      if($AGRUPAR) $sql= $sql.  " group by fecha_bol,usucar ";

      if( $sql!=""){  
      $consulta= $this->db->query(  $sql );
      $resu_consulta= $consulta->result_array();
      return $resu_consulta;
    }else {
        return array();
      }
      
}







public function listado_certificados(){
  $fechaini= $this->input->post("txt-fecha-desde");
  $fechafin= $this->input->post("txt-fecha-hasta");
  $usuario="";
   if($this->nativesession->get("usr"))
   $usuario= $this->nativesession->get("usr");
   else
  $usuario= $this->input->post("txt-usuario");

  $res= array();

// Consulta sql
$sql="select fecha_cert, usucar, fechacar, nrocert, anulado, fechaanu,
observa, usuanu, antecedente, captura 
from certificado.certificado ";
if( $usuario ){
  if($fechaini && $fechafin){
    $sql.="where fecha_cert>='$fechaini' and fecha_cert<='$fechafin' and anulado='S'";
    $where = array();
    array_push($where, "usucar = '$usuario'");
    if(count($where) > 0){ $sql = $sql . ' and ' . implode($where, " and ");    }
    $sql = $sql.' order by fecha_cert, nrocert';
    //Obtencion de registros
  $query=  $this->db->query(  $sql );
  $res= $query->result_array();

  }
}

 
//devolver
return  $res;
} 









public function certificados_anulados(){} 
public function resumen_certifixfecha(){}
public function resumen_general_mes(){}
public function cantidad_expedi_nacio(){}

}