<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ExtractoSecoRm extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'extractosecorm';
    $this->id = 'codigoInterno';
  }

  function registrarExtractoSecoRm($dato) {
    $this->db->insert('extractosecorm', $dato);
  }

  function buscarExtractoSecoRm($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('extractosecorm');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarExtractoSecoRm($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('extractosecorm',$dato);
  }

   function eliminarExtractoSecoRm($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('extractosecorm'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('extractosecorm');
        }
    }
}