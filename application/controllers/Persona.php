<?php

defined('BASEPATH') OR exit('No direct script access allowed');


	class Persona extends CI_Controller{
	   
    public function __construct(){
        parent::__construct();
        
        $this->load->model("Persona_model");
        $this->load->model("Foto_model");
    }   
    
    
    
    public function agregar(){
    $resu= $this->Persona_model->agregarPersona();
    
    if( sizeof( $resu)>0){
    $mostrar= array("mensaje"=> $resu['nombre']." ha sido registrado", "SEGMENTOS"=>"Welcome/addPersona");
    $this->load->view("templates/success_form", $mostrar );
    }else{
      $mostrar= array("mensaje"=> $resu['nombre']." No se pudo grabar los datos", "SEGMENTOS"=>"Welcome/addPersona");
    $this->load->view("templates/error_form", $mostrar );
    }
    
    }
    
    
    
       
	}