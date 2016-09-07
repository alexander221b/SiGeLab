<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hidrocarburos extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'hidrocarburos';
    $this->id = 'codigoInterno';
  }

  function registrarHidrocarburos($dato) {
    $this->db->insert('hidrocarburos', $dato);
  }

  function buscarHidrocarburo($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('hidrocarburos');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarHidrocarburos($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('hidrocarburos',$dato);
  }

   function eliminarHidrocarburo($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('hidrocarburos'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('hidrocarburos');
        }
    }
}