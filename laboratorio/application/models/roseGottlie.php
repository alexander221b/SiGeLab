<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RoseGottlie extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'rosegottlie';
    $this->id = 'codigoInterno';
  }

  function registrarRoseGottlie($dato) {
    $this->db->insert('rosegottlie', $dato);
  }

  function buscarRoseGottlie($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('rosegottlie');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarRoseGottlie($codigoInterno,$dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('rosegottlie',$dato);
  }

   function eliminarRoseGottlie($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('rosegottlie'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('rosegottlie');
        }
    }
}