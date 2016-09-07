<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DatosMuestraRecepcion extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'datosmuestrarecepcion';
    $this->id = 'cotizacionNo';
  }

  function registrarDatosMuestraRecepcion($dato) {
    $this->db->insert('datosmuestrarecepcion', $dato);
  }

  function conseguirCotizacion($cotizacionNo) {
    return $this->db->get_where($this->table, array('cotizacionNo' => $cotizacionNo,
                                                
                                                    )
                            )->row();
  }
  
  function buscarMuestras($CotizacionNo) {
    $this->db->where('cotizacionNo', $CotizacionNo);
    $solicitud = $this->db->get('datosmuestrarecepcion');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

  function eliminarDatosMuestraRecepcion($id){
    $this->db->where('id', $id);  
    $dato = $this->db->get('datosmuestrarecepcion'); 
    if ($dato->num_rows() > 0){
      $this->db->where('id', $id);
      $dato = $this->db->delete('datosmuestrarecepcion');
    } 
  }
  
  function actualizarDatosMuestraRecepcion($id, $dato) {
    $this->db->where('id', $id);
    $this->db->update('datosmuestrarecepcion',$dato);

  }

  
}