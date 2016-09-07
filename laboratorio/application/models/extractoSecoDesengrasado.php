<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ExtractoSecoDesengrasado extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'extractosecodesengrasado';
    $this->id = 'codigoInterno';
  }

  function registrarExtractoSecoDesengrasado($dato) {
    $this->db->insert('extractosecodesengrasado', $dato);
  }

  function buscarExtractoSecoDesengrasado($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('extractosecodesengrasado');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarExtractoSecoDesengrasado($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('extractosecodesengrasado',$dato);
  }

   function eliminarExtractoSecoDesengrasado($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('extractosecodesengrasado'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('extractosecodesengrasado');
        }
    }
}