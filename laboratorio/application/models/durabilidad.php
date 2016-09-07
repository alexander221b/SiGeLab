<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Durabilidad extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'durabilidad';
    $this->id = 'codigoInterno';
  }

  function registrarDurabilidad($dato) {
    $this->db->insert('durabilidad', $dato);
  }

  function buscarDurabilidad($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('durabilidad');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarDurabilidad($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('durabilidad',$dato);
  }

   function eliminarDurabilidad($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('durabilidad'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('durabilidad');
        }
    }
}