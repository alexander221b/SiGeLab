<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cotizacion extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'cotizacion';
    $this->id = 'cotizacionNo';
  }

  function registrarCotizacion($dato) {
    $this->db->insert('cotizacion', $dato);
  }

  function conseguirCotizacion($cotizacionNo) {
    return $this->db->get_where($this->table, array('cotizacionNo' => $cotizacionNo,
                                                
                                                    )
                            )->row();
  }
  
  function buscarCotizacion($nitCcCotizacionNo) {
    $this->db->where('nitCc', $nitCcCotizacionNo);
    $this->db->or_where('cotizacionNo', $nitCcCotizacionNo); 
    $this->db->order_by("cotizacionNo", "desc");
    $solicitud = $this->db->get('cotizacion');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

  function eliminarCotizacion($cotizacionNo){
    $this->db->where('cotizacionNo', $cotizacionNo);  
    $dato = $this->db->get('cotizacion'); 
    if ($dato->num_rows() > 0){
      $this->db->where('cotizacionNo', $cotizacionNo);
      $dato = $this->db->delete('cotizacion');
    } 
  }
  
  function actualizarCotizacion($cotizacionNo, $dato) {
    $this->db->where('cotizacionNo', $cotizacionNo);
    $this->db->update('cotizacion',$dato);

  }
  function conseguirCotizaciones() {
    $solicitud = $this->db->get('cotizacion');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }
  
  function numeroCotizaciones(){

    $this->db->select_max('id');
    $solicitud = $this->db->get('cotizacion');
    
    foreach ($solicitud->result() as $row){
      $ultimoIdAgregado = $row->id;
    }

    return $ultimoIdAgregado;
  }
}