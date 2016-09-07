<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CloroResidual extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'cloroResidual';
    $this->id = 'codigoInterno';
  }

  function registrarCloroResidual($dato) {
    $this->db->insert('cloroResidual', $dato);
  }

  function buscarCloroResidual($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('cloroResidual');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarCloroResidual($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('clororesidual',$dato);
  }

   function eliminarCloroResidual($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('clororesidual'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('clororesidual');
        }
    }
}