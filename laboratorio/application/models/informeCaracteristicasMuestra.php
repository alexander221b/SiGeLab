<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InformeCaracteristicasMuestra extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'informeCaracteristicasMuestra';
    $this->id = 'cotizacionNo';
  }

  function registrarInformeCaracteristicasMuestra($dato) {
    $this->db->insert('informeCaracteristicasMuestra', $dato);
  }

  
  function buscarInformeCaracteristicasMuestra($CotizacionNo) {
    $this->db->where('cotizacionNo', $CotizacionNo);
    $solicitud = $this->db->get('InformeCaracteristicasMuestra');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

  function eliminarInformeCaracteristicasMuestra($id){
    $this->db->where('id', $id);  
    $dato = $this->db->get('InformeCaracteristicasMuestra'); 
    if ($dato->num_rows() > 0){
      $this->db->where('id', $id);
      $dato = $this->db->delete('InformeCaracteristicasMuestra');
    } 
  }
  
  function actualizarInformeCaracteristicasMuestra($id, $dato) {
    $this->db->where('id', $id);
    $this->db->update('InformeCaracteristicasMuestra',$dato);

  }

}