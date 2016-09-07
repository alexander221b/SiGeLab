<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Model {
  protected $table;
  protected $id;
  /*Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria*/
  function __construct() {
    parent::__construct();
    $this->table = 'usuarios';
    $this->id = 'nombre';
  }

  function conseguirUsuario($nombre, $contrasena) {
    return $this->db->get_where($this->table, array('nombre' => $nombre,
				                                            'contrasena' => $contrasena
			                                              )
		                        )->row();
  }

  function conseguirUsuarioCorreo($correo) {
    return $this->db->get_where($this->table, array('nombre' => $correo,
                                                    )
                            )->row();
  }

  function registrarUsuario($dato) {
    /*Se insertan los datos del usuario en la tabla "usuarios"*/
    $this->db->insert('usuarios', $dato);
  }

  
}