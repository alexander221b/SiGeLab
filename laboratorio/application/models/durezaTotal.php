<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DurezaTotal extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'durezaTotal';
    $this->id = 'codigoInterno';
  }

  function registrarDurezaTotal($dato) {
    $this->db->insert('durezaTotal', $dato);
  }

  function buscarDurezaTotal($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('durezaTotal');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarDurezaTotal($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('durezaTotal',$dato);
  }

   function eliminarDurezaTotal($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('durezatotal'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('durezatotal');
        }
    }
}