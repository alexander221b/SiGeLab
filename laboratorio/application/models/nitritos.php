<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nitritos extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'nitritos';
    $this->id = 'codigoInterno';
  }

  function registrarNitritos($dato) {
    $this->db->insert('nitritos', $dato);
  }

  function buscarNitritos($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('nitritos');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarNitritos($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('nitritos',$dato);

  }

   function eliminarNitrito($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('nitritos'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('nitritos');
        }
    }
}