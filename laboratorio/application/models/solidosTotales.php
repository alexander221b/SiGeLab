<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SolidosTotales extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'solidostotales';
    $this->id = 'codigoInterno';
  }

  function registrarSolidosTotales($dato) {
    $this->db->insert('solidostotales', $dato);
  }

  function buscarSolidosTotales($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('solidostotales');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarSolidosTotales($codigoInterno,$dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('solidostotales',$dato);
  }

   function eliminarSolidoTotal($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('solidostotales'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('solidostotales');
        }
    }
}