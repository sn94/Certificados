<?php
defined("BASEPATH") OR die("El acceso al script no está permitido");
 
class Pdf_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
 
    public function getNacionalidades()
    {
        $query = $this->db->get('nacionalidades');
        return $query->result();
    }
}
/* End of file pdf_model.php */
/* Location: ./application/models/pdf_model.php */