<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cloruros extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'cloruros';
    $this->id = 'codigoInterno';
  }

  function registrarCloruros($dato) {
    $this->db->insert('cloruros', $dato);
  }

  function buscarCloruros($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno); 
    $solicitud = $this->db->get('cloruros');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarCloruros($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('cloruros',$dato);
  }

   function eliminarCloruro($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('cloruros'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('cloruros');
        }
    }
}