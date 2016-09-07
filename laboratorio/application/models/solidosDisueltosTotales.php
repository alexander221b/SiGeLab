<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SolidosDisueltosTotales extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'solidosdisueltostotales';
    $this->id = 'codigoInterno';
  }

  function registrarSolidosDisueltosTotales($dato) {
    $this->db->insert('solidosdisueltostotales', $dato);
  }

  function buscarSolidosDisueltosTotales($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('solidosdisueltostotales');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarSolidosDisueltosTotales($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('solidosdisueltostotales',$dato);
  }

   function eliminarSolidoDisueltoTotal($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('solidosdisueltostotales'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('solidosdisueltostotales');
        }
    }
}