<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ExtraccionSoxhlet extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'extraccionsoxhlet';
    $this->id = 'codigoInterno';
  }

  function registrarExtraccionSoxhlet($dato) {
    $this->db->insert('extraccionsoxhlet', $dato);
  }

  function buscarExtraccionSoxhlet($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('extraccionsoxhlet');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarExtraccionSoxhlet($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('extraccionsoxhlet',$dato);
  }

   function eliminarExtraccionSoxhlet($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('extraccionsoxhlet'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('extraccionsoxhlet');
        }
    }
}