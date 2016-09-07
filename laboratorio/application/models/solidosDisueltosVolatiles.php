<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SolidosDisueltosVolatiles extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'solidosdisueltosvolatiles';
    $this->id = 'codigoInterno';
  }

  function registrarSolidosDisueltosVolatiles($dato) {
    $this->db->insert('solidosdisueltosvolatiles', $dato);
  }

  function buscarSolidosDisueltosVolatiles($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno); 
    $solicitud = $this->db->get('solidosdisueltosvolatiles');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarSolidosDisueltosVolatiles($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('solidosdisueltosvolatiles',$dato);
  }

   function eliminarSolidoDisueltoVolatil($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('solidosdisueltosvolatiles'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('solidosdisueltosvolatiles');
        }
    }
}