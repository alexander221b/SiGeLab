<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basicidad extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'basicidad';
    $this->id = 'codigoInterno';
  }

  function registrarBasicidad($dato) {
    $this->db->insert('basicidad', $dato);
  }

  function buscarBasicidad($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('basicidad');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarBasicidad($codigoInterno,$dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('basicidad',$dato);
  }

   function eliminarBasicidad($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('basicidad'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('basicidad');
        }
    }
}