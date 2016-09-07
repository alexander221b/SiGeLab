<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recepcion extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'recepcion';
    $this->id = 'cotizacionNo';
  }

  function registrarRecepcion($dato) {
    $this->db->insert('recepcion', $dato);
  }

  function conseguirRecepcion($cotizacionNo) {
    return $this->db->get_where($this->table, array('cotizacionNo' => $cotizacionNo,
                                                
                                                    )
                            )->row();
  }
  
  function buscarRecepcion($cotizacionNoCodigoInterno) {
    $this->db->where('codigoInterno', $cotizacionNoCodigoInterno);
    $this->db->or_where('cotizacionNo', $cotizacionNoCodigoInterno); 
    $this->db->order_by("cotizacionNo", "desc");
    $solicitud = $this->db->get('recepcion');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

  function eliminarRecepcion($cotizacionNo){
    $this->db->where('cotizacionNo', $cotizacionNo);  
    $dato = $this->db->get('recepcion'); 
    if ($dato->num_rows() > 0){
      $this->db->where('cotizacionNo', $cotizacionNo);
      $dato = $this->db->delete('recepcion');
    } 
  }
  
  function actualizarRecepcion($cotizacionNo, $dato) {
    $this->db->where('cotizacionNo', $cotizacionNo);
    $this->db->update('recepcion',$dato);

  }

  function conseguirRecepciones() {
    $solicitud = $this->db->get('recepcion');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }
  
}