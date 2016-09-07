<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sulfatos extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'sulfatos';
    $this->id = 'codigoInterno';
  }

  function registrarSulfatos($dato) {
    $this->db->insert('sulfatos', $dato);
  }

  function buscarSulfatos($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('sulfatos');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarSulfatos($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('sulfatos',$dato);

  }

   function eliminarSulfato($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('sulfatos'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('sulfatos');
        }
    }

}