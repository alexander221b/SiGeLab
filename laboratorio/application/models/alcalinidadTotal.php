<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AlcalinidadTotal extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'alcalinidadtotal';
    $this->id = 'codigoInterno';
  }

  function registrarAlcalinidadTotal($dato) {
    $this->db->insert('alcalinidadtotal', $dato);
  }

 function buscarAlcalinidadTotal($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('alcalinidadtotal');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

  function actualizarAlcalinidadTotal($codigoInterno,$dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('alcalinidadtotal',$dato);

  }

   function eliminarAlcalinidadTotal($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('alcalinidadtotal'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('alcalinidadtotal');
        }
    }
}