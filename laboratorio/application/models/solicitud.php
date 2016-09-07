<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Solicitud extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'solicitudes';
    $this->id = 'id';
  }

  public function numeroSolicitudes()
  {
    $this->db->select_max('id');
    $solicitud = $this->db->get('solicitudes');
    
    foreach ($solicitud->result() as $row){
      $ultimoIdAgregado = $row->id;
    }

    return $ultimoIdAgregado;
    
  }

  function registrarSolicitud($dato) {
    $this->db->insert('Solicitudes', $dato);
  }

  function conseguirSolicitud($SolicitudesNo) {
    return $this->db->get_where($this->table, array('SolicitudesNo' => $SolicitudesNo,
                                                
                                                    )
                            )->row();
  }
  
  function buscarSolicitud($nitCc) {
    $this->db->where('nitCc', $nitCc);
    $this->db->order_by("id", "desc");
    $solicitud = $this->db->get('solicitudes');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

  function buscarSolicitudId($id) {
    $this->db->where('id', $id);
    $solicitud = $this->db->get('solicitudes');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

  function eliminarSolicitud($id){
    $this->db->where('id', $id);  
    $dato = $this->db->get('solicitudes'); 
    if ($dato->num_rows() > 0){
      $this->db->where('id', $id);
      $dato = $this->db->delete('solicitudes');
    } 
  }
  
  function actualizarSolicitud($id, $dato) {
    $this->db->where('id', $id);
    $this->db->update('solicitudes',$dato);

  }
  function conseguirSolicitudes() {
    $solicitud = $this->db->get('solicitudes');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }
  
}