<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SolidosInsolubles extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'solidosinsolubles';
    $this->id = 'codigoInterno';
  }

  function registrarSolidosInsolubles($dato) {
    $this->db->insert('solidosinsolubles', $dato);
  }

  function buscarSolidosInsolubles($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('solidosinsolubles');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarSolidosInsolubles($codigoInterno,$dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('solidosinsolubles',$dato);
  }

   function eliminarSolidoInsoluble($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('solidosinsolubles'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('solidosinsolubles');
        }
    }
}