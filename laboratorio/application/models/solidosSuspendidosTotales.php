<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SolidosSuspendidosTotales extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'solidossuspendidosTotales';
    $this->id = 'codigoInterno';
  }

  function registrarSolidosSuspendidosTotales($dato) {
    $this->db->insert('solidossuspendidosTotales', $dato);
  }

  function buscarSolidosSuspendidosTotales($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno); 
    $solicitud = $this->db->get('solidossuspendidostotales');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarSolidosSuspendidosTotales($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('solidossuspendidostotales',$dato);
  }

   function eliminarSolidoSuspendidoTotal($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('solidossuspendidostotales'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('solidossuspendidostotales');
        }
    }
}