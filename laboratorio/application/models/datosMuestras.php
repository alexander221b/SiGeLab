<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DatosMuestras extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'datosmuestras';
    $this->id = 'cotizacionNo';
  }

  function registrarDatosMuestras($dato) {
    $this->db->insert('datosmuestras', $dato);
  }

  function actualizarMuestra($id, $dato) {
    $this->db->where('id', $id);
    $this->db->update('datosmuestras',$dato);
  }

  function eliminarMuestra($id){
        $this->db->where('id', $id);  
        $dato = $this->db->get('datosmuestras'); 
        if ($dato->num_rows() > 0){
            $this->db->where('id', $id);
            $dato = $this->db->delete('datosmuestras');
        }
    }

   function buscarMuestras($cotizacionNo) {
    $this->db->Where('cotizacionNo', $cotizacionNo); 
    $this->db->order_by("cotizacionNo", "desc");
    $solicitud = $this->db->get('datosmuestras');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

}