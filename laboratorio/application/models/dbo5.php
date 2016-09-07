<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dbo5 extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'dbo5';
    $this->id = 'codigoInterno';
  }

  function registrarDbo5($dato) {
    $this->db->insert('dbo5', $dato);
  }

  function buscarDbo5($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('dbo5');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarDbo5($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('dbo5',$dato);
  }

   function eliminarDbo5($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('dbo5'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('dbo5');
        }
    }
}