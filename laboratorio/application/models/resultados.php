<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resultados extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'resultados';
    $this->id = 'id';
  }

  function registrarResultado($dato) {
    /**/
    $this->db->insert('resultados', $dato);
  }

  function buscarResultado($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->order_by("id", "desc");
    $solicitud = $this->db->get('resultados');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function eliminarResultado($codigoInterno, $analisis){
        $this->db->where('codigoInterno', $codigoInterno); 
        $this->db->where('analisis', $analisis);   
        $dato = $this->db->get('resultados'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $this->db->where('analisis', $analisis);
            $dato = $this->db->delete('resultados');
        }
    }

    function actualizarResultado($codigoInterno,$analisis, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->where('analisis', $analisis);
    $this->db->update('resultados',$dato);
  }
}