<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SolidosSuspendidosVolatiles extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'solidossuspendidosvolatiles';
    $this->id = 'codigoInterno';
  }

  function registrarSolidosSuspendidosVolatiles($dato) {
    $this->db->insert('solidossuspendidosvolatiles', $dato);
  }

  function buscarSolidosSuspendidosVolatiles($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('solidossuspendidosvolatiles');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarSolidosSuspendidosVolatiles($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('solidossuspendidosvolatiles',$dato);
  }

   function eliminarSolidoSuspendidoVolatil($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('solidossuspendidosvolatiles'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('solidossuspendidosvolatiles');
        }
    }
}