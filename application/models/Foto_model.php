<?php
	
class Foto_model extends CI_Model{
    
  private $DB1;
  private $DB2; 
  private $nrodocu;
  
    public function __construct(){
        
        parent::__construct();
        $this->DB1= $this->load->database('sistema', TRUE); 
         
    }
    
    
    private function generarCodigo(){
    $sql = "select nextval('imagenes.foto_ci_id_seq'::regclass) as nfot";
    $query= $this->DB1->query( $sql);
    $queryr=$query->row_array(0);
    $colu= $queryr['nfot']; return  $colu;
    }
    
    
    public function setCI_Foto( $nr){
        $this->nrodocu= $nr;
    }
    
    public function configurarFoto(){
      
                 
    $nfot=$this->generarCodigo();
   $ruta= "../../archivos";
  $NOMBRE_FOTO =   $this->nrodocu."_".$nfot.".jpeg"; 
   
  $config['upload_path'] = $ruta;
$config['allowed_types'] = 'gif|jpg|png|jpeg';
$config['max_size']     = '1000';
$config['max_width'] = '1024';
$config['max_height'] = '768';
$config['overwrite']= TRUE;
$config['file_name']=$NOMBRE_FOTO;
/*****Carga de libreria de subida de archivos***********/
$this->load->library("upload",  $config ); 
 
if( !$this->upload->do_upload("foto-input")){  
$resultado = array('error' => $this->upload->display_errors());
}else{ $resultado =   $this->upload->data();}



return $resultado;
}/** end method **/

 
}