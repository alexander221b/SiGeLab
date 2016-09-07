<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AcidezTotal extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'acideztotal';
    $this->id = 'codigoInterno';
  }

  function registrarAcidezTotal($dato) {
    $this->db->insert('acideztotal', $dato);
  }

  function buscarAcidezTotal($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('acidezTotal');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarAcidezTotal($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('acidezTotal',$dato);
  }

   function eliminarAcidezTotal($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('acideztotal'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('acideztotal');
        }
    }
}