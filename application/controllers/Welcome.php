<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
     $this->load->model("Utilidades_model");
     $this->load->model("Referenciales_model");
    // $this->load->library("nativesession");

     }
     
     
     
	public function index()
	{
	   $nacion['nacional']=  $this->Referenciales_model->nacionalidades();
       $this->load->view("principal");
       
	}
    
    
    
    public function addPersona(){
     $this->load->view("add_persona" );
    }
    
    
    public function listaTemporalCi(){
    $this->load->model("Consulta_model");
    $res['lista']=$this->Consulta_model->lista_ci_temporal();
    $res['cantidad']= $this->Consulta_model->numero_ci_temporales();
    $this->load->view("lista_ci_temporal",  $res  );
    }
    
    
    public function  listaCircunscripcion(){
    
      $res['datos']= $this->Referenciales_model->controlCertificado();
      $this->load->view("lista_circunscri", $res);
    }
    
    
     public function busPersona(){
    $this->load->view("consu_persona");
    }
    
     public function modPersona(){
    $this->load->view("modif_persona");
    }
   
   
   public function lugarExpedicion(){
      $this->load->model("Referenciales_model");
    $res['lugar']= $this->Referenciales_model->lugarExpedicion();
    $this->load->view("lugar_expedi", $res);
 
   } 
    
    
   public function anularBoletasCerti( ){
    $this->load->view("anu_bol_certi");
   } 
 
 
 
 
 
 /*** INFORMES    ***/
 
 
   public function arqueo_usu_diario(){
      $this->load->view("informes/arqueo/header");
      $this->load->view("informes/arqueo/resultados");
      $this->load->view("informes/arqueo/footer");
   }
   
      public function arqueo_fecha(){
    $this->load->view("informes/arqueo_fecha");
   }
    
    
      public function arqueo_general(){
    $this->load->view("informes/arqueo_general");
   }
   
    public function cantidad_certifi(){
    $this->load->view("informes/cant_certi_nacio");
   }
   
   
     public function lista_boletas(){
    $this->load->view("informes/listado_bol/header"); 
    $this->load->view("informes/listado_bol/footer");
   }
   
   
  
   
  
     public function lista_certifi(){
    $this->load->view("informes/lista_certifi");
   }
   
   
     public function lista_certifi_anu(){
    $this->load->view("informes/lista_certifi_anu");
   }
   
    
   
     public function resumen_certi_fecha(){
    $this->load->view("informes/resumen_certi_fecha");
   }
   
     public function resumen_general(){
    $this->load->view("informes/resumen_general");
   }
   
      
   
   
   
   
   
   
     
}
