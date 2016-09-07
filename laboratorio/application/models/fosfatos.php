<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fosfatos extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'fosfatos';
    $this->id = 'codigoInterno';
  }

  function registrarFosfatos($dato) {
    $this->db->insert('fosfatos', $dato);
  }

  function buscarFosfatos($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('fosfatos');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarFosfatos($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('fosfatos',$dato);
  }

   function eliminarFosfato($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('fosfatos'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('fosfatos');
        }
    }
}