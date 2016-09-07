<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AcidezVolatil extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'acidezvolatil';
    $this->id = 'codigoInterno';
  }

  function registrarAcidezVolatil($dato) {
    $this->db->insert('acidezvolatil', $dato);
  }

  function buscarAcidezVolatil($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('acidezvolatil');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarAcidezVolatil($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('acidezvolatil',$dato);
  }

   function eliminarAcidezVolatil($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('acidezvolatil'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('acidezvolatil');
        }
    }
}