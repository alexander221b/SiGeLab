<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SolidosSedimentables extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'solidossedimentables';
    $this->id = 'codigoInterno';
  }

  function registrarSolidosSedimentables($dato) {
    $this->db->insert('solidossedimentables', $dato);
  }

  function buscarSolidosSedimentables($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('solidossedimentables');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarSolidosSedimentables($codigoInterno,$dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('solidossedimentables',$dato);
  }

   function eliminarSolidoSedimentable($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('solidossedimentables'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('solidossedimentables');
        }
    }
}