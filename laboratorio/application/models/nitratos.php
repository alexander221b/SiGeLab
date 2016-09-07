<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nitratos extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'nitratos';
    $this->id = 'codigoInterno';
  }

  function registrarNitratos($dato) {
    $this->db->insert('nitratos', $dato);
  }

  function buscarNitratos($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('nitratos');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarNitratos($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('nitratos',$dato);
  }

   function eliminarNitrato($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('nitratos'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('nitratos');
        }
    }
}