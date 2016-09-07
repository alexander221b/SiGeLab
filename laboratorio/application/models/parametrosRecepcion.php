<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ParametrosRecepcion extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'parametrosRecepcion';
    $this->id = 'cotizacionNo';
  }

  function registrarParametrosRecepcion($dato) {
    $this->db->insert('parametrosRecepcion', $dato);
  }

  
  function buscarParametros($CotizacionNo) {
    $this->db->where('cotizacionNo', $CotizacionNo);
    $this->db->order_by("cotizacionNo", "desc");
    $solicitud = $this->db->get('parametrosrecepcion');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

  function eliminarParametrosRecepcion($id){
    $this->db->where('id', $id);  
    $dato = $this->db->get('parametrosrecepcion'); 
    if ($dato->num_rows() > 0){
      $this->db->where('id', $id);
      $dato = $this->db->delete('parametrosrecepcion');
    } 
  }
  
  function actualizarParametrosRecepcion($id, $dato) {
    $this->db->where('id', $id);
    $this->db->update('parametrosrecepcion',$dato);
  }


  
}