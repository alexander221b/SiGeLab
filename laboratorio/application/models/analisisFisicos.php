<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AnalisisFisicos extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'analisisfisicos';
    $this->id = 'codigoMuestra';
  }

  function registrarAnalisisFisicos($dato) {
    $this->db->insert('analisisfisicos', $dato);
  }

  function buscarAnalisisFisico($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('analisisfisicos');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarAnalisisFisicos($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('analisisfisicos',$dato);
  }

   function eliminarAnalisisFisico($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('analisisfisicos'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('analisisfisicos');
        }
    }
}