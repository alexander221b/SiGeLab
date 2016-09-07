<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Model {

	protected $table;
	protected $id;
	
	/*
		Constructor del modelo, aqui establecemos
		que tabla utilizamos y cual es su llave primaria.
	*/
	function __construct() {
		parent::__construct();
		$this->table = 'administrador';
		$this->id = 'nombre';
	}

    function conseguirAdministrador($nombre, $contrasena) {
		return $this->db->get_where(
			                         $this->table, array(
				                                          'nombre' => $nombre,
				                                          'contrasena' => $contrasena
			                                            )
		                            )->row();

	}
}