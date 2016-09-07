<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hidroxidos extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'hidroxidos';
    $this->id = 'codigoInterno';
  }

  function registrarHidroxidos($dato) {
    $this->db->insert('hidroxidos', $dato);
  }

  function buscarHidroxidos($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('hidroxidos');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarHidroxidos($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('hidroxidos',$dato);

  }

   function eliminarHidroxido($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('hidroxidos'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('hidroxidos');
        }
    }

}