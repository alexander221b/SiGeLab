<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ExtractoSecoTotal extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'extractosecototal';
    $this->id = 'codigoInterno';
  }

  function registrarExtractoSecoTotal($dato) {
    $this->db->insert('extractosecototal', $dato);
  }

  function buscarExtractoSecoTotal($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('extractosecototal');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarExtractoSecoTotal($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('extractosecototal',$dato);
  }

   function eliminarExtractoSecoTotal($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('extractosecototal'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('extractosecototal');
        }
    }
}