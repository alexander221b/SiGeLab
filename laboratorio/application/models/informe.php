<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informe extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'informe';
    $this->id = 'cotizacionNo';
  }

  function registrarInforme($dato) {
    $this->db->insert('informe', $dato);
  }

  function conseguirInforme($cotizacionNo) {
    return $this->db->get_where($this->table, array('cotizacionNo' => $cotizacionNo,
                                                
                                                    )
                            )->row();
  }
  
  function buscarInforme($cotizacionNoNitCc) {
    $this->db->where('cotizacionNo', $cotizacionNoNitCc); 
    $this->db->or_where('nitCc', $cotizacionNoNitCc) ;
    $this->db->order_by("cotizacionNo", "desc");
    $solicitud = $this->db->get('informe');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

  function eliminarInforme($cotizacionNo){
    $this->db->where('cotizacionNo', $cotizacionNo);  
    $dato = $this->db->get('informe'); 
    if ($dato->num_rows() > 0){
      $this->db->where('cotizacionNo', $cotizacionNo);
      $dato = $this->db->delete('informe');
    } 
  }
  
  function actualizarInforme($cotizacionNo, $dato) {
    $this->db->where('cotizacionNo', $cotizacionNo);
    $this->db->update('informe',$dato);

  }

  function conseguirInformes() {
    $solicitud = $this->db->get('informe');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }
  
}