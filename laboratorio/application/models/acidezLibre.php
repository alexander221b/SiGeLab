<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AcidezLibre extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'acidezlibre';
    $this->id = 'codigoInterno';
  }

  function registrarAcidezLibre($dato) {
    $this->db->insert('acidezlibre', $dato);
  }

  function buscarAcidezLibre($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('acidezlibre');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarAcidezLibre($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('acidezlibre',$dato);
  }

   function eliminarAcidezLibre($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('acidezlibre'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('acidezlibre');
        }
    }
}