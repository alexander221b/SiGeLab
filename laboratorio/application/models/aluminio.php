<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aluminio extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'aluminio';
    $this->id = 'codigoInterno';
  }

  function registrarAluminio($dato) {
    $this->db->insert('aluminio', $dato);
  }

  function buscarAluminio($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('aluminio');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarAluminio($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('aluminio',$dato);
  }

   function eliminarAluminio($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('aluminio'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('aluminio');
        }
    }
}