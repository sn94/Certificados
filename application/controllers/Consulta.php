<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
     
     public function __construct(){
        
       parent::__construct();   
        
     }
     

     
	public function index()
	{  }
        
        
        
    
    
    public function nacionalidades($cad=""){
     $this->load->model("Referenciales_model");
    $res=  $this->Referenciales_model->nacionali_json(  $cad );
    echo $res;
    }
    
    public function profesiones(){
    $this->load->model("Referenciales_model");
    $res= $this->Referenciales_model->profesiones_json();
       echo $res;
    }
    
    
    
    public function lugarExpedicion(){
    $this->load->model("Referenciales_model");
    $res= $this->Referenciales_model->lugarExpedicion();
   return $res;
    }
    
    
    
    public function controlCertificados(){
        $this->load->model("Referenciales_model");
      $res['datos']= $this->Referenciales_model->controlCertificado();
      $this->load->view("lista_circunscri", $res);
    }
    
    
    
    
    
    
    
    
 /*** INFORMES    ***/
 
 
   public function arqueo_usu_diario(){
    $this->load->model("Informes_model");
    $todo['detalle']=$this->Informes_model->arqueo_usuario_diario( $this->input->fe);
     echo "Hay algo en el detalle ". sizeof( $todo['detalle'] );
    if(  sizeof($todo['detalle']) > 0   ){
    $this->load->view("informes/arqueo/resultados", $todo);    
    $this->load->view("informes/arqueo/footer", $todo);    
    }else{
    $this->load->view("errors/errores", array("TITULO"=>"Sin resultados", "MENSAJE"=>"Indique los parametros de busqueda correctos"));
    }
   }
   
      public function arqueo_fecha(){
     $this->load->model("Informes_model");
    $this->load->view("informes/arqueo_fecha");
   }
    
    
      public function arqueo_general(){
      $this->load->model("Informes_model");
    $this->load->view("informes/arqueo_general");
   }
   
    public function cantidad_certifi(){
      $this->load->model("Informes_model");
    $this->load->view("informes/cant_certi_nacio");
   }
   
   
     public function lista_boletas(){
       $this->load->model("Informes_model");
       $this->load->view("informes/lista_bol/header");
    $this->load->view("informes/lista_bol/resultados");
    $this->load->view("informes/lista_bol/footer");
   }
   
   
     public function lista_boletas_anu(){
       $this->load->model("Informes_model");
    $this->load->view("informes/lista_boletas_anu");
   }
   
  
     public function lista_certifi(){
       $this->load->model("Informes_model");
    $this->load->view("informes/lista_certifi");
   }
   
   
     public function lista_certifi_anu(){
       $this->load->model("Informes_model");
    $this->load->view("informes/lista_certifi_anu");
   }
   
   
     public function resumen_bol_fecha(){
     $this->load->model("Informes_model");
    $this->load->view("informes/resumen_bol_fecha");
   }
   
     public function resumen_certi_fecha(){
       $this->load->model("Informes_model");
    $this->load->view("informes/resumen_certi_fecha");
   }
   
     public function resumen_general(){
     $this->load->model("Informes_model");
    $this->load->view("informes/resumen_general");
   }
   
   
   
    
    
            
}