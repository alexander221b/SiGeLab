<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bicarbonatos extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'bicarbonatos';
    $this->id = 'codigoInterno';
  }

  function registrarBicarbonatos($dato) {
    $this->db->insert('bicarbonatos', $dato);
  }

  function buscarBicarbonatos($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('bicarbonatos');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarBicarbonatos($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('bicarbonatos',$dato);

  }

   function eliminarBicarbonato($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('bicarbonatos'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('bicarbonatos');
        }
    }

}