<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DurezaCalcicaMagnesica extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'durezacalcicamagnesica';
    $this->id = 'codigoInterno';
  }

  function registrarDurezaCalcicaMagnesica($dato) {
    $this->db->insert('durezacalcicamagnesica', $dato);
  }

  function buscarDurezaCalcicaMagnesica($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('durezaCalcicaMagnesica');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarDurezaCalcicaMagnesica($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('durezaCalcicaMagnesica',$dato);
  }
  
   function eliminarDurezaCalcicaMagnesica($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('durezacalcicamagnesica'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('durezacalcicamagnesica');
        }
    }
}