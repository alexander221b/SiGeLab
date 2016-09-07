<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carbonatos extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'carbonatos';
    $this->id = 'codigoInterno';
  }

  function registrarCarbonatos($dato) {
    $this->db->insert('carbonatos', $dato);
  }

  function buscarCarbonatos($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('carbonatos');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarCarbonatos($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('carbonatos',$dato);

  }

   function eliminarCarbonato($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('carbonatos'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('carbonatos');
        }
    }

}