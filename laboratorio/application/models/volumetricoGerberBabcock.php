<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VolumetricoGerberBabcock extends CI_Model {
  protected $table;
  protected $id;
  /* 
     Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria
  */
  function __construct() {
    parent::__construct();
    $this->table = 'volumetricogerberbabcock';
    $this->id = 'codigoInterno';
  }

  function registrarVolumetricoGerberBabcock($dato) {
    $this->db->insert('volumetricogerberbabcock', $dato);
  }

  function buscarVolumetricoGerberBabcock($codigoInterno) {
    $this->db->where('codigoInterno', $codigoInterno);
    $solicitud = $this->db->get('volumetricogerberbabcock');
    if($solicitud->num_rows()>0){
      return $solicitud;
    }
    else {
      return FALSE;
    }
  }

   function actualizarVolumetricoGerberBabcock($codigoInterno, $dato) {
    $this->db->where('codigoInterno', $codigoInterno);
    $this->db->update('volumetricogerberbabcock',$dato);
  }

   function eliminarVolumetricoGerberBabcock($codigoInterno){
        $this->db->where('codigoInterno', $codigoInterno);  
        $dato = $this->db->get('volumetricogerberbabcock'); 
        if ($dato->num_rows() > 0){
            $this->db->where('codigoInterno', $codigoInterno);
            $dato = $this->db->delete('volumetricogerberbabcock');
        }
    }
}