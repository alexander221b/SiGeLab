<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividades extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'actividades';
    $this->id = 'id';
  }

  function registrarActividad($actividad, $nombreId, $codigo, $usuario, $fecha) {
     $datos = array(
                    "actividad" => $actividad,
                    "nombreId" => $nombreId,
                    "codigo" => $codigo,
                    "usuario"  => $usuario,
                    "fecha"  => $fecha
                   );
    $this->db->insert('actividades', $datos);
  }
  
  function conseguirActividades() {
    $this->db->order_by("id", "desc");
    $solicitud = $this->db->get('actividades');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }
  
}