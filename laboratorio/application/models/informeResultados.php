<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InformeResultados extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'informeResultados';
    $this->id = 'cotizacionNo';
  }

  function registrarInformeResultados($dato) {
    $this->db->insert('informeResultados', $dato);
  }
  
  function buscarInformeResultados($CotizacionNo) {
    $this->db->where('cotizacionNo', $CotizacionNo);
    $solicitud = $this->db->get('InformeResultados');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

  function eliminarInformeResultados($id){
    $this->db->where('id', $id);  
    $dato = $this->db->get('InformeResultados'); 
    if ($dato->num_rows() > 0){
      $this->db->where('id', $id);
      $dato = $this->db->delete('InformeResultados');
    } 
  }
  
  function actualizarInformeResultados($id, $dato) {
    $this->db->where('id', $id);
    $this->db->update('InformeResultados',$dato);

  }
  
  
}