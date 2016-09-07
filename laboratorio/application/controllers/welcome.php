<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

/*El nombre del archivo debe coincidir con el nombre de la clase del controlador, en este caso "welcome"*/
class Welcome extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->library('email');
  }
  


	/*Primera función en ejecutarse, carga la página de inicio "logueo.php" en "views"*/
	public function index($offset=0) {
    if($this->session->userdata('estadoSesion')) {
      $this->load->library('table');
      $this->load->library('pagination');
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->database(); //load library database

      // Config setup
      $numeroFilas = $this->db->count_all("actividades");
      $config['base_url'] = base_url().'index.php/welcome/inicio';
      $config['total_rows'] =  $numeroFilas;
      $config['per_page'] = 10;
      $config['num_links'] =  $numeroFilas;
      $config['use_page_numbers'] = FALSE;
      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';
      $config['prev_link'] = '&laquo;';
      $config['prev_tag_open'] = '<li>';
      $config['prev_tag_close'] = '</li>';
      $config['next_tag_open'] = '<li>';
      $config['next_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $config['next_link'] = '&raquo;';

      $this->pagination->initialize($config);

      $this->db->select('id, actividad, usuario, fecha');
      $this->db->order_by("id", "desc");
      $data['actividades'] = $this->db->get('actividades', $config['per_page'], $offset);// take record of the table

      $header = array ('#', 'Actividad','Usuario','Fecha',); // create table header
      $tmpl = array ( 'table_open' => '<table class="table table-condensed table-hover ">' );

      $this->table->set_template($tmpl);
      $this->table->set_heading($header);

      $solicitud = $this->actividades->conseguirActividades();

      if($solicitud == FALSE) {
        $data['noExistenActividades'] = "No Existen Actividades";
      } 

    $this->load->view('inicio', $data);
   } else {
    $this->load->view('logueo');
   } 
	}

  public function actualizarSolicitud(){
    if($this->session->userdata('estadoSesion')) {
   $datosActualizacion = array(
                           "fecha" => $this->input->post('fecha'),
                           "razonSocial" => $this->input->post('razonSocial'),
                           "nitCc" => $this->input->post('nitCc'),
                           "solicitante" => $this->input->post('solicitante'),
                           "cargo" => $this->input->post('cargo'),
                           "direccion" => $this->input->post('direccion'),
                           "telefonoFax" => $this->input->post('telefonoFax'),
                           "municipioDepartamento" => $this->input->post('municipioDepartamento'),
                           "correoElectronico" => $this->input->post('correoElectronico'),
                           "numeroMuestras" => $this->input->post('numeroMuestras'),
                           "tipoMuestras" => $this->input->post('tipoMuestras'),
                           "parametros" => $this->input->post('parametros'),
                           "observaciones" => $this->input->post('observaciones'),
                           "cotizacionElaboradaPor" => $this->input->post('cotizacionElaboradaPor')
                          );
    $this->solicitud->actualizarSolicitud($this->input->post('id'), $datosActualizacion);
    $this->actividades->registrarActividad('Solicitud Actualizada', 'Id', $this->input->post('id'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    
    $data = array(
                  'solicitud' => $this->solicitud->buscarSolicitudId($this->input->post('id')),
                  'solicitudActualizada' => $this->input->post('id')
            );

     $this->load->view('editarSolicitud', $data);
     } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }

  }

  public function editarSolicitud($id) {
    if ($this->session->userdata('estadoSesion')) {
      $data = array(
                  'solicitud' => $this->solicitud->buscarSolicitudId($id)
            );
    
      $this->load->view('editarSolicitud', $data);
    }
    else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }

   public function verSolicitud($id) {
    if($this->session->userdata('estadoSesion')) {
    $data = array(
              'solicitud' => $this->solicitud->buscarSolicitudId($id)      
            );

    $this->load->view('verSolicitud', $data);
    } else {
    Echo"Inicie sesion para ver la informacion";
   } 
  }

   public function eliminarSolicitud($id, $offset = 0) {
  if($this->session->userdata('estadoSesion')) {
    $this->solicitud->eliminarSolicitud($id);
    $this->actividades->registrarActividad('Solicitud Eliminada', 'Id', $id, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

    $this->load->library('table');
    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->database(); //load library database

    // Config setup
    $numeroFilas=$this->db->count_all("solicitudes");
    $config['base_url'] = base_url().'index.php/welcome/cargarConsultarSolicitud';
    $config['total_rows'] = $numeroFilas+1;
    $config['per_page'] = 10;
    $config['num_links'] = $numeroFilas+1;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';

    $this->pagination->initialize($config);

    $this->db->select('id, nitCc, fecha, solicitante, operacion');
    $this->db->order_by("id", "desc");
    $data['solicitudes'] = $this->db->get('solicitudes', $config['per_page'], $offset);// take record of the table

    $header = array ('#', 'Nit/CC','Fecha','Solicitante', 'Operación'); // create table header
    $tmpl = array ( 'table_open' => '<table class="table table-bordered table-condensed table-hover">' );

    $this->table->set_template($tmpl);
    $this->table->set_heading($header);

    $solicitud = $this->solicitud->conseguirSolicitudes();

    if($solicitud == FALSE) {
      $data['noExisteSolicitud'] = "No Existen Solicitudes";
    } 

    $data['solicitudEliminada'] = $id;

    $this->load->view('consultarSolicitudes', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function buscarSolicitud() {
    if($this->session->userdata('estadoSesion')) {

    $data = array(
           'resultadoBusqueda' => $this->solicitud->buscarSolicitud($this->input->post('nitCc'))
           );
    
    if($data['resultadoBusqueda'] == FALSE) {
      $data['solicitudNoEncontrada'] = $this->input->post('nitCc');
    }
    
    $this->load->view('consultarSolicitudes', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function cargarConsultarSolicitud($offset=0){
    if ($this->session->userdata('estadoSesion')) {
    $this->load->library('table');
    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->database(); //load library database

    // Config setup
    $numeroFilas = $this->db->count_all("solicitudes");
    $config['base_url'] = base_url().'index.php/welcome/cargarConsultarSolicitud';
    $config['total_rows'] = $numeroFilas;
    $config['per_page'] = 10;
    $config['num_links'] = $numeroFilas;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';

    $this->pagination->initialize($config);

    $this->db->select('id, nitCc, fecha, solicitante, operacion');
    $this->db->order_by("id", "desc");
    $data['solicitudes'] = $this->db->get('solicitudes', $config['per_page'], $offset);// take record of the table

    $header = array ('#', 'Nit/CC','Fecha','Solicitante', 'Operación'); // create table header
    $tmpl = array ( 'table_open' => '<table class="table table-condensed table-hover ">' );

    $this->table->set_template($tmpl);
    $this->table->set_heading($header);

    if($numeroFilas == 0) {
      $data['noExisteSolicitud'] = "No existen Solicitudes";
    }

    $this->load->view('consultarSolicitudes',$data);
    }
    else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }

  public function registrarSolicitud(){
  if($this->session->userdata('estadoSesion')) {
    $id=$this->solicitud->numeroSolicitudes()+1;

    /* Crea los links para borrar, editar y ver*/
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verSolicitud/'.$id.'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarSolicitud/'.$id , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarSolicitud/'.$id.'" class="confirmacion" >Eliminar </a>';
    $links .= anchor('welcome/cargarCotizacionSolicitud/'.$this->input->post('nitCc') , ' Cargar Cotización');
    $datosRegistro = array(
                           "id" => $id,
                           "fecha" => $this->input->post('fecha'),
                           "razonSocial" => $this->input->post('razonSocial'),
                           "nitCc" => $this->input->post('nitCc'),
                           "solicitante" => $this->input->post('solicitante'),
                           "cargo" => $this->input->post('cargo'),
                           "direccion" => $this->input->post('direccion'),
                           "telefonoFax" => $this->input->post('telefonoFax'),
                           "municipioDepartamento" => $this->input->post('municipioDepartamento'),
                           "correoElectronico" => $this->input->post('correoElectronico'),
                           "numeroMuestras" => $this->input->post('numeroMuestras'),
                           "tipoMuestras" => $this->input->post('tipoMuestras'),
                           "parametros" => $this->input->post('parametros'),
                           "observaciones" => $this->input->post('observaciones'),
                           "cotizacionElaboradaPor" => $this->input->post('cotizacionElaboradaPor'),
                           "operacion" => $links
                          );

    $this->solicitud->registrarSolicitud($datosRegistro);
    $this->actividades->registrarActividad('Solicitud Registrada', 'Id', $id, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    
    $data['solicitudRegistrada'] = $id;

    $this->load->view('registrarSolicitud', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }

  }

  public function inicio($offset="0") {
    if ($this->session->userdata('estadoSesion')) {
      $this->load->library('table');
      $this->load->library('pagination');
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->database(); //load library database

      // Config setup
      $numeroFilas = $this->db->count_all("actividades");
      $config['base_url'] = base_url().'index.php/welcome/inicio';
      $config['total_rows'] =  $numeroFilas;
      $config['per_page'] = 10;
      $config['num_links'] =  $numeroFilas;
      $config['use_page_numbers'] = FALSE;
      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';
      $config['prev_link'] = '&laquo;';
      $config['prev_tag_open'] = '<li>';
      $config['prev_tag_close'] = '</li>';
      $config['next_tag_open'] = '<li>';
      $config['next_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $config['next_link'] = '&raquo;';

      $this->pagination->initialize($config);

      $this->db->select('id, actividad, nombreId, codigo, usuario, fecha');
      $this->db->order_by("id", "desc");
      $data['actividades'] = $this->db->get('actividades', $config['per_page'], $offset);// take record of the table

      $header = array ('#', 'Actividad','Nombre Código', 'Código', 'Usuario','Fecha',); // create table header
      $tmpl = array ( 'table_open' => '<table class="table table-condensed table-hover ">' );

      $this->table->set_template($tmpl);
      $this->table->set_heading($header);

      $solicitud = $this->actividades->conseguirActividades();

      if($solicitud == FALSE) {
        $data['noExistenActividades'] = "No Existen Actividades";
      } 

    $this->load->view('inicio', $data);
    }
    else{
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }

  }

  public function cerrarSesion(){
    $this->session->sess_destroy();
    $this->load->view('logueo');
  }

   public function cargarRegistrarSolicitud() {
    if ($this->session->userdata('estadoSesion')) {
      $this->load->view('registrarSolicitud');
    } 
    else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }

  }

  public function cargarRegistrarCotizacion() { 
    if ($this->session->userdata('estadoSesion')) {
      $data = array(
                  'year' => date('y'),
                  'numeroCotizaciones' => $this->cotizacion->numeroCotizaciones()+1,

            );
      $this->load->view('registrarCotizacion', $data);
    }
    else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }

  public function cargarCotizacionSolicitud($nitCc) { 
    if($this->session->userdata('estadoSesion')) {
    $data = array(
                  'year' => date('y'),
                  'numeroCotizaciones' => $this->cotizacion->numeroCotizaciones()+1,
                  'solicitud' => $this->solicitud->buscarSolicitud($nitCc)
            );
    $this->load->view('registrarCotizacion', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   } 
  }


  public function cargarCotizacionRecepcion($cotizacionNo) {
    if($this->session->userdata('estadoSesion')) {
    $data = array(
                  
                  'cotizacion' => $this->cotizacion->buscarCotizacion($cotizacionNo),
                  'datosMuestras' => $this->datosMuestras->buscarMuestras($cotizacionNo)
            );
    $this->load->view('registrarRecepcion', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }


  public function cargarRegistrarRecepcion() {
    if ($this->session->userdata('estadoSesion')) {
      $this->load->view('registrarRecepcion');
    }
    else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }

  public function cargarRegistrarResultados() {
    if ($this->session->userdata('estadoSesion')) {
      $this->load->view('registrarResultados');
    }
    else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }

  public function cargarCotizacionInforme($cotizacionNo) {
    if($this->session->userdata('estadoSesion')) {
    $data = array(
                  'informe' => $this->cotizacion->buscarCotizacion($cotizacionNo),
                   'datosMuestras' => $this->datosMuestras->buscarMuestras($cotizacionNo),
                   'recepcion' =>$this->recepcion->buscarRecepcion($cotizacionNo)
            );
    $this->load->view('registrarInforme', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   } 
  }

  public function cargarRegistrarInforme() {
    if ($this->session->userdata('estadoSesion')) {
      $this->load->view('registrarInforme'); 
    }
    else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }
  
   public function verInforme($cotizacionNo) {
    if($this->session->userdata('estadoSesion')) {
    $data = array(
                  'informe' => $this->informe->buscarInforme($cotizacionNo),
                  'informeCaracteristicasMuestra' => $this->informeCaracteristicasMuestra->buscarInformeCaracteristicasMuestra($cotizacionNo),
                  'informeResultados' => $this->informeResultados->buscarInformeResultados($cotizacionNo) 
            );
    
    $this->load->view('verInforme', $data);
    } else {
    Echo "Inicie sesion para ver la informacion";
   }
  }
   
   public function eliminarInforme($cotizacionNo, $offset = 0) {
    if($this->session->userdata('estadoSesion')) {
    $this->informe->eliminarInforme($cotizacionNo);
    $this->actividades->registrarActividad('Informe Eliminado', 'No. Cotización', $cotizacionNo,$this->session->userdata('usuario'), date('d-m-Y H:i:s'));

    $this->load->library('table');
    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->database(); //load library database

      // Config setup
    $numeroFilas = $this->db->count_all("recepcion");
    $config['base_url'] = base_url().'index.php/welcome/cargarConsultarInformes';
    $config['total_rows'] = $numeroFilas;
    $config['per_page'] = 10;
    $config['num_links'] = $numeroFilas;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';

    $this->pagination->initialize($config);

    $this->db->select('cotizacionNo, nitCc, fecha, solicitante, operacion');
    $this->db->order_by("cotizacionNo", "desc");
    $data['informes'] = $this->db->get('informe', $config['per_page'], $offset);// take record of the table

    $header = array ('Cotizacion No.', 'Nit/CC','Fecha','Solicitante', 'Operación'); // create table header
    $tmpl = array ( 'table_open' => '<table class="table table-bordered table-condensed table-hover ">' );

    $this->table->set_template($tmpl);
    $this->table->set_heading($header);

    $solicitud = $this->informe->conseguirInformes();

    if($solicitud == FALSE) {
      $data['noExisteInforme'] = "No existen informes";
    } 

    $data['informeEliminado'] = $cotizacionNo;

    $this->load->view('consultarInformes', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

   public function actualizarInforme() {
    if($this->session->userdata('estadoSesion')) {
    /* Se actualizan los datos de la recepción modificados */
    $datosRegistro = array(
                           "cotizacionNo" => $this->input->post('cotizacionNo'),
                           "fecha" => $this->input->post('fecha'),
                           "noPaginas" => $this->input->post('noPaginas'),
                           "razonSocial" => $this->input->post('razonSocial'),
                           "nitCc" => $this->input->post('nitCc'),
                           "solicitante" => $this->input->post('solicitante'),
                           "cargo" => $this->input->post('cargo'),
                           "direccion" => $this->input->post('direccion'),
                           "telefonoFax" => $this->input->post('telefonoFax'),
                           "municipioDpto" => $this->input->post('municipioDpto'),
                           "correoElectronico" => $this->input->post('correoElectronico'),
                           "lugarTomaMuestra" => $this->input->post('lugarTomaMuestra'),
                           "fechaTomaMuestra" => $this->input->post('fechaTomaMuestra'),
                           "muestraTomadaPor" => $this->input->post('muestraTomadaPor'),
                           "fechaRecepcionMuestra" => $this->input->post('fechaRecepcionMuestra')
                          );
    
    $this->informe->actualizarInforme($this->input->post('cotizacionNo'), $datosRegistro);

    /* Array enviado por PHP. Se debe decodifizar y deserializar*/
    $idsMuestras = unserialize(base64_decode($_POST['idsMuestras']));
   
    /* Se actualizan los datos de las muestras modificados */
    for ($i=0; $i < count($idsMuestras); $i++) { 
      $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "descripcion" => $this->input->post('descripcion'.$idsMuestras[$i]),
                                "tipo" => $this->input->post('tipo'.$idsMuestras[$i]),
                                "fechaToma" => $this->input->post('fechaToma'.$idsMuestras[$i]),
                                "horaToma" => $this->input->post('horaToma'.$idsMuestras[$i]),
                                "fechaHoraRecepcion" => $this->input->post('fechaHoraRecepcion'.$idsMuestras[$i]),
                                "codigoInterno" => $this->input->post('codigoInterno'.$idsMuestras[$i]),
                                "observaciones" => $this->input->post('observaciones'.$idsMuestras[$i])
                               );
      $this->informeCaracteristicasMuestra->actualizarInformeCaracteristicasMuestra($idsMuestras[$i], $datosRegistro);
    }

    /* los ids vienen en un array con formato x1,x2,x3...xn. Enviado por javaScript*/
    $idsMuestrasBorradasCadena = $_POST['idsMuestrasBorradas']; 
    /* Se crea un array con los datos separados. Uno por posición */
    $idsMuestrasBorradas = explode(",", $idsMuestrasBorradasCadena);  

    /* Se borran las muestras eliminadas*/
    for ($i=0; $i < count($idsMuestrasBorradas); $i++) { 
      $this->informeCaracteristicasMuestra->eliminarInformeCaracteristicasMuestra($idsMuestrasBorradas[$i]);
    }

    /* los ids vienen en un array con formato x1,x2,x3...xn. Enviado por javaScript*/
    $idsMuestrasCreadasCadena = $_POST['idsMuestrasCreadas']; 
    /* Se crea un array con los datos separados. Uno por posición */
    $idsMuestrasCreadas = explode(",", $idsMuestrasCreadasCadena);  

    /* Se agregan filas nuevas*/
    if (!empty($idsMuestrasCreadasCadena)) {
      for ($i=0; $i < count($idsMuestrasCreadas); $i++) { 
       $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "descripcion" => $this->input->post('descripcion'.$idsMuestrasCreadas[$i]),
                                "tipo" => $this->input->post('tipo'.$idsMuestrasCreadas[$i]),
                                "fechaToma" => $this->input->post('fechaToma'.$idsMuestrasCreadas[$i]),
                                "horaToma" => $this->input->post('horaToma'.$idsMuestrasCreadas[$i]),
                                "fechaHoraRecepcion" => $this->input->post('fechaHoraRecepcion'.$idsMuestrasCreadas[$i]),
                                "codigoInterno" => $this->input->post('codigoInterno'.$idsMuestrasCreadas[$i]),
                                "observaciones" => $this->input->post('observaciones'.$idsMuestrasCreadas[$i])
                               );
        $this->informeCaracteristicasMuestra->registrarInformeCaracteristicasMuestra($datosRegistro);
      } 
    }
    
    /* Array enviado por PHP. Se debe decodifizar y deserializar*/
    $idsMuestras2 = unserialize(base64_decode($_POST['idsMuestras2']));
    
    /* Se actualizan los datos de los parámetros modificados */
    for ($i=0; $i < count($idsMuestras2); $i++) { 
       $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "fechaEnsayo" => $this->input->post('fechaEnsayo'.$idsMuestras2[$i]),
                                "ensayo" => $this->input->post('ensayo'.$idsMuestras2[$i]),
                                "metodoUtilizado" => $this->input->post('metodoUtilizado'.$idsMuestras2[$i]),
                                "rangoPermitido" => $this->input->post('rangoPermitido'.$idsMuestras2[$i]),
                                "unidades" => $this->input->post('unidades'.$idsMuestras2[$i]),
                                "xxxXx" => $this->input->post('xxxXx'.$idsMuestras2[$i]),
                                "xxxXx1" => $this->input->post('xxxXx1'.$idsMuestras2[$i]),
                                "xxxXx11" => $this->input->post('xxxXx11'.$idsMuestras2[$i]),
                                "uExpa" => $this->input->post('uExpa'.$idsMuestras2[$i]),
                                "uExpa1" => $this->input->post('uExpa1'.$idsMuestras2[$i]),
                                "uExpa11" => $this->input->post('uExpa11'.$idsMuestras2[$i]) 
                               );
      $this->informeResultados->actualizarInformeResultados($idsMuestras2[$i], $datosRegistro);
    }

    /* los ids vienen en un array con formato x1,x2,x3...xn. Enviado por javaScript*/
    $idsMuestrasBorradasCadena2 = $_POST['idsMuestrasBorradas2']; 
    /* Se crea un array con los datos separados. Uno por posición */
    $idsMuestrasBorradas2 = explode(",", $idsMuestrasBorradasCadena2);  

    /* Se borran las muestras eliminadas*/
    for ($i=0; $i < count($idsMuestrasBorradas2); $i++) { 
      $this->informeResultados->eliminarInformeResultados($idsMuestrasBorradas2[$i]);
    }

    /* los ids vienen en un array con formato x1,x2,x3...xn. Enviado por javaScript*/
    $idsMuestrasCreadasCadena2 = $_POST['idsMuestrasCreadas2']; 
    /* Se crea un array con los datos separados. Uno por posición */
    $idsMuestrasCreadas2 = explode(",", $idsMuestrasCreadasCadena2);  
    
    /* Se agregan filas nuevas*/
    if (!empty($idsMuestrasCreadasCadena2)) {
      for ($i=0; $i < count($idsMuestrasCreadas2); $i++) { 
         $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "fechaEnsayo" => $this->input->post('fechaEnsayo'.$idsMuestrasCreadas2[$i]),
                                "ensayo" => $this->input->post('ensayo'.$idsMuestrasCreadas2[$i]),
                                "metodoUtilizado" => $this->input->post('metodoUtilizado'.$idsMuestrasCreadas2[$i]),
                                "rangoPermitido" => $this->input->post('rangoPermitido'.$idsMuestrasCreadas2[$i]),
                                "unidades" => $this->input->post('unidades'.$idsMuestrasCreadas2[$i]),
                                "xxxXx" => $this->input->post('xxxXx'.$idsMuestrasCreadas2[$i]),
                                "xxxXx1" => $this->input->post('xxxXx1'.$idsMuestrasCreadas2[$i]),
                                "xxxXx11" => $this->input->post('xxxXx11'.$idsMuestrasCreadas2[$i]),
                                "uExpa" => $this->input->post('uExpa'.$idsMuestrasCreadas2[$i]),
                                "uExpa1" => $this->input->post('uExpa1'.$idsMuestrasCreadas2[$i]),
                                "uExpa11" => $this->input->post('uExpa11'.$idsMuestrasCreadas2[$i]) 
                               );
        $this->informeResultados->registrarInformeResultados($datosRegistro);
      } 
    }


      $data = array(
                  'informe' => $this->informe->buscarInforme($this->input->post('cotizacionNo')),
                  'informeCaracteristicasMuestra' => $this->informeCaracteristicasMuestra->buscarInformeCaracteristicasMuestra($this->input->post('cotizacionNo')),
                  'informeResultados' => $this->informeResultados->buscarInformeResultados($this->input->post('cotizacionNo')),
                  'actualizado' => $this->input->post('cotizacionNo')
            );
    
    $this->actividades->registrarActividad('Informe Actualizado', 'No. Cotización', $this->input->post('cotizacionNo'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $this->load->view('editarInforme', $data);
    
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
    
  }

 
   public function editarInforme($cotizacionNo) {
    if ($this->session->userdata('estadoSesion')) {
      $data = array(
                  'informe' => $this->informe->buscarInforme($cotizacionNo),
                  'informeCaracteristicasMuestra' => $this->informeCaracteristicasMuestra->buscarInformeCaracteristicasMuestra($cotizacionNo),
                  'informeResultados' => $this->informeResultados->buscarInformeResultados($cotizacionNo)
            );
    
      $this->load->view('editarInforme', $data);
    }
    else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }
   


    public function buscarInforme($offset=0) {
      if($this->session->userdata('estadoSesion')) {
    $data = array(
           'resultadoBusqueda' => $this->informe->buscarInforme($this->input->post('CotizacionNoNitCc'))
           );
    

    if($data['resultadoBusqueda'] == FALSE) {
      $data['informeNoEncontrado'] = $this->input->post('CotizacionNoNitCc');
    }
    
    $this->load->view('consultarInformes', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function cargarConsultarInformes($offset = 0) {
    if ($this->session->userdata('estadoSesion')) {
  if ($this->session->userdata('estadoSesion')) {
    $this->load->library('table');
    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->database(); //load library database

    // Config setup
    $numeroFilas = $this->db->count_all("informe");
    $config['base_url'] = base_url().'index.php/welcome/cargarConsultarInformes';
    $config['total_rows'] = $numeroFilas;
    $config['per_page'] = 10;
    $config['num_links'] = $numeroFilas;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';

    $this->pagination->initialize($config);

    $this->db->select('cotizacionNo, nitCc, fecha, solicitante, operacion');
    $this->db->order_by("cotizacionNo", "desc");
    $data['informes'] = $this->db->get('informe', $config['per_page'], $offset);// take record of the table

    $header = array ('Cotizacion No.', 'Nit/CC','Fecha','Solicitante', 'Operación'); // create table header
    $tmpl = array ( 'table_open' => '<table class="table table-bordered table-condensed table-hover ">' );

    $this->table->set_template($tmpl);
    $this->table->set_heading($header);

    if($numeroFilas == 0) {
      $data['noExisteInforme'] = "No existen Informes";
    }

    $this->load->view('consultarInformes',$data);
  }
  else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }
 else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }

  public function registrarInforme(){
  if($this->session->userdata('estadoSesion')) {
     $existeInforme = $this->informe->conseguirInforme($_POST['cotizacionNo']);
    if($existeInforme) {
      $mensajeError['existeInforme'] = $_POST['cotizacionNo'];
      $this->load->view('registrarInforme', $mensajeError);
    }
    else {
      /* Crea los links para borrar, editar y ver*/
      $links = '<a class="ask" href="//localhost/laboratorio/index.php/welcome/verInforme/'.$this->input->post('cotizacionNo').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
      $links .= anchor('welcome/EditarInforme/'.$this->input->post('cotizacionNo') , 'Editar ');
      $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarInforme/'.$this->input->post('cotizacionNo').'" class="confirmacion" >Eliminar </a>';
      $datosRegistro = array(
                           "cotizacionNo" => $this->input->post('cotizacionNo'),
                           "fecha" => $this->input->post('fecha'),
                           "noPaginas" => $this->input->post('noPaginas'),
                           "razonSocial" => $this->input->post('razonSocial'),
                           "nitCc" => $this->input->post('nitCc'),
                           "solicitante" => $this->input->post('solicitante'),
                           "cargo" => $this->input->post('cargo'),
                           "direccion" => $this->input->post('direccion'),
                           "telefonoFax" => $this->input->post('telefonoFax'),
                           "municipioDpto" => $this->input->post('municipioDpto'),
                           "correoElectronico" => $this->input->post('correoElectronico'),
                           "lugarTomaMuestra" => $this->input->post('lugarTomaMuestra'),
                           "fechaTomaMuestra" => $this->input->post('fechaTomaMuestra'),
                           "muestraTomadaPor" => $this->input->post('muestraTomadaPor'),
                           "fechaRecepcionMuestra" => $this->input->post('fechaRecepcionMuestra'),
                           "operacion" => $links
                          );

      $this->informe->registrarInforme($datosRegistro);

      /* los ids vienen en un array con formato x1,x2,x3...xn. Enviado por javaScript*/
      $idsMuestrasCreadasCadena = $_POST['idsMuestrasCreadas']; 
      /* Se crea un array con los datos separados. Uno por posición */
      $idsMuestrasCreadas = explode(",", $idsMuestrasCreadasCadena);  
    
      if (!empty($idsMuestrasCreadasCadena)) {
        for ($i=0; $i < count($idsMuestrasCreadas); $i++) { 
         $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "descripcion" => $this->input->post('descripcion'.$idsMuestrasCreadas[$i]),
                                "tipo" => $this->input->post('tipo'.$idsMuestrasCreadas[$i]),
                                "fechaToma" => $this->input->post('fechaToma'.$idsMuestrasCreadas[$i]),
                                "horaToma" => $this->input->post('horaToma'.$idsMuestrasCreadas[$i]),
                                "fechaHoraRecepcion" => $this->input->post('fechaHoraRecepcion'.$idsMuestrasCreadas[$i]),
                                "codigoInterno" => $this->input->post('codigoInterno'.$idsMuestrasCreadas[$i]),
                                "observaciones" => $this->input->post('observaciones'.$idsMuestrasCreadas[$i])
                               );
         $this->informeCaracteristicasMuestra->registrarInformeCaracteristicasMuestra($datosRegistro);
        }
      }
      else {
        $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "descripcion" => $this->input->post('descripcion1'),
                                "tipo" => $this->input->post('tipo1'),
                                "fechaToma" => $this->input->post('fechaToma1'),
                                "horaToma" => $this->input->post('horaToma1'),
                                "fechaHoraRecepcion" => $this->input->post('fechaHoraRecepcion1'),
                                "codigoInterno" => $this->input->post('codigoInterno1'),
                                "observaciones" => $this->input->post('observaciones1')
                               );
         $this->informeCaracteristicasMuestra->registrarInformeCaracteristicasMuestra($datosRegistro);
      }
       
      $idsMuestrasCreadasCadena2 = $_POST['idsMuestrasCreadas2']; 
      /*Se crea un array con los datos separados. Uno por posición*/ 
      $idsMuestrasCreadas2 = explode(",", $idsMuestrasCreadasCadena2);  

      if (!empty($idsMuestrasCreadasCadena2)) {
        for ($i=0; $i < count($idsMuestrasCreadas2); $i++) { 
         $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "fechaEnsayo" => $this->input->post('fechaEnsayo'.$idsMuestrasCreadas2[$i]),
                                "ensayo" => $this->input->post('ensayo'.$idsMuestrasCreadas2[$i]),
                                "metodoUtilizado" => $this->input->post('metodoUtilizado'.$idsMuestrasCreadas2[$i]),
                                "rangoPermitido" => $this->input->post('rangoPermitido'.$idsMuestrasCreadas2[$i]),
                                "unidades" => $this->input->post('unidades'.$idsMuestrasCreadas2[$i]),
                                "xxxXx" => $this->input->post('xxxXx'.$idsMuestrasCreadas2[$i]),
                                "xxxXx1" => $this->input->post('xxxXx1'.$idsMuestrasCreadas2[$i]),
                                "xxxXx11" => $this->input->post('xxxXx11'.$idsMuestrasCreadas2[$i]),
                                "uExpa" => $this->input->post('uExpa'.$idsMuestrasCreadas2[$i]),
                                "uExpa1" => $this->input->post('uExpa1'.$idsMuestrasCreadas2[$i]),
                                "uExpa11" => $this->input->post('uExpa11'.$idsMuestrasCreadas2[$i]) 
                               );
         $this->informeResultados->registrarInformeResultados($datosRegistro);
        }
      }
      else {
        $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "fechaEnsayo" => $this->input->post('fechaEnsayo1'),
                                "ensayo" => $this->input->post('ensayo1'),
                                "metodoUtilizado" => $this->input->post('metodoUtilizado1'),
                                "rangoPermitido" => $this->input->post('rangoPermitido1'),
                                "unidades" => $this->input->post('unidades1'),
                                "xxxXx" => $this->input->post('xxxXx1'),
                                "xxxXx1" => $this->input->post('xxxXx11'),
                                "xxxXx11" => $this->input->post('xxxXx111'),
                                "uExpa" => $this->input->post('uExpa1'),
                                "uExpa1" => $this->input->post('uExpa11'),
                                "uExpa11" => $this->input->post('uExpa111') 
                               );
         $this->informeResultados->registrarInformeResultados($datosRegistro);
      }

      $this->actividades->registrarActividad('Informe Registrado', 'No. Cotización',$this->input->post('cotizacionNo'),$this->session->userdata('usuario'), date('d-m-Y H:i:s'));
      $mensajeInformativo['informeRegistrado'] = $_POST['cotizacionNo'];
      $this->load->view('registrarInforme', $mensajeInformativo);
    }
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function verResultado($codigoInterno, $analisis) {
    if($this->session->userdata('estadoSesion')) {
    if($analisis == "nitratos") {
       $data = array(
              'nitratos' => $this->nitratos->buscarNitratos($codigoInterno),
            );

    $this->load->view('verNitratos', $data);
    }


    if($analisis == "acidezLibre") {
       $data = array(
              'acidezLibre' => $this->acidezLibre->buscarAcidezLibre($codigoInterno),
            );

    $this->load->view('verAcidezLibre', $data);
    }

    if($analisis == "acidezTotal") {
       $data = array(
              'acidezTotal' => $this->acidezTotal->buscarAcidezTotal($codigoInterno),
            );

    $this->load->view('verAcidezTotal', $data);
    }

    if($analisis == "acidezVolatil") {
       $data = array(
              'acidezVolatil' => $this->acidezVolatil->buscarAcidezVolatil($codigoInterno),
            );

    $this->load->view('verAcidezVolatil', $data);
    }

     if($analisis == "alcalinidadTotal") {
       $data = array(
              'alcalinidadTotal' => $this->alcalinidadTotal->buscarAlcalinidadTotal($codigoInterno),
            );

    $this->load->view('verAlcalinidadTotal', $data);
    }

    if($analisis == "aluminio") {
       $data = array(
              'aluminio' => $this->aluminio->buscarAluminio($codigoInterno),
            );

    $this->load->view('verAluminio', $data);
    }
   
    if($analisis == "analisisFisicos") {
       $data = array(
              'analisisFisicos' => $this->analisisFisicos->buscarAnalisisFisico($codigoInterno),
            );

    $this->load->view('verAnalisisFisicos', $data);
    }

    if($analisis == "basicidad") {
       $data = array(
              'basicidad' => $this->basicidad->buscarBasicidad($codigoInterno),
            );

    $this->load->view('verBasicidad', $data);
    }

    if($analisis == "bicarbonatos") {
       $data = array(
              'bicarbonatos' => $this->bicarbonatos->buscarBicarbonatos($codigoInterno),
            );

    $this->load->view('verBicarbonatos', $data);
    }

    if($analisis == "carbonatos") {
       $data = array(
              'carbonatos' => $this->carbonatos->buscarCarbonatos($codigoInterno),
            );

    $this->load->view('verCarbonatos', $data);
    }

    if($analisis == "cloroResidual") {
       $data = array(
              'cloroResidual' => $this->cloroResidual->buscarCloroResidual($codigoInterno),
            );

    $this->load->view('verCloroResidual', $data);
    }

    if($analisis == "cloruros") {
       $data = array(
              'cloruros' => $this->cloruros->buscarCloruros($codigoInterno),
            );

    $this->load->view('verCloruros', $data);
    }

    if($analisis == "dbo5") {
       $data = array(
              'dbo5' => $this->dbo5->buscarDbo5($codigoInterno),
            );

    $this->load->view('verDbo5', $data);
    }

    if($analisis == "dqo") {
       $data = array(
              'dqo' => $this->dqo->buscarDqo($codigoInterno),
            );

    $this->load->view('verDqo', $data);
    }

    if($analisis == "durabilidad") {
       $data = array(
              'durabilidad' => $this->durabilidad->buscarDurabilidad($codigoInterno),
            );

    $this->load->view('verDurabilidad', $data);
    }

     if($analisis == "durezaCalcicaMagnesica") {
       $data = array(
              'durezaCalcicaMagnesica' => $this->durezaCalcicaMagnesica->buscarDurezaCalcicaMagnesica($codigoInterno),
            );

    $this->load->view('verDurezaCalcicaMagnesica', $data);
    }

    if($analisis == "durezaTotal") {
       $data = array(
              'durezaTotal' => $this->durezaTotal->buscarDurezaTotal($codigoInterno),
            );

    $this->load->view('verDurezaTotal', $data);
    }

     if($analisis == "extraccionSoxhlet") {
       $data = array(
              'extraccionSoxhlet' => $this->extraccionSoxhlet->buscarExtraccionSoxhlet($codigoInterno),
            );

    $this->load->view('verExtraccionSoxhlet', $data);
    }

    if($analisis == "extractoSecoDesengrasado") {
       $data = array(
              'extractoSecoDesengrasado' => $this->extractoSecoDesengrasado->buscarExtractoSecoDesengrasado($codigoInterno),
            );

    $this->load->view('verExtractoSecoDesengrasado', $data);
    }

    if($analisis == "extractoSecoRm") {
       $data = array(
              'extractoSecoRm' => $this->extractoSecoRm->buscarExtractoSecoRm($codigoInterno),
            );

    $this->load->view('verExtractoSecoRm', $data);
    }

     if($analisis == "extractoSecoTotal") {
       $data = array(
              'extractoSecoTotal' => $this->extractoSecoTotal->buscarExtractoSecoTotal($codigoInterno),
            );

    $this->load->view('verExtractoSecoTotal', $data);
    }

    if($analisis == "fosfatos") {
       $data = array(
              'fosfatos' => $this->fosfatos->buscarFosfatos($codigoInterno),
            );

    $this->load->view('verFosfatos', $data);
    }

    if($analisis == "hidrocarburos") {
       $data = array(
              'hidrocarburos' => $this->hidrocarburos->buscarHidrocarburo($codigoInterno),
            );

    $this->load->view('verHidrocarburos', $data);
    }

    if($analisis == "hidroxidos") {
       $data = array(
              'hidroxidos' => $this->hidroxidos->buscarHidroxidos($codigoInterno),
            );

    $this->load->view('verHidroxidos', $data);
    }

    if($analisis == "metales") {
       $data = array(
              'metales' => $this->metales->buscarMetales($codigoInterno),
            );

    $this->load->view('verMetales', $data);
    }

     if($analisis == "nitritos") {
       $data = array(
              'nitritos' => $this->nitritos->buscarNitritos($codigoInterno),
            );

    $this->load->view('verNitritos', $data);
    }

    if($analisis == "roseGottlie") {
       $data = array(
              'roseGottlie' => $this->roseGottlie->buscarRoseGottlie($codigoInterno),
            );

    $this->load->view('verRoseGottlie', $data);
    }

    if($analisis == "solidosDisueltosTotales") {
       $data = array(
              'solidosDisueltosTotales' => $this->solidosDisueltosTotales->buscarSolidosDisueltosTotales($codigoInterno),
            );

    $this->load->view('verSolidosDisueltosTotales', $data);
    }

    if($analisis == "solidosDisueltosVolatiles") {
       $data = array(
              'solidosDisueltosVolatiles' => $this->solidosDisueltosVolatiles->buscarSolidosDisueltosVolatiles($codigoInterno),
            );

    $this->load->view('verSolidosDisueltosVolatiles', $data);
    }

    if($analisis == "solidosInsolubles") {
       $data = array(
              'solidosInsolubles' => $this->solidosInsolubles->buscarSolidosInsolubles($codigoInterno),
            );

    $this->load->view('verSolidosInsolubles', $data);
    }

    if($analisis == "solidosSedimentables") {
       $data = array(
              'solidosSedimentables' => $this->solidosSedimentables->buscarSolidosSedimentables($codigoInterno),
            );

    $this->load->view('verSolidosSedimentables', $data);
    }

    if($analisis == "solidosSuspendidosTotales") {
       $data = array(
              'solidosSuspendidosTotales' => $this->solidosSuspendidosTotales->buscarSolidosSuspendidosTotales($codigoInterno),
            );

    $this->load->view('verSolidosSuspendidosTotales', $data);
    }

    if($analisis == "solidosSuspendidosVolatiles") {
       $data = array(
              'solidosSuspendidosVolatiles' => $this->solidosSuspendidosVolatiles->buscarSolidosSuspendidosVolatiles($codigoInterno),
            );

    $this->load->view('verSolidosSuspendidosVolatiles', $data);
    }

    if($analisis == "solidosTotales") {
       $data = array(
              'solidosTotales' => $this->solidosTotales->buscarSolidosTotales($codigoInterno),
            );

    $this->load->view('verSolidosTotales', $data);
    }

    if($analisis == "sulfatos") {
       $data = array(
              'sulfatos' => $this->sulfatos->buscarSulfatos($codigoInterno),
            );

    $this->load->view('verSulfatos', $data);
    }

    if($analisis == "volumetricoGerberBabcock") {
       $data = array(
              'volumetricoGerberBabcock' => $this->volumetricoGerberBabcock->buscarVolumetricoGerberBabcock($codigoInterno),
            );

    $this->load->view('verVolumetricoGerberBabcock', $data);
    }
} else {
    Echo "Inice sesion para ver la informacion";
   }
  }

  public function eliminarResultado($codigoInterno, $analisis, $offset=0) {
if($this->session->userdata('estadoSesion')) {
    if($analisis == "acidezLibre") {
      $this->acidezLibre->eliminarAcidezLibre($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Acidéz Libre Eliminada', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "acidezTotal") {
      $this->acidezTotal->eliminarAcidezTotal($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Acidéz Total Eliminada', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "acidezVolatil") {
      $this->acidezVolatil->eliminarAcidezVolatil($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Acidéz Volátil Eliminada', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "alcalinidadTotal") {
      $this->alcalinidadTotal->eliminarAlcalinidadTotal($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Alcalinidad Total Eliminada', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }
    
    if($analisis == "aluminio") {
      $this->aluminio->eliminarAluminio($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Aluminio Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "analisisFisicos") {
      $this->analisisFisicos->eliminarAnalisisFisico($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Análisis Físicos Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "basicidad") {
      $this->basicidad->eliminarBasicidad($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Basicidad Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

    }

    if($analisis == "bicarbonatos") {
      $this->bicarbonatos->eliminarBicarbonato($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Bicarbonatos Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }
    if($analisis == "carbonatos") {
      $this->carbonatos->eliminarCarbonato($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Carbonatos Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "cloroResidual") {
      $this->cloroResidual->eliminarCloroResidual($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Cloro Residual Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "cloruros") {
      $this->cloruros->eliminarCloruro($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Cloruros Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "dbo5") {
      $this->dbo5->eliminarDbo5($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('DBO5 Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "dqo") {
      $this->dqo->eliminarDqo($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('DQO Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "durabilidad") {
      $this->durabilidad->eliminarDurabilidad($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Durabilidad Eliminada', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "durezaCalcicaMagnesica") {
      $this->durezaCalcicaMagnesica->eliminarDurezaCalcicaMagnesica($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Dureza Cálcica Magnésica Eliminada', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "durezaTotal") {
      $this->durezaTotal->eliminarDurezaTotal($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Dureza Total Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "extraccionSoxhlet") {
      $this->extraccionSoxhlet->eliminarExtraccionSoxhlet($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Extracción Soxhlet Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "extractoSecoDesengrasado") {
      $this->extractoSecoDesengrasado->eliminarExtractoSecoDesengrasado($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Extracto Seco Desengrasado Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "extractoSecoRm") {
      $this->extractoSecoRm->eliminarExtractoSecoRm($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Extracto Seco R.m. Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "extractoSecoTotal") {
      $this->extractoSecoTotal->eliminarExtractoSecoTotal($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Extracto Seco Total Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "fosfatos") {
      $this->fosfatos->eliminarFosfato($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Fosfatos Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "hidrocarburos") {
      $this->hidrocarburos->eliminarHidrocarburo($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Hidrocarburos Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "hidroxidos") {
      $this->hidroxidos->eliminarHidroxido($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Hidróxidos Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "metales") {
      $this->metales->eliminarMetal($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Metales Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "nitratos") {
      $this->nitratos->eliminarNitrato($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Nitratos Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "nitritos") {
      $this->nitritos->eliminarNitrito($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Nitritos Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "roseGottlie") {
      $this->roseGottlie->eliminarRoseGottlie($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Rose Gottlie Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "solidosDisueltosTotales") {
      $this->solidosDisueltosTotales->eliminarSolidoDisueltoTotal($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Sóidos Disueltos Totales Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "solidosDisueltosVolatiles") {
      $this->solidosDisueltosVolatiles->eliminarSolidoDisueltoVolatil($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Sólidos Disueltos Volátiles Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "solidosInsolubles") {
      $this->solidosInsolubles->eliminarSolidoInsoluble($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Sólidos Insolubles Eliminado', 'Código Interno', $codigoInterno,'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "solidosSedimentables") {
      $this->solidosSedimentables->eliminarSolidoSedimentable($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Sólidos Sedimentables Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "solidosSuspendidosTotales") {
      $this->solidosSuspendidosTotales->eliminarSolidoSuspendidoTotal($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Sólidos Suspendidos Totales Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "solidosSuspendidosVolatiles") {
      $this->solidosSuspendidosVolatiles->eliminarSolidoSuspendidoVolatil($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Sólidos Suspendidos Volátiles Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "solidosTotales") {
      $this->solidosTotales->eliminarSolidoTotal($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Sólidos Totales Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "sulfatos") {
      $this->sulfatos->eliminarSulfato($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Sulfatos Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    if($analisis == "volumetricoGerberBabcock") {
      $this->volumetricoGerberBabcock->eliminarVolumetricoGerberBabcock($codigoInterno);
      $this->resultados->eliminarResultado($codigoInterno, $analisis);
      $this->actividades->registrarActividad('Volumétrico Gerber Babcock Eliminado', 'Código Interno', $codigoInterno, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    }

    $this->load->library('table');
    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->database(); //load library database

    // Config setup
    $numeroFilas = $this->db->count_all("resultados");
    $config['base_url'] = base_url().'index.php/welcome/cargarConsultarResultados';
    $config['total_rows'] = $numeroFilas;
    $config['per_page'] = 10;
    $config['num_links'] = $numeroFilas;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';

    $this->pagination->initialize($config);

    $this->db->select('analisis, codigoInterno, fechaRecepcion, fechaEnsayo, codigoMuestra, operacion');
    $this->db->order_by("id", "desc");
    $data['resultados'] = $this->db->get('resultados', $config['per_page'], $offset);// take record of the table

    $header = array ('Analisis', 'Código Interno','Fecha Recepcion','Fecha Ensayo', 'Código Muestra', 'Operación'); // create table header
    $tmpl = array ( 'table_open' => '<table class="table table-bordered table-condensed table-hover ">' );

    $this->table->set_template($tmpl);
    $this->table->set_heading($header);

    if($numeroFilas == 0) {
      $data['noExisteResultado'] = "No existen resultados";
    }

     $data['resultadoEliminado'] = $codigoInterno;

    $this->load->view('consultarResultados',$data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function editarResultado($codigoInterno, $analisis) {
if($this->session->userdata('estadoSesion')) {
    
    if($analisis == "analisisFisicos") {
        $data = array(
                    'analisisFisicos' => $this->analisisFisicos->buscarAnalisisFisico($codigoInterno)
                    );
        $this->load->view('editarAnalisisFisicos', $data);
      
    }

    if($analisis == "alcalinidadTotal") {
      
      $data = array(
                    'alcalinidadTotal' => $this->alcalinidadTotal->buscarAlcalinidadTotal($codigoInterno)
                    );
      $this->load->view('editarAlcalinidadTotal', $data);
      
      
    }

    if($analisis == "carbonatos") {
      $data = array(
                    'carbonatos' => $this->carbonatos->buscarCarbonatos($codigoInterno)
                    );
      $this->load->view('editarCarbonatos', $data);
    }

    if($analisis == "bicarbonatos") {
      $data = array(
                    'bicarbonatos' => $this->bicarbonatos->buscarBicarbonatos($codigoInterno)
                    );
      $this->load->view('editarBicarbonatos', $data);
    }

    if($analisis == "hidroxidos") {
      $data = array(
                    'hidroxidos' => $this->hidroxidos->buscarHidroxidos($codigoInterno)
                    );
      $this->load->view('editarHidroxidos', $data);
    }

    if($analisis == "nitritos") {
      $data = array(
                    'nitritos' => $this->nitritos->buscarNitritos($codigoInterno)
                    );
      $this->load->view('editarNitritos', $data);
    }

    if($analisis == "nitratos") {
      $data = array(
                    'nitratos' => $this->nitratos->buscarNitratos($codigoInterno)
                    );
      $this->load->view('editarNitratos', $data);
    }

    if($analisis == "cloruros") {
      $data = array(
                    'cloruros' => $this->cloruros->buscarCloruros($codigoInterno)
                    );
      $this->load->view('editarCloruros', $data);
    }

    if($analisis == "sulfatos") {
      $data = array(
                    'sulfatos' => $this->sulfatos->buscarSulfatos($codigoInterno)
                    );
      $this->load->view('editarSulfatos', $data);
    }

    if($analisis == "durezaTotal") {
      $data = array(
                    'durezaTotal' => $this->durezaTotal->buscarDurezaTotal($codigoInterno)
                    );
      $this->load->view('editarDurezaTotal', $data);
    }

    if($analisis == "durezaCalcicaMagnesica") {
      $data = array(
                    'durezaCalcicaMagnesica' => $this->durezaCalcicaMagnesica->buscarDurezaCalcicaMagnesica($codigoInterno)
                    );
      $this->load->view('editarDurezaCalcicaMagnesica', $data);
    }

    if($analisis == "cloroResidual") {
      $data = array(
                    'cloroResidual' => $this->cloroResidual->buscarCloroResidual($codigoInterno)
                    );
      $this->load->view('editarCloroResidual', $data);
    }

    if($analisis == "metales") {
      $data = array(
                    'metales' => $this->metales->buscarMetales($codigoInterno)
                    );
      $this->load->view('editarMetales', $data);
    }

    if($analisis == "aluminio") {
      $data = array(
                    'aluminio' => $this->aluminio->buscarAluminio($codigoInterno)
                    );
      $this->load->view('editarAluminio', $data);
    }

    if($analisis == "acidezTotal") {
      $data = array(
                    'acidezTotal' => $this->acidezTotal->buscarAcidezTotal($codigoInterno)
                    );
      $this->load->view('editarAcidezTotal', $data);
    }

    if($analisis == "acidezLibre") {
      $data = array(
                    'acidezLibre' => $this->acidezLibre->buscarAcidezLibre($codigoInterno)
                    );
      $this->load->view('editarAcidezLibre', $data);
    }

    if($analisis == "acidezVolatil") {
      $data = array(
                    'acidezVolatil' => $this->acidezVolatil->buscarAcidezVolatil($codigoInterno)
                    );
      $this->load->view('editarAcidezVolatil', $data);
    }

    if($analisis == "durabilidad") {
      $data = array(
                    'durabilidad' => $this->durabilidad->buscarDurabilidad($codigoInterno)
                    );
      $this->load->view('editarDurabilidad', $data);
    }

    if($analisis == "extractoSecoTotal") {
      $data = array(
                    'extractoSecoTotal' => $this->extractoSecoTotal->buscarExtractoSecoTotal($codigoInterno)
                    );
      $this->load->view('editarExtractoSecoTotal', $data);
    }

    if($analisis == "extractoSecoRm") {
      $data = array(
                    'extractoSecoRm' => $this->extractoSecoRm->buscarExtractoSecoRm($codigoInterno)
                    );
      $this->load->view('editarExtractoSecoRm', $data);
    }

    if($analisis == "extractoSecoDesengrasado") {
      $data = array(
                    'extractoSecoDesengrasado' => $this->extractoSecoDesengrasado->buscarExtractoSecoDesengrasado($codigoInterno)
                    );
      $this->load->view('editarExtractoSecoDesengrasado', $data);
    }

    if($analisis == "solidosTotales") {
      $data = array(
                    'solidosTotales' => $this->solidosTotales->buscarSolidosTotales($codigoInterno)
                    );
      $this->load->view('editarSolidosTotales', $data);
    }

    if($analisis == "solidosDisueltosTotales") {
      $data = array(
                    'solidosDisueltosTotales' => $this->solidosDisueltosTotales->buscarSolidosDisueltosTotales($codigoInterno)
                    );
      $this->load->view('editarSolidosDisueltosTotales', $data);
    }

     if($analisis == "solidosDisueltosVolatiles") {
      $data = array(
                    'solidosDisueltosVolatiles' => $this->solidosDisueltosVolatiles->buscarSolidosDisueltosVolatiles($codigoInterno)
                    );
      $this->load->view('editarSolidosDisueltosVolatiles', $data);
    }

   if($analisis == "solidosSuspendidosTotales") {
      $data = array(
                    'solidosSuspendidosTotales' => $this->solidosSuspendidosTotales->buscarSolidosSuspendidosTotales($codigoInterno)
                    );
      $this->load->view('editarSolidosSuspendidosTotales', $data);
    }

    if($analisis == "solidosSuspendidosVolatiles") {
      $data = array(
                    'solidosSuspendidosVolatiles' => $this->solidosSuspendidosVolatiles->buscarSolidosSuspendidosVolatiles($codigoInterno)
                    );
      $this->load->view('editarSolidosSuspendidosVolatiles', $data);
    }

    if($analisis == "solidosSedimentables") {
      $data = array(
                    'solidosSedimentables' => $this->solidosSedimentables->buscarSolidosSedimentables($codigoInterno)
                    );
      $this->load->view('editarSolidosSedimentables', $data);
    }

     if($analisis == "solidosInsolubles") {
      $data = array(
                    'solidosInsolubles' => $this->solidosInsolubles->buscarSolidosInsolubles($codigoInterno)
                    );
      $this->load->view('editarSolidosInsolubles', $data);
    }

    if($analisis == "basicidad") {
      $data = array(
                    'basicidad' => $this->basicidad->buscarBasicidad($codigoInterno)
                    );
      $this->load->view('editarBasicidad', $data);
    }

    if($analisis == "dqo") {
      $data = array(
                    'dqo' => $this->dqo->buscarDqo($codigoInterno)
                    );
      $this->load->view('editarDqo', $data);
    }

    if($analisis == "dbo5") {
      $data = array(
                    'dbo5' => $this->dbo5->buscarDbo5($codigoInterno)
                    );
      $this->load->view('editarDbo5', $data);
    }

    if($analisis == "extraccionSoxhlet") {
      $data = array(
                    'extraccionSoxhlet' => $this->extraccionSoxhlet->buscarExtraccionSoxhlet($codigoInterno)
                    );
      $this->load->view('editarExtraccionSoxhlet', $data);
    }

    if($analisis == "volumetricoGerberBabcock") {
      $data = array(
                    'volumetricoGerberBabcock' => $this->volumetricoGerberBabcock->buscarVolumetricoGerberBabcock($codigoInterno)
                    );
      $this->load->view('editarVolumetricoGerberBabcock', $data);
    }

    if($analisis == "roseGottlie") {
      $data = array(
                    'roseGottlie' => $this->roseGottlie->buscarRoseGottlie($codigoInterno)
                    );
      $this->load->view('editarRoseGottlie', $data);
    }

    if($analisis == "hidrocarburos") {
      $data = array(
                    'hidrocarburos' => $this->hidrocarburos->buscarHidrocarburo($codigoInterno)
                    );
      $this->load->view('editarHidrocarburos', $data);
    }

    if($analisis == "fosfatos") {
      $data = array(
                    'fosfatos' => $this->fosfatos->buscarFosfatos($codigoInterno)
                    );
      $this->load->view('editarFosfatos', $data);
    }
} else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarFosfatos(){
    if($this->session->userdata('estadoSesion')) {
  $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "digestion1" => $this->input->post('digestion1'),
                          "digestion2" => $this->input->post('digestion2'),
                          "digestionSolucionCartaControl" => $this->input->post('digestionSolucionCartaControl'),
                          "vFinalDigestion1" => $this->input->post('vFinalDigestion1'),
                          "vFinalDigestion2" => $this->input->post('vFinalDigestion2'),
                          "vFinalDigestionSolucionCartaControl" => $this->input->post('vFinalDigestionSolucionCartaControl'),
                          "vAlicuota1" => $this->input->post('vAlicuota1'),
                          "vAlicuota2" => $this->input->post('vAlicuota2'),
                          "vAlicuotaSolucionCartaControl" => $this->input->post('vAlicuotaSolucionCartaControl'),
                          "vFinal1" => $this->input->post('vFinal1'),
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),
                          "absorbancia1" => $this->input->post('absorbancia1'),
                          "absorbancia2" => $this->input->post('absorbancia2'),
                          "absorbanciaSolucionCartaControl" => $this->input->post('absorbanciaSolucionCartaControl'),
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),
                          "concentracionPo1" => $this->input->post('concentracionPo1'),
                          "concentracionPo2" => $this->input->post('concentracionPo2'),
                          "concentracionPoSolucionCartaControl" => $this->input->post('concentracionPoSolucionCartaControl'),
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'), 
                          "responsable" => $this->input->post('responsable')
                         );
       $this->fosfatos->actualizarFosfatos($this->input->post('codigoInterno'), $datosRegistro);
       $this->actividades->registrarActividad('Fosfatos Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

     $data = array(
                  'fosfatos' => $this->fosfatos->buscarFosfatos($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "fosfatos", $datosActualizarResultado);

      $data['analisisActualizado'] = "Fosfatos";
      $this->load->view('editarFosfatos', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
    }

  public function actualizarHidrocarburos(){
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraFiltrada" => $this->input->post('vMuestraFiltrada'),
                          "noCapsula" => $this->input->post('noCapsula'),
                          "capsulaVacia" => $this->input->post('capsulaVacia'),
                          "capsulaMuestra" => $this->input->post('capsulaMuestra'),
                          "resultado" => $this->input->post('resultado'),                           
                          "responsable" => $this->input->post('responsable')
                         );

    $this->hidrocarburos->actualizarHidrocarburos($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Hidrocarburos Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

  



     $data = array(
                  'hidrocarburos' => $this->hidrocarburos->buscarHidrocarburo($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "hidrocarburos", $datosActualizarResultado);

      $data['analisisActualizado'] = "Hidrocarburos";
      $this->load->view('editarHidrocarburos', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarRoseGottlie(){
    if($this->session->userdata('estadoSesion')) {

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "cantidadMuestra1" => $this->input->post('cantidadMuestra1'),
                          "cantidadMuestra2" => $this->input->post('cantidadMuestra2'),
                          "noBeaker1" => $this->input->post('noBeaker1'),                          
                          "noBeaker2" => $this->input->post('noBeaker2'),
                          "pesoBeakerVacio1" => $this->input->post('pesoBeakerVacio1'),    
                          "pesoBeakerVacio2" => $this->input->post('pesoBeakerVacio2'), 
                          "pesoBeakerMuestra1" => $this->input->post('pesoBeakerMuestra1'),
                          "pesoBeakerMuestra2" => $this->input->post('pesoBeakerMuestra2'),                      
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),                                         
                          "responsable" => $this->input->post('responsable')
                         );

      $this->roseGottlie->actualizarRoseGottlie($this->input->post('codigoInterno'), $datosRegistro);
      $this->actividades->registrarActividad('Rose Gottlie Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));


     $data = array(
                  'roseGottlie' => $this->roseGottlie->buscarRoseGottlie($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "roseGottlie", $datosActualizarResultado);

      $data['analisisActualizado'] = "Rose Gottlie";
      $this->load->view('editarRoseGottlie', $data);
   } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarVolumetricoGerberBabcock(){
    if($this->session->userdata('estadoSesion')) {

     $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "cantidadMuestra" => $this->input->post('cantidadMuestra'),
                          "butirometro" => $this->input->post('butirometro'),
                          "resultado" => $this->input->post('resultado'),                           
                          "responsable" => $this->input->post('responsable')
                         );
     $this->volumetricoGerberBabcock->actualizarVolumetricoGerberBabcock($this->input->post('codigoInterno'), $datosRegistro);
     $this->actividades->registrarActividad('Volumétrico Gerber Babcock Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

     $data = array(
                  'volumetricoGerberBabcock' => $this->volumetricoGerberBabcock->buscarVolumetricoGerberBabcock($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "volumetricoGerberBabcock", $datosActualizarResultado);

      $data['analisisActualizado'] = "Volumetrico Gerber Babcock";
      $this->load->view('editarVolumetricoGerberBabcock', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarExtraccionSoxhlet(){
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "cantidadMuestra" => $this->input->post('cantidadMuestra'),
                          "noCrisol" => $this->input->post('noCrisol'),
                          "pesoCrisolVacio" => $this->input->post('pesoCrisolVacio'),
                          "pesoCrisolMuestra" => $this->input->post('pesoCrisolMuestra'),
                          "resultado" => $this->input->post('resultado'),                           
                          "responsable" => $this->input->post('responsable')
                         );
     $this->extraccionSoxhlet->actualizarExtraccionSoxhlet($this->input->post('codigoInterno'), $datosRegistro);
     $this->actividades->registrarActividad('Extracción Soxhlet Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'extraccionSoxhlet' => $this->extraccionSoxhlet->buscarExtraccionSoxhlet($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "extraccionSoxhlet", $datosActualizarResultado);

      $data['analisisActualizado'] = "Extraccion Soxhlet";
      $this->load->view('editarExtraccionSoxhlet', $data);
} else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarDbo5() {
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "winklerNo1" => $this->input->post('winklerNo1'),
                          "winklerNo2" => $this->input->post('winklerNo2'),
                          "winklerNo3" => $this->input->post('winklerNo3'),
                          "winklerNoSolucionCartaControl" => $this->input->post('winklerNoSolucionCartaControl'),
                          "factorDilucion1" => $this->input->post('factorDilucion1'),                          
                          "factorDilucion2" => $this->input->post('factorDilucion2'),
                          "factorDilucion3" => $this->input->post('factorDilucion3'),
                          "factorDilucionSolucionCartaControl" => $this->input->post('factorDilucionSolucionCartaControl'),
                          "vMuestra1" => $this->input->post('vMuestra1'),                          
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestra3" => $this->input->post('vMuestra3'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "odInicial1" => $this->input->post('odInicial1'),    
                          "odInicial2" => $this->input->post('odInicial2'), 
                          "odInicial3" => $this->input->post('odInicial3'),
                          "odInicialSolucionCartaControl" => $this->input->post('odInicialSolucionCartaControl'),
                          "odFinal1" => $this->input->post('odFinal1'),    
                          "odFinal2" => $this->input->post('odFinal2'), 
                          "odFinal3" => $this->input->post('odFinal3'),
                          "odFinalSolucionCartaControl" => $this->input->post('odFinalSolucionCartaControl'),
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracion3" => $this->input->post('concentracion3'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'),                                          
                          "responsable" => $this->input->post('responsable')
                         );

   $this->dbo5->actualizardbo5($this->input->post('codigoInterno'), $datosRegistro);
   $this->actividades->registrarActividad('Dbo5 Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    
      $data = array(
                  'dbo5' => $this->dbo5->buscarDbo5($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "Dbo5", $datosActualizarResultado);

      $data['analisisActualizado'] = "Dbo5";
      $this->load->view('editarDbo5', $data);
} else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }

  }

  public function actualizarDqo() {
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaAnalisis" => $this->input->post('fechaAnalisis'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vAlicuota1" => $this->input->post('vAlicuota1'),
                          "vAlicuota2" => $this->input->post('vAlicuota2'),
                          "vFas11" => $this->input->post('vFas11'),                          
                          "vFas12" => $this->input->post('vFas12'),
                          "normalidadFas1" => $this->input->post('normalidadFas1'),    
                          "normalidadFas2" => $this->input->post('normalidadFas2'), 
                          "normalidadPromedioFas" => $this->input->post('normalidadPromedioFas'), 
                          "vConsumidoBlanco1" => $this->input->post('vConsumidoBlanco1'),                          
                          "vConsumidoBlanco2" => $this->input->post('vConsumidoBlanco2'),
                          "vMuestra" => $this->input->post('vMuestra'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "factorDilucion1" => $this->input->post('factorDilucion1'),
                          "factorDilucion2" => $this->input->post('factorDilucion2'),
                          "factorDilucion3" => $this->input->post('factorDilucion3'),                      
                          "factorDilucionSolucionCartaControl" => $this->input->post('factorDilucionSolucionCartaControl'),
                          "vFas21" => $this->input->post('vFas21'),
                          "vFas22" => $this->input->post('vFas22'),
                          "vFas23" => $this->input->post('vFas23'),
                          "vFas2SolucionCartaControl" => $this->input->post('vFas22'),
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracion3" => $this->input->post('concentracion3'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'),                                          
                          "responsable" => $this->input->post('responsable')
                         );
     $this->dqo->actualizarDqo($this->input->post('codigoInterno'), $datosRegistro);
     $this->actividades->registrarActividad('Dqo Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'dqo' => $this->dqo->buscarDqo($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaAnalisis'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "dqo", $datosActualizarResultado);

      $data['analisisActualizado'] = "Dqo";
      $this->load->view('editarDqo', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarBasicidad() {
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "gMlMuestra1" => $this->input->post('gMlMuestra1'),
                          "gMlMuestra2" => $this->input->post('gMlMuestra2'),
                          "vFinal1" => $this->input->post('vFinal1'),                          
                          "vFinal2" => $this->input->post('vFinal2'),
                          "nNaOH1" => $this->input->post('nNaOH1'),    
                          "nNaOH2" => $this->input->post('nNaOH2'), 
                          "vNaOH1" => $this->input->post('vNaOH1'),
                          "vNaOH2" => $this->input->post('vNaOH2'),                      
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "promedio" => $this->input->post('promedio'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->basicidad->actualizarBasicidad($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Basicidad Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
      
      $data = array(
                  'basicidad' => $this->basicidad->buscarBasicidad($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "basicidad", $datosActualizarResultado);

      $data['analisisActualizado'] = "Basicidad";
      $this->load->view('editarBasicidad', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }

  }
   
  public function actualizarSolidosInsolubles() {
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "cantidadMuestra1" => $this->input->post('cantidadMuestra1'),
                          "cantidadMuestra2" => $this->input->post('cantidadMuestra2'),
                          "noCrisol1" => $this->input->post('noCrisol1'),                          
                          "noCrisol2" => $this->input->post('noCrisol2'),
                          "crisolVacio1" => $this->input->post('crisolVacio1'),    
                          "crisolVacio2" => $this->input->post('crisolVacio2'), 
                          "crisolMuestra1051" => $this->input->post('crisolMuestra1051'),
                          "crisolMuestra1052" => $this->input->post('crisolMuestra1052'),                      
                          "conentracionSi1" => $this->input->post('conentracionSi1'),
                          "conentracionSi2" => $this->input->post('conentracionSi2'),
                          "concentracionPromedioSi" => $this->input->post('concentracionPromedioSi'),                                              
                          "responsable" => $this->input->post('responsable')
                         );  

    $this->solidosInsolubles->actualizarSolidosInsolubles($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Sólidos Insolubles Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'solidosInsolubles' => $this->solidosInsolubles->buscarSolidosInsolubles($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "solidosInsolubles", $datosActualizarResultado);

      $data['analisisActualizado'] = "Sólidos Insolubles";
      $this->load->view('editarSolidosInsolubles', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarSolidosSedimentables() {
    if($this->session->userdata('estadoSesion')) {

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra" => $this->input->post('vMuestra'),
                          "ss10" => $this->input->post('ss10'),
                          "ss60" => $this->input->post('ss60'),                            
                          "responsable" => $this->input->post('responsable')
                         );

    $this->solidosSedimentables->actualizarSolidosSedimentables($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Sólidos Sedimentables Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'solidosSedimentables' => $this->solidosSedimentables->buscarSolidosSedimentables($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "solidosSedimentables", $datosActualizarResultado);

      $data['analisisActualizado'] = "Sólidos Sedimentables";
      $this->load->view('editarSolidosSedimentables', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }

  }

  public function actualizarSolidosSuspendidosVolatiles() {
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraFiltrada1" => $this->input->post('vMuestraFiltrada1'),
                          "vMuestraFiltrada2" => $this->input->post('vMuestraFiltrada2'),
                          "noCrisol1" => $this->input->post('noCrisol1'),                          
                          "noCrisol2" => $this->input->post('noCrisol2'),
                          "crisolVacio1" => $this->input->post('crisolVacio1'),    
                          "crisolVacio2" => $this->input->post('crisolVacio2'), 
                          "crisolMuestra1051" => $this->input->post('crisolMuestra1051'),
                          "crisolMuestra1052" => $this->input->post('crisolMuestra1052'),                      
                          "crisolMuestra5501" => $this->input->post('crisolMuestra5501'),
                          "crisolMuestra5502" => $this->input->post('crisolMuestra5502'),
                          "concentracionSsv1" => $this->input->post('concentracionSsv1'),
                          "concentracionSsv2" => $this->input->post('concentracionSsv2'),
                          "concentracionPromedioSsv" => $this->input->post('concentracionPromedioSsv'),                                              
                          "responsable" => $this->input->post('responsable')
                         );

    $this->solidosSuspendidosVolatiles->actualizarSolidosSuspendidosVolatiles($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Sólidos Suspendidos Volátiles Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));


      $data = array(
                  'solidosSuspendidosVolatiles' => $this->solidosSuspendidosVolatiles->buscarSolidosSuspendidosVolatiles($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "solidosSuspendidosVolatiles", $datosActualizarResultado);

      $data['analisisActualizado'] = "Sólidos Suspendidos Volátiles";
      $this->load->view('editarSolidosSuspendidosVolatiles', $data);
   } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarSolidosSuspendidosTotales() {
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "VmuestraFiltrada1" => $this->input->post('VmuestraFiltrada1'),
                          "VmuestraFiltrada2" => $this->input->post('VmuestraFiltrada2'),
                          "VmuestraFiltradaSolucionCartaControl" => $this->input->post('VmuestraFiltradaSolucionCartaControl'),
                          "noCrisol1" => $this->input->post('noCrisol1'),                          
                          "noCrisol2" => $this->input->post('noCrisol2'),
                          "noCrisolSolucionCartaControl" => $this->input->post('noCrisolSolucionCartaControl'),
                          "crisolVacio1" => $this->input->post('crisolVacio1'),    
                          "crisolVacio2" => $this->input->post('crisolVacio2'), 
                          "crisolVacioSolucionCartaControl" => $this->input->post('crisolVacioSolucionCartaControl'),
                          "crisolMuestra1" => $this->input->post('crisolMuestra1'),
                          "crisolMuestra2" => $this->input->post('crisolMuestra2'),                      
                          "crisolMuestraSolucionCartaControl" => $this->input->post('crisolMuestraSolucionCartaControl'), 
                          "concentracionSst1" => $this->input->post('concentracionSst1'),
                          "concentracionSst2" => $this->input->post('concentracionSst2'),
                          "concentracionSstSolucionCartaControl" => $this->input->post('concentracionSstSolucionCartaControl'),
                          "concentracionPromedioSst" => $this->input->post('concentracionPromedioSst'),  
                          "concentracionPromedioSstSolucionCartaControl" => $this->input->post('concentracionPromedioSstSolucionCartaControl'),                                             
                          "responsable" => $this->input->post('responsable')
                         );

    $this->solidosSuspendidosTotales->actualizarSolidosSuspendidosTotales($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Sólidos Suspendidos Totales Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'solidosSuspendidosTotales' => $this->solidosSuspendidosTotales->buscarSolidosSuspendidosTotales($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "solidosSuspendidosTotales", $datosActualizarResultado);

      $data['analisisActualizado'] = "Sólidos Suspendidos Totales";
      $this->load->view('editarSolidosSuspendidosTotales', $data);
} else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarSolidosDisueltosVolatiles() {
    if($this->session->userdata('estadoSesion')) {
     $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vAlicuotaMuestraFiltrada1" => $this->input->post('vAlicuotaMuestraFiltrada1'),
                          "vAlicuotaMuestraFiltrada2" => $this->input->post('vAlicuotaMuestraFiltrada2'),
                          "noCapsula1" => $this->input->post('noCapsula1'),                          
                          "noCapsula2" => $this->input->post('noCapsula2'),
                          "capsulaVacia1" => $this->input->post('capsulaVacia1'),    
                          "capsulaVacia2" => $this->input->post('capsulaVacia2'), 
                          "crisolMuestra1" => $this->input->post('crisolMuestra1'),
                          "crisolMuestra2" => $this->input->post('crisolMuestra2'),                      
                          "capsulaMuestra1" => $this->input->post('capsulaMuestra1'),
                          "capsulaMuestra2" => $this->input->post('capsulaMuestra2'),
                          "concentracionSdv1" => $this->input->post('concentracionSdv1'),
                          "concentracionSdv2" => $this->input->post('concentracionSdv2'),
                          "concentracionPromedioSdv" => $this->input->post('concentracionPromedioSdv'),                                              
                          "responsable" => $this->input->post('responsable')
                         );

      $this->solidosDisueltosVolatiles->actualizarSolidosDisueltosVolatiles($this->input->post('codigoInterno'), $datosRegistro);
      $this->actividades->registrarActividad('Sólidos Disueltos Volátiles Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));


      $data = array(
                  'solidosDisueltosVolatiles' => $this->solidosDisueltosVolatiles->buscarSolidosDisueltosVolatiles($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "solidosDisueltosVolatiles", $datosActualizarResultado);

      $data['analisisActualizado'] = "Sólidos Disueltos Volátiles";
      $this->load->view('editarSolidosDisueltosVolatiles', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }


  public function actualizarSolidosDisueltosTotales() {
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "noCapsula1" => $this->input->post('noCapsula1'),                          
                          "noCapsula2" => $this->input->post('noCapsula2'),
                          "capsulaVacia1" => $this->input->post('capsulaVacia1'),    
                          "capsulaVacia2" => $this->input->post('capsulaVacia2'), 
                          "capsulaMuestra1" => $this->input->post('capsulaMuestra1'),
                          "capsulaMuestra2" => $this->input->post('capsulaMuestra2'),                      
                          "concentracionSdt1" => $this->input->post('concentracionSdt1'),
                          "concentracionSdt2" => $this->input->post('concentracionSdt2'),
                          "concentracionPromedioSdt" => $this->input->post('concentracionPromedioSdt'),                                              
                          "responsable" => $this->input->post('responsable')
                         );

    $this->solidosDisueltosTotales->actualizarSolidosDisueltosTotales($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Sólidos Disueltos Totales Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));


      $data = array(
                  'solidosDisueltosTotales' => $this->solidosDisueltosTotales->buscarSolidosDisueltosTotales($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "solidosDisueltosTotales", $datosActualizarResultado);

      $data['analisisActualizado'] = "Sólidos Disueltos Totales";
      $this->load->view('editarSolidosDisueltosTotales', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarSolidosTotales() {
    if($this->session->userdata('estadoSesion')) {
     $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "noCapsula1" => $this->input->post('noCapsula1'),                          
                          "noCapsula2" => $this->input->post('noCapsula2'),
                          "capsulaVacia1" => $this->input->post('capsulaVacia1'),    
                          "capsulaVacia2" => $this->input->post('capsulaVacia2'), 
                          "capsulaMuestra1" => $this->input->post('capsulaMuestra1'),
                          "capsulaMuestra2" => $this->input->post('capsulaMuestra2'),                      
                          "concentracionSt1" => $this->input->post('concentracionSt1'),
                          "concentracionSt2" => $this->input->post('concentracionSt2'),
                          "concentracionPromedioSt" => $this->input->post('concentracionPromedioSt'),                                              
                          "responsable" => $this->input->post('responsable')
                         );

    $this->solidosTotales->actualizarSolidosTotales($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Sólidos Totales Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'solidosTotales' => $this->solidosTotales->buscarSolidosTotales($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "solidosTotales", $datosActualizarResultado);

      $data['analisisActualizado'] = "Sólidos Totales";
      $this->load->view('editarSolidosTotales', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarExtractoSecoDesengrasado() {
    if($this->session->userdata('estadoSesion')) {

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "est1" => $this->input->post('est1'),
                          "est2" => $this->input->post('est2'),
                          "grasa1" => $this->input->post('grasa1'),                          
                          "grasa2" => $this->input->post('grasa2'),
                          "cantidadMuestra1" => $this->input->post('cantidadMuestra1'),    
                          "cantidadMuestra2" => $this->input->post('cantidadMuestra2'), 
                          "densidad1" => $this->input->post('densidad1'),
                          "densidad2" => $this->input->post('densidad2'),                      
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "promedio" => $this->input->post('promedio'),                                              
                          "responsable" => $this->input->post('responsable')
                         );

    $this->extractoSecoDesengrasado->actualizarExtractoSecoDesengrasado($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Extracto Seco Desengrasado Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));


      $data = array(
                  'extractoSecoDesengrasado' => $this->extractoSecoDesengrasado->buscarExtractoSecoDesengrasado($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "extractoSecoDesengrasado", $datosActualizarResultado);

      $data['analisisActualizado'] = "Extracto Seco Desengrasado";
      $this->load->view('editarExtractoSecoDesengrasado', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarExtractoSecoRm() {
    if($this->session->userdata('estadoSesion')) {
  $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "densidad1" => $this->input->post('densidad1'),
                          "densidad2" => $this->input->post('densidad2'),
                          "grasa1" => $this->input->post('grasa1'),                          
                          "grasa2" => $this->input->post('grasa2'),
                          "resultado1" => $this->input->post('resultado1'),    
                          "resultado2" => $this->input->post('resultado2'),
                          "promedio" => $this->input->post('promedio'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
     $this->extractoSecoRm->actualizarExtractoSecoRm($this->input->post('codigoInterno'), $datosRegistro);
     $this->actividades->registrarActividad('Extracto Seco R.M. Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'extractoSecoRm' => $this->extractoSecoRm->buscarExtractoSecoRm($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "extractoSecoRm", $datosActualizarResultado);

      $data['analisisActualizado'] = "Extracto Seco R.M.";
      $this->load->view('editarExtractoSecoRm', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
   }

  public function actualizarExtractoSecoTotal() {
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "NoCapsula1" => $this->input->post('NoCapsula1'),
                          "NoCapsula2" => $this->input->post('NoCapsula2'),
                          "McapsulaVacia1" => $this->input->post('McapsulaVacia1'),                          
                          "McapsulaVacia2" => $this->input->post('McapsulaVacia2'),
                          "cantidadMuestra1" => $this->input->post('cantidadMuestra1'),    
                          "cantidadMuestra2" => $this->input->post('cantidadMuestra2'), 
                          "mDespuesSecado11" => $this->input->post('mDespuesSecado11'),
                          "mDespuesSecado12" => $this->input->post('mDespuesSecado12'),                      
                          "mdespuesSecado21" => $this->input->post('mdespuesSecado21'),
                          "mdespuesSecado22" => $this->input->post('mdespuesSecado22'),
                          "extractoSecoTotal1" => $this->input->post('extractoSecoTotal1'),
                          "extractoSecoTotal2" => $this->input->post('extractoSecoTotal2'),
                          "promedioEst" => $this->input->post('promedioEst'),                                              
                          "responsable" => $this->input->post('responsable')
                         );

    $this->extractoSecoTotal->actualizarExtractoSecoTotal($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Extracto Seco Total Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));


      $data = array(
                  'extractoSecoTotal' => $this->extractoSecoTotal->buscarExtractoSecoTotal($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "extractoSecoTotal", $datosActualizarResultado);

      $data['analisisActualizado'] = "Extracto Seco Total";
      $this->load->view('editarExtractoSecoTotal', $data);

} else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarDurabilidad(){
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "gMuestra1" => $this->input->post('gMuestra1'),
                          "gMuestra2" => $this->input->post('gMuestra2'),
                          "gMuestraBlanco" => $this->input->post('gMuestraBlanco'),
                          "volumenH2SO41" => $this->input->post('volumenH2SO41'),                          
                          "volumenH2SO42" => $this->input->post('volumenH2SO42'),
                          "volumenH2SO4Blanco" => $this->input->post('volumenH2SO4Blanco'),
                          "nH2SO41" => $this->input->post('nH2SO41'),    
                          "nH2SO42" => $this->input->post('nH2SO42'), 
                          "nH2SO4Blanco" => $this->input->post('nH2SO4Blanco'),
                          "volumenNaOH1" => $this->input->post('volumenNaOH1'),
                          "volumenNaOH2" => $this->input->post('volumenNaOH2'),                      
                          "volumenNaOHBlanco" => $this->input->post('volumenNaOHBlanco'), 
                          "resutadoH2SO41" => $this->input->post('resutadoH2SO41'),
                          "resutadoH2SO42" => $this->input->post('resutadoH2SO42'),
                          "resutadoH2SO4Blanco" => $this->input->post('resutadoH2SO4Blanco'),
                          "promedioH2SO4" => $this->input->post('promedioH2SO4'),  
                          "promedioH2SO4Blanco" => $this->input->post('promedioH2SO4Blanco'),                                             
                          "responsable" => $this->input->post('responsable')
                         );
      $this->durabilidad->actualizarDurabilidad($this->input->post('codigoInterno'), $datosRegistro);
      $this->actividades->registrarActividad('Durabilidad Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'durabilidad' => $this->durabilidad->buscarDurabilidad($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "durabilidad", $datosActualizarResultado);

      $data['analisisActualizado'] = "Durabilidad";
      $this->load->view('editarDurabilidad', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarAcidezVolatil(){
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vNaOh1" => $this->input->post('vNaOh1'),                          
                          "vNaOh2" => $this->input->post('vNaOh2'),
                          "nNaOh1" => $this->input->post('nNaOh1'),    
                          "nNaOh2" => $this->input->post('nNaOh2'), 
                          "acidezVolatil1" => $this->input->post('acidezVolatil1'),
                          "acidezVolatil2" => $this->input->post('acidezVolatil2'),                      
                          "acidezFija1" => $this->input->post('acidezFija1'),
                          "acidezFija2" => $this->input->post('acidezFija2'),
                          "promedio" => $this->input->post('promedio'),                                              
                          "responsable" => $this->input->post('responsable')
                         ); 

      $this->acidezVolatil->actualizarAcidezVolatil($this->input->post('codigoInterno'), $datosRegistro);
      $this->actividades->registrarActividad('Acidéz Volátil Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'acidezVolatil' => $this->acidezVolatil->buscarAcidezVolatil($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "acidezVolatil", $datosActualizarResultado);

      $data['analisisActualizado'] = "Acidéz Volátil";
      $this->load->view('editarAcidezVolatil', $data);
 } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarAcidezLibre(){
    if($this->session->userdata('estadoSesion')) {

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "gMlMuestra1" => $this->input->post('gMlMuestra1'),
                          "gMlMuestra2" => $this->input->post('gMlMuestra2'),
                          "vFinal1" => $this->input->post('vFinal1'),                          
                          "vFinal2" => $this->input->post('vFinal2'),
                          "nNaOh1" => $this->input->post('nNaOh1'),    
                          "nNaOh2" => $this->input->post('nNaOh2'), 
                          "vNaOh1" => $this->input->post('vNaOh1'),
                          "vNaOh2" => $this->input->post('vNaOh2'),                      
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "promedio" => $this->input->post('promedio'),                                              
                          "responsable" => $this->input->post('responsable')
                         );   


      $this->acidezLibre->actualizarAcidezLibre($this->input->post('codigoInterno'), $datosRegistro);
      $this->actividades->registrarActividad('Acidéz Libre Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));


      $data = array(
                  'acidezLibre' => $this->acidezLibre->buscarAcidezLibre($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "acidezLibre", $datosActualizarResultado);

      $data['analisisActualizado'] = "Acidéz Libre";
      $this->load->view('editarAcidezLibre', $data);

} else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarAcidezTotal(){
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "gMlMuestra1" => $this->input->post('gMlMuestra1'),
                          "gMlMuestra2" => $this->input->post('gMlMuestra2'),
                          "vFinal1" => $this->input->post('vFinal1'),                          
                          "vFinal2" => $this->input->post('vFinal2'),
                          "nNaOh1" => $this->input->post('nNaOh1'),    
                          "nNaOh2" => $this->input->post('nNaOh2'), 
                          "vNaOh1" => $this->input->post('vNaOh1'),
                          "vNaOh2" => $this->input->post('vNaOh2'),                      
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "promedio" => $this->input->post('promedio'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->acidezTotal->actualizarAcidezTotal($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Acidéz Total Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));


      $data = array(
                  'acidezTotal' => $this->acidezTotal->buscarAcidezTotal($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "acidezTotal", $datosActualizarResultado);

      $data['analisisActualizado'] = "Acidéz Total";
      $this->load->view('editarAcidezTotal', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }


   public function actualizarAluminio(){
    if($this->session->userdata('estadoSesion')) {
     $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "vFinal1" => $this->input->post('vFinal1'),                          
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),
                          "absorbancia1" => $this->input->post('absorbancia1'),    
                          "absorbancia2" => $this->input->post('absorbancia2'),                       
                          "absorbanciaSolucionCartaControl" => $this->input->post('absorbanciaSolucionCartaControl'),
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),                          
                          "concentracionCorregida1" => $this->input->post('concentracionCorregida1'),
                          "concentracionCorregida2" => $this->input->post('concentracionCorregida2'),
                          "concentracionCorregidaSolucionCartaControl" => $this->input->post('concentracionCorregidaSolucionCartaControl'),            
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),                                              
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
     $this->aluminio->actualizarAluminio($this->input->post('codigoInterno'), $datosRegistro);
     $this->actividades->registrarActividad('Aluminio Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));


      $data = array(
                  'aluminio' => $this->aluminio->buscarAluminio($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "aluminio", $datosActualizarResultado);

      $data['analisisActualizado'] = "Aluminio";
      $this->load->view('editarAluminio', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
   }

  public function actualizarMetales(){
    if($this->session->userdata('estadoSesion')) {
   $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "metal" => $this->input->post('metal'),
                          "metalSolucionCartaControl" => $this->input->post('metalSolucionCartaControl'),
                          "tecnica" => $this->input->post('tecnica'),
                          "tecnicaSolucionCartaControl" => $this->input->post('tecnicaSolucionCartaControl'),                          
                          "cantidadMuestra" => $this->input->post('cantidadMuestra'),
                          "cantidadMuestraSolucionCartaControl" => $this->input->post('cantidadMuestraSolucionCartaControl'),
                          "vFinal" => $this->input->post('vFinal'),                          
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),
                          "factorDilucion" => $this->input->post('factorDilucion'),
                          "factorDilucionSolucionCartaControl" => $this->input->post('factorDilucionSolucionCartaControl'),                          
                          "absorbancia" => $this->input->post('absorbancia'),
                          "absorbanciaSolucionCartaControl" => $this->input->post('absorbanciaSolucionCartaControl'),            
                          "concentracionLeida" => $this->input->post('concentracionLeida'),                          
                          "concentracionLeidaSolucionCartaControl" => $this->input->post('concentracionLeidaSolucionCartaControl'),
                          "concentracionMgUg" => $this->input->post('concentracionMgUg'),
                          "concentracionMgUgSolucionCartaControl" => $this->input->post('concentracionMgUgSolucionCartaControl'),
                          "concentracionCorregida" => $this->input->post('concentracionCorregida'),
                          "concentracionCorregidaSolucionCartaControl" => $this->input->post('concentracionCorregidaSolucionCartaControl'),
                          "unidades" => $this->input->post('unidades'),
                          "unidadesSolucionCartaControl" => $this->input->post('unidadesSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );

      $this->metales->actualizarMetales($this->input->post('codigoInterno'), $datosRegistro);
      $this->actividades->registrarActividad('Metales Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'metales' => $this->metales->buscarMetales($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "metales", $datosActualizarResultado);

      $data['analisisActualizado'] = "Metales";
      $this->load->view('editarMetales', $data);
} else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarCloroResidual(){
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra1" => $this->input->post('codigoMuestra1'),
                          "codigoMuestra2" => $this->input->post('codigoMuestra2'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),                          
                          "vFas1" => $this->input->post('vFas1'),
                          "vFas2" => $this->input->post('vFas2'),
                          "vFasSolucionCartaControl" => $this->input->post('vFasSolucionCartaControl'),                          
                          "nFas1" => $this->input->post('nFas1'),
                          "nFas2" => $this->input->post('nFas2'),
                          "nFasSolucionCartaControl" => $this->input->post('nFasSolucionCartaControl'),                          
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "resultadoSolucionCartaControl" => $this->input->post('resultadoSolucionCartaControl'),                   
                          "promedio" => $this->input->post('promedio'),                          
                          "promedioSolucionCartaControl" => $this->input->post('promedioSolucionCartaControl'),
                          "responsable1" => $this->input->post('responsable1'),
                          "responsable2" => $this->input->post('responsable2')
                         );
    $this->cloroResidual->actualizarCloroResidual($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Cloro Residual Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'cloroResidual' => $this->cloroResidual->buscarCloroResidual($this->input->post('codigoInterno'), $this->input->post('codigoMuestra1'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra1')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "cloroResidual", $datosActualizarResultado);

      $data['analisisActualizado'] = "Cloro Residual";
      $this->load->view('editarCloroResidual', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

   public function actualizarDurezaCalcicaMagnesica(){
    if($this->session->userdata('estadoSesion')) {

     $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "codigoMuestra1" => $this->input->post('codigoMuestra1'),
                          "codigoMuestra2" => $this->input->post('codigoMuestra2'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),                          
                          "vFinalBlanco" => $this->input->post('vFinalBlanco'),
                          "vFinal1" => $this->input->post('vFinal1'),
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),                          
                          "concentracionEdtaBlanco" => $this->input->post('concentracionEdtaBlanco'),
                          "concentracionEdta1" => $this->input->post('concentracionEdta1'),
                          "concentracionEdta2" => $this->input->post('concentracionEdta2'),
                          "concentracionEdtaSolucionCartaControl" => $this->input->post('concentracionEdtaSolucionCartaControl'),                          
                          "vEdtaBlanco" => $this->input->post('vEdtaBlanco'),
                          "vEdta1" => $this->input->post('vEdta1'),
                          "vEdta2" => $this->input->post('vEdta2'),
                          "vEdtaSolucionCartaControl" => $this->input->post('vEdtaSolucionCartaControl'),
                          "durezaCalcicaBlanco" => $this->input->post('durezaCalcicaBlanco'),
                          "durezaCalcica" => $this->input->post('durezaCalcica'),
                          "durezaCalcicaSolucionCartaControl" => $this->input->post('durezaCalcicaSolucionCartaControl'),
                          "durezaMagnesicaBlanco" => $this->input->post('durezaMagnesicaBlanco'),                   
                          "durezaMagnesica" => $this->input->post('durezaMagnesica'),
                          "durezaMagnesicaSolucionCartaControl" => $this->input->post('durezaMagnesicaSolucionCartaControl'),                          
                          "responsable" => $this->input->post('responsable')
                         );

     $this->durezaCalcicaMagnesica->actualizarDurezaCalcicaMagnesica($this->input->post('codigoInterno'), $datosRegistro);
     $this->actividades->registrarActividad('Dureza Cálcica Magnésica Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'durezaCalcicaMagnesica' => $this->durezaCalcicaMagnesica->buscarDurezaCalcicaMagnesica($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "durezaCalcicaMagnesica", $datosActualizarResultado);

      $data['analisisActualizado'] = "Dureza Cálcica Magnésica";
      $this->load->view('editarDurezaCalcicaMagnesica', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
   }

  public function actualizarDurezaTotal(){
    if($this->session->userdata('estadoSesion')) {

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),                          
                          "vFinalBlanco" => $this->input->post('vFinalBlanco'),
                          "vFinal1" => $this->input->post('vFinal1'),
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),                          
                          "concentracionEdtaBlanco" => $this->input->post('concentracionEdtaBlanco'),
                          "concentracionEdta1" => $this->input->post('concentracionEdta1'),
                          "concentracionEdta2" => $this->input->post('concentracionEdta2'),
                          "concentracionEdtaSolucionCartaControl" => $this->input->post('concentracionEdtaSolucionCartaControl'),                          
                          "vEdtaBlanco" => $this->input->post('vEdtaBlanco'),
                          "vEdta1" => $this->input->post('vEdta1'),
                          "vEdta2" => $this->input->post('vEdta2'),
                          "vEdtaSolucionCartaControl" => $this->input->post('vEdtaSolucionCartaControl'),
                          "resultadoBlanco" => $this->input->post('resultadoBlanco'),
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "resultadoSolucionCartaControl" => $this->input->post('resultadoSolucionCartaControl'),                   
                          "promedioBlanco" => $this->input->post('promedioBlanco'),
                          "promedio" => $this->input->post('promedio'),                          
                          "promedioSolucionCartaControl" => $this->input->post('promedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );

     $this->durezaTotal->actualizarDurezaTotal($this->input->post('codigoInterno'), $datosRegistro);
     $this->actividades->registrarActividad('Dureza Total Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'durezaTotal' => $this->durezaTotal->buscarDurezaTotal($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "durezaTotal", $datosActualizarResultado);

      $data['analisisActualizado'] = "Dureza Total";
      $this->load->view('editarDurezaTotal', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarSulfatos(){
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),                          
                          "vFinal1" => $this->input->post('vFinal1'),
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),                          
                          "turbiedad1" => $this->input->post('turbiedad1'),
                          "turbiedad2" => $this->input->post('turbiedad2'),
                          "turbiedadSolucionCartaControl" => $this->input->post('turbiedadSolucionCartaControl'),                          
                          "tBlanco" => $this->input->post('tBlanco'),
                          "tBlancoSolucionCartaControl" => $this->input->post('tBlancoSolucionCartaControl'),
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),                   
                          "promedio" => $this->input->post('promedio'),                          
                          "promedioSolucionCartaControl" => $this->input->post('promedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );

      $this->sulfatos->actualizarSulfatos($this->input->post('codigoInterno'), $datosRegistro);
      $this->actividades->registrarActividad('Sulfatos Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                  'sulfatos' => $this->sulfatos->buscarSulfatos($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "sulfatos", $datosActualizarResultado);

      $data['analisisActualizado'] = "sulfatos";
      $this->load->view('editarSulfatos', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }

  }

  public function actualizarCloruros(){
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "codigoMuestra1" => $this->input->post('codigoMuestra1'),
                          "codigoMuestra2" => $this->input->post('codigoMuestra2'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "vFinalBlanco" => $this->input->post('vFinalBlanco'),
                          "vFinal1" => $this->input->post('vFinal1'),
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),
                          "nAgno3Blanco" => $this->input->post('nAgno3Blanco'),
                          "nAgno31" => $this->input->post('nAgno31'),
                          "nAgno32" => $this->input->post('nAgno32'),
                          "nAgno3SolucionCartaControl" => $this->input->post('nAgno3SolucionCartaControl'),
                          "vAgno3Blanco" => $this->input->post('vAgno3Blanco'),
                          "vAgno31" => $this->input->post('vAgno31'),
                          "vAgno32" => $this->input->post('vAgno32'),
                          "vAgno3SolucionCartaControl" => $this->input->post('vAgno3SolucionCartaControl'),
                          "concentracionBlanco" => $this->input->post('concentracionBlanco'),
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),
                          "concentracionPromedioBlanco" => $this->input->post('concentracionPromedioBlanco'),
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );

   $this->cloruros->actualizarCloruros($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Cloruros Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

    $data = array(
                  'cloruros' => $this->cloruros->buscarCloruros($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "cloruros", $datosActualizarResultado);

      $data['analisisActualizado'] = "cloruros";
      $this->load->view('editarCloruros', $data);
} else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarNitratos(){
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),                          
                          "abs2201" => $this->input->post('abs2201'),
                          "abs2202" => $this->input->post('abs2202'),
                          "abs220SolucionCartaControl" => $this->input->post('abs220SolucionCartaControl'),                          
                          "abs2751" => $this->input->post('abs2751'),
                          "abs2752" => $this->input->post('abs2752'),
                          "abs275SolucionCartaControl" => $this->input->post('abs275SolucionCartaControl'),                          
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),                   
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),                          
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->nitratos->actualizarNitratos($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Nitratos Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

    $data = array(
                  'nitratos' => $this->nitratos->buscarNitratos($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "nitratos", $datosActualizarResultado);

      $data['analisisActualizado'] = "Nitratos";
      $this->load->view('editarNitratos', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }


  public function actualizarNitritos(){
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),                          
                          "vFinal1" => $this->input->post('vFinal1'),
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),                          
                          "absorbancia1" => $this->input->post('absorbancia1'),
                          "absorbancia2" => $this->input->post('absorbancia2'),
                          "absorbanciaSolucionCartaControl" => $this->input->post('absorbanciaSolucionCartaControl'),                          
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),                         
                          "concentracionCorregida1" => $this->input->post('concentracionCorregida1'),
                          "concentracionCorregida2" => $this->input->post('concentracionCorregida2'),
                          "concentracionCorregidaSolucionCartaControl" => $this->input->post('concentracionCorregidaSolucionCartaControl'),                          
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),                          
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );

   $this->nitritos->actualizarNitritos($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Nitritos Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

    $data = array(
                  'nitritos' => $this->nitritos->buscarNitritos($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "nitritos", $datosActualizarResultado);

      $data['analisisActualizado'] = "Nitritos";
      $this->load->view('editarNitritos', $data);
   } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarHidroxidos(){
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "nH2SO4Blanco" => $this->input->post('nH2SO4Blanco'),
                          "nH2SO41" => $this->input->post('nH2SO41'),
                          "nH2SO42" => $this->input->post('nH2SO42'),
                          "nH2SO4SolucionCartaControl" => $this->input->post('nH2SO4SolucionCartaControl'),
                          "vH2SO4Blanco" => $this->input->post('vH2SO4Blanco'),
                          "vH2SO41" => $this->input->post('vH2SO41'),
                          "vH2SO42" => $this->input->post('vH2SO42'),
                          "vH2SO4SolucionCartaControl" => $this->input->post('vH2SO4SolucionCartaControl'),
                          "phBlanco" => $this->input->post('phBlanco'),
                          "ph1" => $this->input->post('ph1'),
                          "ph2" => $this->input->post('ph2'),
                          "phSolucionCartaControl" => $this->input->post('phSolucionCartaControl'),
                          "resultadoBlanco" => $this->input->post('resultadoBlanco'),
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "resultadoSolucionCartaControl" => $this->input->post('resultadoSolucionCartaControl'),
                          "vH2SO4SegundoBlanco" => $this->input->post('vH2SO4SegundoBlanco'),
                          "vH2SO4Segundo1" => $this->input->post('vH2SO4Segundo1'),
                          "vH2SO4Segundo2" => $this->input->post('vH2SO4Segundo2'),
                          "vH2SO4SegundoSolucionCartaControl" => $this->input->post('vH2SO4SegundoSolucionCartaControl'),
                          "phSegundoBlanco" => $this->input->post('phSegundoBlanco'),
                          "phSegundo1" => $this->input->post('phSegundo1'),
                          "phSegundo2" => $this->input->post('phSegundo2'),
                          "phSegundoSolucionCartaControl" => $this->input->post('phSegundoSolucionCartaControl'),
                          "resultadoCarbonatosBlanco" => $this->input->post('resultadoCarbonatosBlanco'),
                          "resultadoCarbonatos1" => $this->input->post('resultadoCarbonatos1'),
                          "resultadoCarbonatos2" => $this->input->post('resultadoCarbonatos2'),
                          "resultadoCarbonatosSolucionCartaControl" => $this->input->post('resultadoCarbonatosSolucionCartaControl'),
                          "promedioCarbonatosBlanco" => $this->input->post('promedioCarbonatosBlanco'),
                          "promedioCarbonatos1" => $this->input->post('promedioCarbonatos1'),
                          "promedioCarbonatosSolucionCartaControl" => $this->input->post('promedioCarbonatosSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );

    $this->hidroxidos->actualizarHidroxidos($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Hidróxidos', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

    $data = array(
                  'hidroxidos' => $this->hidroxidos->buscarHidroxidos($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "hidroxidos", $datosActualizarResultado);

      $data['analisisActualizado'] = "Hidróxidos";

      $this->load->view('editarHidroxidos', $data);

      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarBicarbonatos(){
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "nH2SO4Blanco" => $this->input->post('nH2SO4Blanco'),
                          "nH2SO41" => $this->input->post('nH2SO41'),
                          "nH2SO42" => $this->input->post('nH2SO42'),
                          "nH2SO4SolucionCartaControl" => $this->input->post('nH2SO4SolucionCartaControl'),
                          "vH2SO4Blanco" => $this->input->post('vH2SO4Blanco'),
                          "vH2SO41" => $this->input->post('vH2SO41'),
                          "vH2SO42" => $this->input->post('vH2SO42'),
                          "vH2SO4SolucionCartaControl" => $this->input->post('vH2SO4SolucionCartaControl'),
                          "phBlanco" => $this->input->post('phBlanco'),
                          "ph1" => $this->input->post('ph1'),
                          "ph2" => $this->input->post('ph2'),
                          "phSolucionCartaControl" => $this->input->post('phSolucionCartaControl'),
                          "resultadoBlanco" => $this->input->post('resultadoBlanco'),
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "resultadoSolucionCartaControl" => $this->input->post('resultadoSolucionCartaControl'),
                          "vH2SO4SegundoBlanco" => $this->input->post('vH2SO4SegundoBlanco'),
                          "vH2SO4Segundo1" => $this->input->post('vH2SO4Segundo1'),
                          "vH2SO4Segundo2" => $this->input->post('vH2SO4Segundo2'),
                          "vH2SO4SegundoSolucionCartaControl" => $this->input->post('vH2SO4SegundoSolucionCartaControl'),
                          "phSegundoBlanco" => $this->input->post('phSegundoBlanco'),
                          "phSegundo1" => $this->input->post('phSegundo1'),
                          "phSegundo2" => $this->input->post('phSegundo2'),
                          "phSegundoSolucionCartaControl" => $this->input->post('phSegundoSolucionCartaControl'),
                          "resultadoCarbonatosBlanco" => $this->input->post('resultadoCarbonatosBlanco'),
                          "resultadoCarbonatos1" => $this->input->post('resultadoCarbonatos1'),
                          "resultadoCarbonatos2" => $this->input->post('resultadoCarbonatos2'),
                          "resultadoCarbonatosSolucionCartaControl" => $this->input->post('resultadoCarbonatosSolucionCartaControl'),
                          "promedioCarbonatosBlanco" => $this->input->post('promedioCarbonatosBlanco'),
                          "promedioCarbonatos1" => $this->input->post('promedioCarbonatos1'),
                          "promedioCarbonatosSolucionCartaControl" => $this->input->post('promedioCarbonatosSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->bicarbonatos->actualizarBicarbonatos($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Bicarbonatos Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

    $data = array(
                  'bicarbonatos' => $this->bicarbonatos->buscarBicarbonatos($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "bicarbonatos", $datosActualizarResultado);

      $data['analisisActualizado'] = "Bicarbonatos";

      $this->load->view('editarBicarbonatos', $data);
} else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarCarbonatos() {
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "nH2SO4Blanco" => $this->input->post('nH2SO4Blanco'),
                          "nH2SO41" => $this->input->post('nH2SO41'),
                          "nH2SO42" => $this->input->post('nH2SO42'),
                          "nH2SO4SolucionCartaControl" => $this->input->post('nH2SO4SolucionCartaControl'),
                          "vH2SO4Blanco" => $this->input->post('vH2SO4Blanco'),
                          "vH2SO41" => $this->input->post('vH2SO41'),
                          "vH2SO42" => $this->input->post('vH2SO42'),
                          "vH2SO4SolucionCartaControl" => $this->input->post('vH2SO4SolucionCartaControl'),
                          "phBlanco" => $this->input->post('phBlanco'),
                          "ph1" => $this->input->post('ph1'),
                          "ph2" => $this->input->post('ph2'),
                          "phSolucionCartaControl" => $this->input->post('phSolucionCartaControl'),
                          "resultadoBlanco" => $this->input->post('resultadoBlanco'),
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "resultadoSolucionCartaControl" => $this->input->post('resultadoSolucionCartaControl'),
                          "vH2SO4SegundoBlanco" => $this->input->post('vH2SO4SegundoBlanco'),
                          "vH2SO4Segundo1" => $this->input->post('vH2SO4Segundo1'),
                          "vH2SO4Segundo2" => $this->input->post('vH2SO4Segundo2'),
                          "vH2SO4SegundoSolucionCartaControl" => $this->input->post('vH2SO4SegundoSolucionCartaControl'),
                          "phSegundoBlanco" => $this->input->post('phSegundoBlanco'),
                          "phSegundo1" => $this->input->post('phSegundo1'),
                          "phSegundo2" => $this->input->post('phSegundo2'),
                          "phSegundoSolucionCartaControl" => $this->input->post('phSegundoSolucionCartaControl'),
                          "resultadoCarbonatosBlanco" => $this->input->post('resultadoCarbonatosBlanco'),
                          "resultadoCarbonatos1" => $this->input->post('resultadoCarbonatos1'),
                          "resultadoCarbonatos2" => $this->input->post('resultadoCarbonatos2'),
                          "resultadoCarbonatosSolucionCartaControl" => $this->input->post('resultadoCarbonatosSolucionCartaControl'),
                          "promedioCarbonatosBlanco" => $this->input->post('promedioCarbonatosBlanco'),
                          "promedioCarbonatos1" => $this->input->post('promedioCarbonatos1'),
                          "promedioCarbonatosSolucionCartaControl" => $this->input->post('promedioCarbonatosSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );

    $this->carbonatos->actualizarCarbonatos($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Carbonatos Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    
    $data = array(
                    'carbonatos' => $this->carbonatos->buscarCarbonatos($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "carbonatos", $datosActualizarResultado);

      $data['analisisActualizado'] = "Carbonatos";

      $this->load->view('editarCarbonatos', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarAlcalinidadTotal(){
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "nH2SO4Blanco" => $this->input->post('nH2SO4Blanco'),
                          "nH2SO41" => $this->input->post('nH2SO41'),
                          "nH2SO42" => $this->input->post('nH2SO42'),
                          "nH2SO4SolucionCartaControl" => $this->input->post('nH2SO4SolucionCartaControl'),
                          "vH2SO4Blanco" => $this->input->post('vH2SO4Blanco'),
                          "vH2SO41" => $this->input->post('vH2SO41'),
                          "vH2SO42" => $this->input->post('vH2SO42'),
                          "vH2SO4SolucionCartaControl" => $this->input->post('vH2SO4SolucionCartaControl'),
                          "phBlanco" => $this->input->post('phBlanco'),
                          "ph1" => $this->input->post('ph1'),
                          "ph2" => $this->input->post('ph2'),
                          "phSolucionCartaControl" => $this->input->post('phSolucionCartaControl'),
                          "resultadoBlanco" => $this->input->post('resultadoBlanco'),
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "resultadoSolucionCartaControl" => $this->input->post('resultadoSolucionCartaControl'),
                          "promedioBlanco" => $this->input->post('promedioBlanco'),
                          "promedio1" => $this->input->post('promedio1'),
                          "promedio2" => $this->input->post('promedio2'),
                          "promedioSolucionCartaControl" => $this->input->post('promedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->alcalinidadTotal->actualizarAlcalinidadTotal($this->input->post('codigoInterno'), $datosRegistro);
    $this->actividades->registrarActividad('Alcalinidad Total Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));


    $data = array(
                    'alcalinidadTotal' => $this->alcalinidadTotal->buscarAlcalinidadTotal($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "alcalinidadTotal", $datosActualizarResultado);

      $data['analisisActualizado'] = "Alcalinidad Total";

      $this->load->view('editarAlcalinidadTotal', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarAnalisisFisicos() {
    if($this->session->userdata('estadoSesion')) {
    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "ph1" => $this->input->post('ph1'),
                          "ph2" => $this->input->post('ph2'),
                          "phPromedio" => $this->input->post('phPromedio'),
                          "phSolucionCartaControl" => $this->input->post('phSolucionCartaControl'),
                          "phResponsable" => $this->input->post('phResponsable'),
                          "temperatura1" => $this->input->post('temperatura1'),
                          "temperatura2" => $this->input->post('temperatura2'),
                          "temperaturaPromedio" => $this->input->post('temperaturaPromedio'),
                          "temperaturaSolucionCartaControl" => $this->input->post('temperaturaSolucionCartaControl'),
                          "temperaturaResponsable" => $this->input->post('temperaturaResponsable'),
                          "colorAparente1" => $this->input->post('colorAparente1'),
                          "colorAparente2" => $this->input->post('colorAparente2'),
                          "colorAparentePromedio" => $this->input->post('colorAparentePromedio'),
                          "colorAparenteSolucionCartaControl" => $this->input->post('colorAparenteSolucionCartaControl'),
                          "colorAparenteResponsable" => $this->input->post('colorAparenteResponsable'),
                          "colorVerdadero1" => $this->input->post('colorVerdadero1'),
                          "colorVerdadero2" => $this->input->post('colorVerdadero2'),
                          "colorVerdaderoPromedio" => $this->input->post('colorVerdaderoPromedio'),
                          "colorVerdaderoSolucionCartaControl" => $this->input->post('colorVerdaderoSolucionCartaControl'),
                          "colorVerdaderoResponsable" => $this->input->post('colorVerdaderoResponsable'),
                          "turbiedad1" => $this->input->post('turbiedad1'),
                          "turbiedad2" => $this->input->post('turbiedad2'),
                          "turbiedadPromedio" => $this->input->post('turbiedadPromedio'),
                          "turbiedadSolucionCartaControl" => $this->input->post('turbiedadSolucionCartaControl'),
                          "turbiedadResponsable" => $this->input->post('turbiedadResponsable'),
                          "sustanciasFlotantes1" => $this->input->post('sustanciasFlotantes1'),
                          "sustanciasFlotantes2" => $this->input->post('sustanciasFlotantes2'),
                          "sustanciasFlotantesPromedio" => $this->input->post('sustanciasFlotantesPromedio'),
                          "sustanciasFlotantesSolucionCartaControl" => $this->input->post('sustanciasFlotantesSolucionCartaControl'),
                          "sustanciasFlotantesResponsable" => $this->input->post('sustanciasFlotantesResponsable'),
                          "olor1" => $this->input->post('olor1'),
                          "olor2" => $this->input->post('olor2'),
                          "olorPromedio" => $this->input->post('olorPromedio'),
                          "olorSolucionCartaControl" => $this->input->post('olorSolucionCartaControl'),
                          "olorResponsable" => $this->input->post('olorResponsable'),
                          "oxigenoDisuelto1" => $this->input->post('oxigenoDisuelto1'),
                          "oxigenoDisuelto2" => $this->input->post('oxigenoDisuelto2'),
                          "oxigenoDisueltoPromedio" => $this->input->post('oxigenoDisueltoPromedio'),
                          "oxigenoDisueltoSolucionCartaControl" => $this->input->post('oxigenoDisueltoSolucionCartaControl'),
                          "oxigenoDisueltoResponsable" => $this->input->post('oxigenoDisueltoResponsable'),
                          "conductividad1" => $this->input->post('conductividad1'),
                          "conductividad2" => $this->input->post('conductividad2'),
                          "conductividadPromedio" => $this->input->post('conductividadPromedio'),
                          "conductividadSolucionCartaControl" => $this->input->post('conductividadSolucionCartaControl'),
                          "conductividadResponsable" => $this->input->post('conductividadResponsable'),
                          "temperaturaSegunda1" => $this->input->post('temperaturaSegunda1'),
                          "temperaturaSegunda2" => $this->input->post('temperaturaSegunda2'),
                          "temperaturaSegundaPromedio" => $this->input->post('temperaturaSegundaPromedio'),
                          "temperaturaSegundaSolucionCartaControl" => $this->input->post('temperaturaSegundaSolucionCartaControl'),
                          "temperaturaSegundaResponsable" => $this->input->post('temperaturaSegundaResponsable'),
                          "fluoruros1" => $this->input->post('fluoruros1'),
                          "fluoruros2" => $this->input->post('fluoruros2'),
                          "fluorurosPromedio" => $this->input->post('fluorurosPromedio'),
                          "fluorurosSolucionCartaControl" => $this->input->post('fluorurosSolucionCartaControl'),
                          "fluorurosResponsable" => $this->input->post('fluorurosResponsable')
                         );
      $this->analisisFisicos->actualizarAnalisisFisicos($this->input->post('codigoInterno'), $datosRegistro);
      $this->actividades->registrarActividad('Análisis Físico Actualizado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      $data = array(
                    'analisisFisicos' => $this->analisisFisicos->buscarAnalisisFisico($this->input->post('codigoInterno'))
                    );
      
      $datosActualizarResultado = array(
                                          "codigoInterno" => $this->input->post('codigoInterno'),
                                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                                           "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                                           "codigoMuestra" => $this->input->post('codigoMuestra')
                                           );
      $this->resultados->actualizarResultado($this->input->post('codigoInterno'), "analisisFisicos", $datosActualizarResultado);

      $data['analisisActualizado'] = "Análisis Físicos";
      
      $this->load->view('editarAnalisisFisicos', $data);
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   } 
  }


  
  
  public function buscarResultado($offset=0) {
    if($this->session->userdata('estadoSesion')) {

    $data = array(
           'resultadoBusqueda' => $this->resultados->buscarResultado($this->input->post('codigoInterno'))
           );
    
    
    if($data['resultadoBusqueda'] == FALSE) {
      $data['resultadoNoEncontrado'] = $this->input->post('codigoInterno');
    }

    
    $this->load->view('consultarResultados', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  } 

  public function cargarConsultarResultados($offset = 0) {
    if ($this->session->userdata('estadoSesion')) {
    $this->load->library('table');
    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->database(); //load library database

    // Config setup
    $numeroFilas = $this->db->count_all("resultados");
    $config['base_url'] = base_url().'index.php/welcome/cargarConsultarResultados';
    $config['total_rows'] = $numeroFilas;
    $config['per_page'] = 10;
    $config['num_links'] = $numeroFilas;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';

    $this->pagination->initialize($config);

    $this->db->select('analisis, codigoInterno, fechaRecepcion, fechaEnsayo, codigoMuestra, operacion');
    $this->db->order_by("id", "desc");
    $data['resultados'] = $this->db->get('resultados', $config['per_page'], $offset);// take record of the table

    $header = array ('Analisis', 'Código Interno','Fecha Recepcion','Fecha Ensayo', 'Código Muestra', 'Operación'); // create table header
    $tmpl = array ( 'table_open' => '<table class="table table-bordered table-condensed table-hover ">' );

    $this->table->set_template($tmpl);
    $this->table->set_heading($header);

    if($numeroFilas == 0) {
      $data['noExisteResultado'] = "No existen resultados";
    }

    $this->load->view('consultarResultados',$data);
    }
   else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }

  public function eliminarRecepcion($cotizacionNo, $offset = 0) {
    if($this->session->userdata('estadoSesion')) {
    $this->recepcion->eliminarRecepcion($cotizacionNo);
    $this->actividades->registrarActividad('Recepción Eliminada', 'No. Cotización', $cotizacionNo, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

    $this->load->library('table');
    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->database(); //load library database

      // Config setup
    $numeroFilas = $this->db->count_all("recepcion");
    $config['base_url'] = base_url().'index.php/welcome/cargarConsultarRecepciones';
    $config['total_rows'] = $numeroFilas;
    $config['per_page'] = 10;
    $config['num_links'] = $numeroFilas;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';

    $this->pagination->initialize($config);

    $this->db->select('cotizacionNo, codigoInterno, fecha, numeroMuestras, operacion');
    $this->db->order_by("cotizacionNo", "desc");
    $data['recepciones'] = $this->db->get('recepcion', $config['per_page'], $offset);// take record of the table

    $header = array ('Cotizacion No.', 'Código Interno','Fecha','Numero Muestras', 'Operación'); // create table header
    $tmpl = array ( 'table_open' => '<table class="table table-bordered table-condensed table-hover ">' );

    $this->table->set_template($tmpl);
    $this->table->set_heading($header);

    $solicitud = $this->recepcion->conseguirRecepciones();

    if($solicitud == FALSE) {
      $data['noExisteRecepcion'] = "No existen recepciones";
    } 

    $data['recepcionEliminada'] = $cotizacionNo;

    $this->load->view('consultarRecepciones', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }
  
  public function verRecepcion($cotizacionNo) {
    if($this->session->userdata('estadoSesion')) {
    $data = array(
                  'recepcion' => $this->recepcion->buscarRecepcion($cotizacionNo),
                  'datosMuestraRecepcion' => $this->datosMuestraRecepcion->buscarMuestras($cotizacionNo),
                  'parametrosRecepcion' => $this->parametrosRecepcion->buscarParametros($cotizacionNo)
            );
    
    $this->load->view('verRecepcion', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarRecepcion() {
    if($this->session->userdata('estadoSesion')) {
    /* Se actualizan los datos de la recepción modificados */
    $datosRegistro = array(
                           "cotizacionNo" => $this->input->post('cotizacionNo'),
                           "codigoInterno" => $this->input->post('codigoInterno'),
                           "fecha" => $this->input->post('fecha'),
                           "numeroMuestras" => $this->input->post('numeroMuestras'),
                           "observacionesCliente" => $this->input->post('observacionesCliente'),
                           "condicionesMuestra" => $this->input->post('condicionesMuestra'),
                           "refrigerada" => $this->input->post('refrigerada')
                          );
    
    $this->recepcion->actualizarRecepcion($this->input->post('cotizacionNo'), $datosRegistro);
    

    /* Array enviado por PHP. Se debe decodifizar y deserializar*/
    $idsMuestras = unserialize(base64_decode($_POST['idsMuestras']));
   
    /* Se actualizan los datos de las muestras modificados */
    for ($i=0; $i < count($idsMuestras); $i++) { 
      $datosRegistro = array(
                             "descripcionMuestra" => $this->input->post('descripcionMuestra'.$idsMuestras[$i]),
                             "consecutivo" => $this->input->post('consecutivo'.$idsMuestras[$i]),
                             "tipoMuestra" => $this->input->post('tipoMuestra'.$idsMuestras[$i]),
                             "horaToma" => $this->input->post('horaToma'.$idsMuestras[$i])
                            );
      $this->datosMuestraRecepcion->actualizarDatosMuestraRecepcion($idsMuestras[$i], $datosRegistro);
    }

    /* los ids vienen en un array con formato x1,x2,x3...xn. Enviado por javaScript*/
    $idsMuestrasBorradasCadena = $_POST['idsMuestrasBorradas']; 
    /* Se crea un array con los datos separados. Uno por posición */
    $idsMuestrasBorradas = explode(",", $idsMuestrasBorradasCadena);  

    /* Se borran las muestras eliminadas*/
    for ($i=0; $i < count($idsMuestrasBorradas); $i++) { 
      $this->datosMuestraRecepcion->eliminarDatosMuestraRecepcion($idsMuestrasBorradas[$i]);
    }

    /* los ids vienen en un array con formato x1,x2,x3...xn. Enviado por javaScript*/
    $idsMuestrasCreadasCadena = $_POST['idsMuestrasCreadas']; 
    /* Se crea un array con los datos separados. Uno por posición */
    $idsMuestrasCreadas = explode(",", $idsMuestrasCreadasCadena);  

    /* Se agregan filas nuevas*/
    if (!empty($idsMuestrasCreadasCadena)) {
      for ($i=0; $i < count($idsMuestrasCreadas); $i++) { 
        $datosRegistro = array(
                             "cotizacionNo" => $this->input->post('cotizacionNo'),
                             "descripcionMuestra" => $this->input->post('descripcionMuestra'.$idsMuestrasCreadas[$i]),
                             "consecutivo" => $this->input->post('consecutivo'.$idsMuestrasCreadas[$i]),
                             "tipoMuestra" => $this->input->post('tipoMuestra'.$idsMuestrasCreadas[$i]),
                             "horaToma" => $this->input->post('horaToma'.$idsMuestrasCreadas[$i])
                            );
        $this->datosMuestraRecepcion->registrarDatosMuestraRecepcion($datosRegistro);
      } 
    }
    
    /* Array enviado por PHP. Se debe decodifizar y deserializar*/
    $idsMuestras2 = unserialize(base64_decode($_POST['idsMuestras2']));
    
    /* Se actualizan los datos de los parámetros modificados */
    for ($i=0; $i < count($idsMuestras2); $i++) { 
      $datosRegistro = array(
                             "parametro" => $this->input->post('parametro'.$idsMuestras2[$i]),
                             "consecutivoA" => $this->input->post('consecutivoA'.$idsMuestras2[$i]),
                             "consecutivoB" => $this->input->post('consecutivoB'.$idsMuestras2[$i]),
                             "consecutivoC" => $this->input->post('consecutivoC'.$idsMuestras2[$i]),
                             "consecutivoD" => $this->input->post('consecutivoD'.$idsMuestras2[$i]),
                             "consecutivoE" => $this->input->post('consecutivoE'.$idsMuestras2[$i]),
                             "consecutivoF" => $this->input->post('consecutivoF'.$idsMuestras2[$i]),
                             "consecutivoG" => $this->input->post('consecutivoG'.$idsMuestras2[$i]),
                             "consecutivoH" => $this->input->post('consecutivoH'.$idsMuestras2[$i]),
                             "consecutivoI" => $this->input->post('consecutivoI'.$idsMuestras2[$i]),
                             "consecutivoJ" => $this->input->post('consecutivoJ'.$idsMuestras2[$i]),
                             "consecutivoK" => $this->input->post('consecutivoK'.$idsMuestras2[$i]),
                             "consecutivoL" => $this->input->post('consecutivoL'.$idsMuestras2[$i])
                            );
      $this->parametrosRecepcion->actualizarParametrosRecepcion($idsMuestras2[$i], $datosRegistro);
    }

    /* los ids vienen en un array con formato x1,x2,x3...xn. Enviado por javaScript*/
    $idsMuestrasBorradasCadena2 = $_POST['idsMuestrasBorradas2']; 
    /* Se crea un array con los datos separados. Uno por posición */
    $idsMuestrasBorradas2 = explode(",", $idsMuestrasBorradasCadena2);  

    /* Se borran las muestras eliminadas*/
    for ($i=0; $i < count($idsMuestrasBorradas2); $i++) { 
      $this->parametrosRecepcion->eliminarParametrosRecepcion($idsMuestrasBorradas2[$i]);
    }

    /* los ids vienen en un array con formato x1,x2,x3...xn. Enviado por javaScript*/
    $idsMuestrasCreadasCadena2 = $_POST['idsMuestrasCreadas2']; 
    /* Se crea un array con los datos separados. Uno por posición */
    $idsMuestrasCreadas2 = explode(",", $idsMuestrasCreadasCadena2);  
    
    /* Se agregan filas nuevas*/
    if (!empty($idsMuestrasCreadasCadena2)) {
      for ($i=0; $i < count($idsMuestrasCreadas2); $i++) { 
        $datosRegistro = array(
                             "cotizacionNo" => $this->input->post('cotizacionNo'),
                             "parametro" => $this->input->post('parametro'.$idsMuestrasCreadas2[$i]),
                             "consecutivoA" => $this->input->post('consecutivoA'.$idsMuestrasCreadas2[$i]),
                             "consecutivoB" => $this->input->post('consecutivoB'.$idsMuestrasCreadas2[$i]),
                             "consecutivoC" => $this->input->post('consecutivoC'.$idsMuestrasCreadas2[$i]),
                             "consecutivoD" => $this->input->post('consecutivoD'.$idsMuestrasCreadas2[$i]),
                             "consecutivoE" => $this->input->post('consecutivoE'.$idsMuestrasCreadas2[$i]),
                             "consecutivoF" => $this->input->post('consecutivoF'.$idsMuestrasCreadas2[$i]),
                             "consecutivoG" => $this->input->post('consecutivoG'.$idsMuestrasCreadas2[$i]),
                             "consecutivoH" => $this->input->post('consecutivoH'.$idsMuestrasCreadas2[$i]),
                             "consecutivoI" => $this->input->post('consecutivoI'.$idsMuestrasCreadas2[$i]),
                             "consecutivoJ" => $this->input->post('consecutivoJ'.$idsMuestrasCreadas2[$i]),
                             "consecutivoK" => $this->input->post('consecutivoK'.$idsMuestrasCreadas2[$i]),
                             "consecutivoL" => $this->input->post('consecutivoL'.$idsMuestrasCreadas2[$i])
                            );
        $this->parametrosRecepcion->registrarParametrosRecepcion($datosRegistro);
      } 
    }
     $this->actividades->registrarActividad('Recepción Actualizada', 'No. Cotización', $this->input->post('cotizacionNo'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

     $data = array(
                  'recepcion' => $this->recepcion->buscarRecepcion($this->input->post('cotizacionNo')),
                  'datosMuestraRecepcion' => $this->datosMuestraRecepcion->buscarMuestras($this->input->post('cotizacionNo')),
                  'parametrosRecepcion' => $this->parametrosRecepcion->buscarParametros($this->input->post('cotizacionNo')),
                  'actualizado' => $this->input->post('cotizacionNo')
            );
    
    $this->load->view('editarRecepcion', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function editarRecepcion($cotizacionNo) {
    if ($this->session->userdata('estadoSesion')) {
      $data = array(
                  'recepcion' => $this->recepcion->buscarRecepcion($cotizacionNo),
                  'datosMuestraRecepcion' => $this->datosMuestraRecepcion->buscarMuestras($cotizacionNo),
                  'parametrosRecepcion' => $this->parametrosRecepcion->buscarParametros($cotizacionNo)
            );
    
      $this->load->view('editarRecepcion', $data);
    }
    else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }

  public function buscarRecepcion($offset=0) {
    if($this->session->userdata('estadoSesion')) {
    $data = array(
           'resultadoBusqueda' => $this->recepcion->buscarRecepcion($this->input->post('CotizacionNoCodigoInterno'))
           );
    
    $this->load->library('table');
    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->database(); //load library database

      // Config setup
    $numeroFilas = $this->db->count_all("recepcion");
    $config['base_url'] = base_url().'index.php/welcome/cargarConsultarRecepciones';
    $config['total_rows'] = $numeroFilas;
    $config['per_page'] = 10;
    $config['num_links'] = $numeroFilas;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';

    $this->pagination->initialize($config);

    $this->db->select('cotizacionNo, codigoInterno, fecha, numeroMuestras, operacion');
    $this->db->order_by("cotizacionNo", "desc");
    $data['recepciones'] = $this->db->get('recepcion', $config['per_page'], $offset);// take record of the table

    $header = array ('Cotizacion No.', 'Código Interno','Fecha','Numero Muestras', 'Operación'); // create table header
    $tmpl = array ( 'table_open' => '<table class="table table-bordered table-condensed table-hover ">' );

    $this->table->set_template($tmpl);
    $this->table->set_heading($header);
    
    if($data['resultadoBusqueda'] == FALSE) {
      $data['recepcionNoEncontrada'] = $this->input->post('CotizacionNoCodigoInterno');
    }

    if($numeroFilas == 0) {
      $data['noExisteRecepcion'] = "No existen recepciones";
    }
    
    $this->load->view('consultarRecepciones', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

 
  public function cargarConsultarRecepciones($offset = 0) {
    if ($this->session->userdata('estadoSesion')) {
    $this->load->library('table');
    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->database(); //load library database

    // Config setup
    $numeroFilas = $this->db->count_all("recepcion");
    $config['base_url'] = base_url().'index.php/welcome/cargarConsultarRecepciones';
    $config['total_rows'] = $numeroFilas;
    $config['per_page'] = 10;
    $config['num_links'] = $numeroFilas;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';

    $this->pagination->initialize($config);

    $this->db->select('cotizacionNo, codigoInterno, fecha, numeroMuestras, operacion');
    $this->db->order_by("cotizacionNo", "desc");
    $data['recepciones'] = $this->db->get('recepcion', $config['per_page'], $offset);// take record of the table

    $header = array ('Cotizacion No.', 'Código Interno','Fecha','Numero Muestras', 'Operación'); // create table header
    $tmpl = array ( 'table_open' => '<table class="table table-bordered table-condensed table-hover ">' );

    $this->table->set_template($tmpl);
    $this->table->set_heading($header);

    if($numeroFilas == 0) {
      $data['noExisteRecepcion'] = "No existen recepciones";
    }

    $this->load->view('consultarRecepciones',$data);
    }
    else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }


  public function registrarRecepcion() {
    if($this->session->userdata('estadoSesion')) {
    $existeRecepcion = $this->recepcion->conseguirRecepcion($_POST['cotizacionNo']);
    if($existeRecepcion) {
      $mensajeError['existeRecepcion'] = $_POST['cotizacionNo'];
      $this->load->view('registrarRecepcion', $mensajeError);
    }
    else {
      /* Crea los links para borrar, editar y ver*/
      $links = '<a class="ask" href="//localhost/laboratorio/index.php/welcome/verRecepcion/'.$this->input->post('cotizacionNo').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
      $links .= anchor('welcome/EditarRecepcion/'.$this->input->post('cotizacionNo') , 'Editar ');
      $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarRecepcion/'.$this->input->post('cotizacionNo').'" class="confirmacion" >Eliminar </a>';

      $datosRegistro = array(
                           "cotizacionNo" => $this->input->post('cotizacionNo'),
                           "codigoInterno" => $this->input->post('codigoInterno'),
                           "fecha" => $this->input->post('fecha'),
                           "numeroMuestras" => $this->input->post('numeroMuestras'),
                           "observacionesCliente" => $this->input->post('observacionesCliente'),
                           "condicionesMuestra" => $this->input->post('condicionesMuestra'),
                           "refrigerada" => $this->input->post('refrigerada'),
                           "operacion" => $links
                          );

      $this->recepcion->registrarRecepcion($datosRegistro);
      $this->actividades->registrarActividad('Recepción Registrada', 'No. Cotización',$this->input->post('cotizacionNo'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

      /* los ids vienen en un array con formato x1,x2,x3...xn. Enviado por javaScript*/
      $idsMuestrasCreadasCadena = $_POST['idsMuestrasCreadas']; 
      /* Se crea un array con los datos separados. Uno por posición */
      $idsMuestrasCreadas = explode(",", $idsMuestrasCreadasCadena);  
    
      if (!empty($idsMuestrasCreadasCadena)) {
        for ($i=0; $i < count($idsMuestrasCreadas); $i++) { 
         $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "descripcionMuestra" => $this->input->post('descripcionMuestra'.$idsMuestrasCreadas[$i]),
                                "consecutivo" => $this->input->post('consecutivo'.$idsMuestrasCreadas[$i]),
                                "tipoMuestra" => $this->input->post('tipoMuestra'.$idsMuestrasCreadas[$i]),
                                "horaToma" => $this->input->post('horaToma'.$idsMuestrasCreadas[$i]) 
                               );
         $this->datosMuestraRecepcion->registrarDatosMuestraRecepcion($datosRegistro);
        }
      }
      else {
        $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "descripcionMuestra" => $this->input->post('descripcionMuestra1'),
                                "consecutivo" => $this->input->post('consecutivo1'),
                                "tipoMuestra" => $this->input->post('tipoMuestra1'),
                                "horaToma" => $this->input->post('horaToma1') 
                               );
         $this->datosMuestraRecepcion->registrarDatosMuestraRecepcion($datosRegistro);
      }
       
      $idsMuestrasCreadasCadena2 = $_POST['idsMuestrasCreadas2']; 
      /* Se crea un array con los datos separados. Uno por posición */
      $idsMuestrasCreadas2 = explode(",", $idsMuestrasCreadasCadena2);  

      if (!empty($idsMuestrasCreadasCadena2)) {
        for ($i=0; $i < count($idsMuestrasCreadas2); $i++) { 
         $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "parametro" => $this->input->post('parametro'.$idsMuestrasCreadas2[$i]),
                                "consecutivoA" => $this->input->post('consecutivoA'.$idsMuestrasCreadas2[$i]),
                                "consecutivoB" => $this->input->post('consecutivoB'.$idsMuestrasCreadas2[$i]),
                                "consecutivoC" => $this->input->post('consecutivoC'.$idsMuestrasCreadas2[$i]),
                                "consecutivoD" => $this->input->post('consecutivoD'.$idsMuestrasCreadas2[$i]),
                                "consecutivoE" => $this->input->post('consecutivoE'.$idsMuestrasCreadas2[$i]),
                                "consecutivoF" => $this->input->post('consecutivoF'.$idsMuestrasCreadas2[$i]),
                                "consecutivoG" => $this->input->post('consecutivoG'.$idsMuestrasCreadas2[$i]),
                                "consecutivoH" => $this->input->post('consecutivoH'.$idsMuestrasCreadas2[$i]),
                                "consecutivoI" => $this->input->post('consecutivoI'.$idsMuestrasCreadas2[$i]),
                                "consecutivoJ" => $this->input->post('consecutivoJ'.$idsMuestrasCreadas2[$i]),
                                "consecutivoK" => $this->input->post('consecutivoK'.$idsMuestrasCreadas2[$i]),
                                "consecutivoL" => $this->input->post('consecutivoL'.$idsMuestrasCreadas2[$i])
                               );
         $this->parametrosRecepcion->registrarParametrosRecepcion($datosRegistro);
        }
      }
      else {
        $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "parametro" => $this->input->post('parametro1'),
                                "consecutivoA" => $this->input->post('consecutivoA1'),
                                "consecutivoB" => $this->input->post('consecutivoB1'),
                                "consecutivoC" => $this->input->post('consecutivoC1'),
                                "consecutivoD" => $this->input->post('consecutivoD1'),
                                "consecutivoE" => $this->input->post('consecutivoE1'),
                                "consecutivoF" => $this->input->post('consecutivoF1'),
                                "consecutivoG" => $this->input->post('consecutivoG1'),
                                "consecutivoH" => $this->input->post('consecutivoH1'),
                                "consecutivoI" => $this->input->post('consecutivoA1'),
                                "consecutivoJ" => $this->input->post('consecutivoJ1'),
                                "consecutivoK" => $this->input->post('consecutivoK1'),
                                "consecutivoL" => $this->input->post('consecutivoL1')
                               );
         $this->parametrosRecepcion->registrarParametrosRecepcion($datosRegistro);
      }
      $mensajeInformativo['recepcionRegistrada'] = $_POST['cotizacionNo'];
    $this->load->view('registrarRecepcion', $mensajeInformativo);
    }
    
    
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function actualizarCotizacion() {
    if($this->session->userdata('estadoSesion')) {
    /* Array enviado por PHP. Se debe decodifizar y deserializar*/
    $idsMuestras = unserialize(base64_decode($_POST['idsMuestras']));
    /* los ids vienen en un array con formato x1,x2,x3...xn. Enviado por javaScript*/
    $idsMuestrasBorradasCadena = $_POST['idsMuestrasBorradas']; 
    /* Se crea un array con los datos separados. Uno por posición */
    $idsMuestrasBorradas = explode(",", $idsMuestrasBorradasCadena);  
    
    /* Se actualizan los datos de la cotización modificados */
    
    $datosRegistro = array(
                           "nitCc" => $this->input->post('nitCc'),
                           "metodoSolicitud" => $this->input->post('metodoSolicitud'),
                           "fecha" => $this->input->post('fecha'),
                           "cotizacionNo" => $this->input->post('cotizacionNo'),
                           "razonSocial" => $this->input->post('razonSocial'),
                           "solicitante" => $this->input->post('solicitante'),
                           "cargo" => $this->input->post('cargo'),
                           "direccion" => $this->input->post('direccion'),
                           "telefonoFax" => $this->input->post('telefonoFax'),
                           "municipioDepartamento" => $this->input->post('municipioDepartamento'),
                           "correoElectronico" => $this->input->post('correoElectronico'),
                           "telefonoFax" => $this->input->post('telefonoFax'),
                           "observaciones" => $this->input->post('observaciones'),
                           "totalPagar" => $this->input->post('totalPagar')
                          );
    
    $this->cotizacion->actualizarCotizacion($this->input->post('cotizacionNo'), $datosRegistro);
  
    /* Se actualizan los datos de las muestras modificados */
    for ($i=0; $i < count($idsMuestras); $i++) { 
      $datosRegistro = array(
                             "tipoMuestra" => $this->input->post('tipoMuestraGuardado'.$idsMuestras[$i]),
                             "parametro" => $this->input->post('parametroGuardado'.$idsMuestras[$i]),
                             "metodo" => $this->input->post('metodoGuardado'.$idsMuestras[$i]),
                             "precioMuestra" => $this->input->post('precioMuestraGuardado'.$idsMuestras[$i]),
                             "noMuestras" => $this->input->post('noMuestrasGuardado'.$idsMuestras[$i]),
                             "valorTotal" => $this->input->post('valorTotalGuardado'.$idsMuestras[$i])
                            );
      $this->datosMuestras->actualizarMuestra($idsMuestras[$i], $datosRegistro);
    }

    /* Se borran las muestras eliminadas*/
    for ($i=0; $i < count($idsMuestrasBorradas); $i++) { 
       $this->datosMuestras->eliminarMuestra($idsMuestrasBorradas[$i]);
     }
   
    /* los ids vienen en un array con formato x1,x2,x3...xn. Enviado por javaScript*/
    $idsMuestrasCreadasCadena = $_POST['idsMuestrasCreadas']; 
    /* Se crea un array con los datos separados. Uno por posición */
    $idsMuestrasCreadas = explode(",", $idsMuestrasCreadasCadena);  

    /* Se agregan filas nuevas*/
    if (!empty($idsMuestrasCreadasCadena)) {
      for ($i=0; $i < count($idsMuestrasCreadas); $i++) { 
        $datosRegistro = array(
                               "cotizacionNo" => $this->input->post('cotizacionNo'),
                               "tipoMuestra" => $this->input->post('tipoMuestra'.$idsMuestrasCreadas[$i]),
                               "parametro" => $this->input->post('parametro'.$idsMuestrasCreadas[$i]),
                               "metodo" => $this->input->post('metodo'.$idsMuestrasCreadas[$i]),
                               "precioMuestra" => $this->input->post('precioMuestra'.$idsMuestrasCreadas[$i]),
                               "noMuestras" => $this->input->post('noMuestras'.$idsMuestrasCreadas[$i]),
                               "valorTotal" => $this->input->post('valorTotal'.$idsMuestrasCreadas[$i])
                              );
        $this->datosMuestras->registrarDatosMuestras($datosRegistro);
      } 
    }

    $this->actividades->registrarActividad('Cotización Actualizada', 'No. Cotización', $this->input->post('cotizacionNo'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    
    $data = array(
                  'cotizacion' => $this->cotizacion->buscarCotizacion($this->input->post('cotizacionNo')),
                  'datosMuestras' => $this->datosMuestras->buscarMuestras($this->input->post('cotizacionNo')),
                  'actualizado' => $this->input->post('cotizacionNo')
            );

    $this->load->view('editarCotizacion', $data); 
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }
  
  public function verCotizacion($cotizacionNo) {
    if($this->session->userdata('estadoSesion')) {
    $data = array(
              'cotizacion' => $this->cotizacion->buscarCotizacion($cotizacionNo),
              'datosMuestras' => $this->datosMuestras->buscarMuestras($cotizacionNo)
            );

    $this->load->view('verCotizacion', $data);
    } else {
    Echo "Inicie sesion para ver la informacion";
   }

  }

  public function editarCotizacion($cotizacionNo) {
    if ($this->session->userdata('estadoSesion')) {
      $data = array(
                  'cotizacion' => $this->cotizacion->buscarCotizacion($cotizacionNo),
                  'datosMuestras' => $this->datosMuestras->buscarMuestras($cotizacionNo)
            );
    
      $this->load->view('editarCotizacion', $data);
    }
    else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }

  public function eliminarCotizacion($cotizacionNo, $offset = 0) {
    if($this->session->userdata('estadoSesion')) {
    $this->cotizacion->eliminarCotizacion($cotizacionNo);
    $this->actividades->registrarActividad('Cotización Eliminada', 'No. Cotización', $cotizacionNo, $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

    $this->load->library('table');
    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->database(); //load library database

    // Config setup
    $numeroFilas=$this->db->count_all("cotizacion");
    $config['base_url'] = base_url().'index.php/welcome/cargarConsultarCotizaciones';
    $config['total_rows'] = $numeroFilas;
    $config['per_page'] = 10;
    $config['num_links'] = $numeroFilas;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';

    $this->pagination->initialize($config);

    $this->db->select('cotizacionNo, nitCc, fecha, solicitante, operacion');
    $this->db->order_by("cotizacionNo", "desc");
    $data['cotizaciones'] = $this->db->get('cotizacion', $config['per_page'], $offset);// take record of the table
    
    $header = array('Cotizacion No.', 'Nit/CC','Fecha','Solicitante', 'Operación'); // create table header
    $tmpl = array ( 'table_open' => '<table class="table table-bordered table-condensed table-hover">' );

    $this->table->set_template($tmpl);
    $this->table->set_heading($header);

    $solicitud = $this->cotizacion->conseguirCotizaciones();

    if($solicitud == FALSE) {
      $data['noExisteCotizacion'] = "No existen cotizaciones";
    } 

    $data['cotizacionEliminada'] = $cotizacionNo;

    $this->load->view('consultarCotizaciones', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }
 
  public function buscarCotizacion($offset=0) {
    if($this->session->userdata('estadoSesion')) {
    $data = array(
           'resultadoBusqueda' => $this->cotizacion->buscarCotizacion($this->input->post('nitCcCotizacionNo'))
           );
    
    $this->load->library('table');
    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->database(); //load library database

    // Config setup
    $numeroFilas = $this->db->count_all("cotizacion");
    $config['base_url'] = base_url().'index.php/welcome/cargarConsultarCotizaciones';
    $config['total_rows'] = $numeroFilas+1;
    $config['per_page'] = 10;
    $config['num_links'] = $numeroFilas+1;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';

    $this->pagination->initialize($config);

    $this->db->select('cotizacionNo, nitCc, fecha, solicitante, operacion');
    $this->db->order_by("cotizacionNo", "desc");
    $data['cotizaciones'] = $this->db->get('cotizacion', $config['per_page'], $offset);// take record of the table

    $header = array ('Cotizacion No.', 'Nit/CC','Fecha','Solicitante', 'Operación'); // create table header
    $tmpl = array ( 'table_open' => '<table class="table table-bordered table-condensed table-hover">' );

    $this->table->set_template($tmpl);
    $this->table->set_heading($header);
    
    if($data['resultadoBusqueda'] == FALSE) {
      $data['cotizacionNoEncontrada'] = $this->input->post('nitCcCotizacionNo');
    }

    if($numeroFilas == 0) {
      $data['noExisteCotizacion'] = "No existen cotizaciones";
    }
    
    $this->load->view('consultarCotizaciones', $data);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function cargarConsultarCotizaciones($offset = 0) {
    if ($this->session->userdata('estadoSesion')) {
    $this->load->library('table');
    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->database(); //load library database

    // Config setup
    $numeroFilas = $this->db->count_all("cotizacion");
    $config['base_url'] = base_url().'index.php/welcome/cargarConsultarCotizaciones';
    $config['total_rows'] = $numeroFilas;
    $config['per_page'] = 10;
    $config['num_links'] = $numeroFilas;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';

    $this->pagination->initialize($config);

    $this->db->select('cotizacionNo, nitCc, fecha, solicitante, operacion');
    $this->db->order_by("cotizacionNo", "desc");
    $data['cotizaciones'] = $this->db->get('cotizacion', $config['per_page'], $offset);// take record of the table

    $header = array ('Cotizacion No.', 'Nit/CC','Fecha','Solicitante', 'Operación'); // create table header
    $tmpl = array ( 'table_open' => '<table class="table table-bordered table-condensed table-hover ">' );

    $this->table->set_template($tmpl);
    $this->table->set_heading($header);

    if($numeroFilas == 0) {
      $data['noExisteCotizacion'] = "No existen cotizaciones";
    }

    $this->load->view('consultarCotizaciones',$data);
    }
   else{
     $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
    }
  }

  public function RegistrarCotizacion() {
    if($this->session->userdata('estadoSesion')) {
      $existeCotizacion = $this->cotizacion->conseguirCotizacion($_POST['cotizacionNo']);
      if($existeCotizacion) {
        $data = array(
                  'year' => date('y'),
                  'numeroCotizaciones' => $this->cotizacion->numeroCotizaciones()+1,
                  'existeCotizacion' => $_POST['cotizacionNo']
                );
        $this->load->view('registrarCotizacion', $data);
      }
      else {
        /* Crea los links para borrar, editar y ver*/
        $links = '<a class="ask" href="//localhost/laboratorio/index.php/welcome/verCotizacion/'.$this->input->post('cotizacionNo').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
        $links .= anchor('welcome/EditarCotizacion/'.$this->input->post('cotizacionNo') , 'Editar ');
        $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarCotizacion/'.$this->input->post('cotizacionNo').'" class="confirmacion" >Eliminar </a>';
        $links .= anchor('welcome/cargarCotizacionRecepcion/'.$this->input->post('cotizacionNo') , ' Cargar Recepción');
        $links .= anchor('welcome/cargarCotizacionInforme/'.$this->input->post('cotizacionNo') , ' Cargar Informe');
        $datosRegistro = array(
                           "id" => $this->input->post('id'),
                           "nitCc" => $this->input->post('nitCc'),
                           "metodoSolicitud" => $this->input->post('metodoSolicitud'),
                           "fecha" => $this->input->post('fecha'),
                           "cotizacionNo" => $this->input->post('cotizacionNo'),
                           "razonSocial" => $this->input->post('razonSocial'),
                           "solicitante" => $this->input->post('solicitante'),
                           "cargo" => $this->input->post('cargo'),
                           "direccion" => $this->input->post('direccion'),
                           "telefonoFax" => $this->input->post('telefonoFax'),
                           "municipioDepartamento" => $this->input->post('municipioDepartamento'),
                           "correoElectronico" => $this->input->post('correoElectronico'),
                           "telefonoFax" => $this->input->post('telefonoFax'),
                           "observaciones" => $this->input->post('observaciones'),
                           "totalPagar" => $this->input->post('totalPagar'),
                           //"firma" => ,
                           "operacion" => $links
                          );

        $this->cotizacion->registrarCotizacion($datosRegistro);
        $this->actividades->registrarActividad('Cotización Registrada', 'No. Cotización', $this->input->post('cotizacionNo'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));

        /* los ids vienen en un array con formato x1,x2,x3...xn. Enviado por javaScript*/
        $idsMuestrasCreadasCadena = $_POST['idsMuestrasCreadas']; 
        /* Se crea un array con los datos separados. Uno por posición */
        $idsMuestrasCreadas = explode(",", $idsMuestrasCreadasCadena);  
      
        if($this->input->post('tipoMuestra1')){ // para que tenga en cuenta la primera fila que no es creada, sino que ya existe.
           array_unshift($idsMuestrasCreadas, 1);
        }

        if (!empty($idsMuestrasCreadasCadena)) {
          for ($i=0; $i < count($idsMuestrasCreadas); $i++) { 
            $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "tipoMuestra" => $this->input->post('tipoMuestra'.$idsMuestrasCreadas[$i]),
                                "parametro" => $this->input->post('parametro'.$idsMuestrasCreadas[$i]),
                                "metodo" => $this->input->post('metodo'.$idsMuestrasCreadas[$i]),
                                "precioMuestra" => $this->input->post('precioMuestra'.$idsMuestrasCreadas[$i]),
                                "noMuestras" => $this->input->post('noMuestras'.$idsMuestrasCreadas[$i]),
                                "valorTotal" => $this->input->post('valorTotal'.$idsMuestrasCreadas[$i])
                               );
            $this->datosMuestras->registrarDatosMuestras($datosRegistro);
          }
        }
        else {
          $datosRegistro = array(
                                "cotizacionNo" => $this->input->post('cotizacionNo'),
                                "tipoMuestra" => $this->input->post('tipoMuestra1'),
                                "parametro" => $this->input->post('parametro1'),
                                "metodo" => $this->input->post('metodo1'),
                                "precioMuestra" => $this->input->post('precioMuestra1'),
                                "noMuestras" => $this->input->post('noMuestras1'),
                                "valorTotal" => $this->input->post('valorTotal1')
                               );
          $this->datosMuestras->registrarDatosMuestras($datosRegistro);
        }
        $data = array(
                  'year' => date('y'),
                  'numeroCotizaciones' => $this->cotizacion->numeroCotizaciones()+1,
                  'cotizacionRegistrada' => $_POST['cotizacionNo']
               );
        $this->load->view('registrarCotizacion', $data);
      }
    } 
    else {
      $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
      $this->load->view('logueo', $data);
    }
  }
  
  public function autorizarLogueo() {

  /*Entra sólo si existen datos enviados por el formulario*/
    if(!empty($_POST)) {
      /*Se solicita usuario a la función "conseguirUsuario" del modelo "Usuarios.php"*/
     	$estadoUsuario = $this->usuarios->conseguirUsuario($_POST['nombre'], $_POST['contrasena']);
      /*Si el usuario existe, entra a la página "principal.php", sino, sigue en el logueo*/
    	if($estadoUsuario) {
        $newdata = array(
                         'usuario'  => $_POST['nombre'],
                         'estadoSesion'     => TRUE
                         );

       $this->session->set_userdata($newdata);

       redirect('welcome/inicio');
      }
    	else {
        /*Se crea mensaje de error*/
        $mensajeError['noExisteUsuario'] = "Usuario no autorizado";
        $this->load->view('logueo', $mensajeError);    
      }
    }
    else {
      redirect('welcome/index');
    }
  }
  
  public function registrarUsuario() {
    if(!empty($_POST)) {
      $existeAdmin = $this->administrador->conseguirAdministrador($_POST['nombreAdmin'], $_POST['contrasenaAdmin']);
      if($existeAdmin) {
        $existeUsuario = $this->usuarios->conseguirUsuarioCorreo($_POST['nombreUsuario'], $_POST['contrasenaUsuario']);
        if($existeUsuario) {
          $mensajeError['existeUsuario'] = "El usuario ya está registrado en la base de datos";
          $this->load->view('logueo', $mensajeError);    
        } 
        else {
      	  $datosRegistro = array(
                                 "nombre" => $this->input->post('nombreUsuario'),
				                         "contrasena"  => $this->input->post('contrasenaUsuario')
                                 );
          /* Se envían los datos del logueo a la función "agregarUsuario" en el modelo "usuarios.php" */
          $this->usuarios->registrarUsuario($datosRegistro);
          $this->actividades->registrarActividad("Registro de Usuario", "Nombre Usuario", $this->input->post('nombreUsuario'),$_POST['nombreAdmin'], date('d-m-Y H:i:s')); 
          $mensajeInformativo['usuarioRegistrado'] = "El usuario ha sido registrado existosamente";
          $this->load->view('logueo', $mensajeInformativo);    
        }
      } 
      else {
        $mensajeError['noExisteAdmin'] = "Nombre de administrador incorrecto";
        $this->load->view('logueo', $mensajeError);   
      }    
    } 
    else {
      redirect('welcome/index');
    }

  }

  public function enviarContrasena() {
    if(!empty($_POST)) {
      $existeUsuario = $this->usuarios->conseguirUsuarioCorreo($_POST['correo']); 
      if($existeUsuario) {
        $para = $_POST['correo'];
        $asunto = 'Recuperacion de contrasena laboratorio de aguas y alimentos UTP';
        $mensaje = 'Tu password es: '.$existeUsuario->contrasena;
        $cabeceras = 'From: diegomix500@gmail.com' . "\r\n" .
        'Reply-To: diegomix500@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        if(mail($para, $asunto, $mensaje, $cabeceras)) {
          $mensajeInformativo['correoEnviado'] = "Correo enviado correctamente";
          $this->actividades->registrarActividad("Envío de contraseña exitoso", "Correo", $_POST['correo'], $_POST['correo'], date('d-m-Y H:i:s'));
          $this->load->view('logueo', $mensajeInformativo);
        } 
        else {
          $mensajeError['correoNoEnviado'] = "El correo no se ha enviado. Intentelo nuevamente";
          $this->actividades->registrarActividad("Envío de contraseña fallido", "Correo", $_POST['correo'], $_POST['correo'], date('d-m-Y H:i:s'));
          $this->load->view('logueo', $mensajeError);
        }
      }
      else {
        $mensajeError['correoNoExiste'] = "No existe usuario con este correo";
        $this->actividades->registrarActividad("Envío de contraseña fallido", "Correo", $_POST['correo'], $_POST['correo'], date('d-m-Y H:i:s'));
        $this->load->view('logueo', $mensajeError);
      }
    }
    else {
      redirect('welcome/index');
    }
  }	

  function registrarResultados() {
    if($this->session->userdata('estadoSesion')) {
    if(!empty($_POST)) {
      $codigoInterno = $_POST['codigoInterno'];
      $fechaRecepcion = $_POST['fechaRecepcion'];
      $analisis = $_POST['analisis'];
      $data['codigoInterno'] = $codigoInterno;
      $data['fechaRecepcion'] = $fechaRecepcion;
      $data['analisis'] = $analisis;

      if($analisis == "analisisFisicos") {
          $existe = $this->analisisFisicos->buscarAnalisisFisico($codigoInterno);
          if($existe) {
            $data['error'] = "El código Interno ya existe en la base de datos";
            $this->load->view('registrarResultados', $data);
          }
          else {
            if ($this->session->userdata('estadoSesion')) {
              $this->load->view('analisisFisicos', $data);
            }
            else{
              $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
            }
          }
      }

      if($analisis == "alcalinidadTotal") {
        $existe = $this->alcalinidadTotal->buscarAlcalinidadTotal($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('alcalinidadTotal', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "carbonatos") {
        $existe = $this->carbonatos->buscarCarbonatos($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('carbonatos', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }
      if($analisis == "bicarbonatos") {
        $existe = $this->bicarbonatos->buscarBicarbonatos($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('bicarbonatos', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
          
        }
      }
      if($analisis == "hidroxidos") {
        $existe = $this->hidroxidos->buscarHidroxidos($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('hidroxidos', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          }
          
        }
      }

      if($analisis == "nitritos") {
        $existe = $this->nitritos->buscarNitritos($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('nitritos', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          }
        }
      }

      if($analisis == "nitratos") {
        $existe = $this->nitratos->buscarNitratos($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('nitratos', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          }
          
        }
      }

      if($analisis == "cloruros") {
        $existe = $this->cloruros->buscarCloruros($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('cloruros', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "sulfatos") {
        $existe = $this->sulfatos->buscarSulfatos($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('sulfatos', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          }  
        }
      }

      if($analisis == "durezaTotal") {
        $existe = $this->durezaTotal->buscarDurezaTotal($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('durezaTotal', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "durezaCalcicaMagnesica") {
        $existe = $this->durezaCalcicaMagnesica->buscarDurezaCalcicaMagnesica($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('durezaCalcicaMagnesica', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          }  
        }
      }

      if($analisis == "cloroResidual") {
        $existe = $this->cloroResidual->buscarCloroResidual($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('cloroResidual', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          }   
        }
      }

      if($analisis == "metales") {
        $existe = $this->metales->buscarMetales($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('metales', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          }   
        }
      }

      if($analisis == "aluminio") {
        $existe = $this->aluminio->buscarAluminio($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
           if ($this->session->userdata('estadoSesion')) {
            $this->load->view('aluminio', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          }    
        }
      }

      if($analisis == "acidezTotal") {
        $existe = $this->acidezTotal->buscarAcidezTotal($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('acidezTotal', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "acidezLibre") {
        $existe = $this->acidezLibre->buscarAcidezLibre($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('acidezLibre', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "acidezVolatil") {
        $existe = $this->acidezVolatil->buscarAcidezVolatil($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
           if ($this->session->userdata('estadoSesion')) {
            $this->load->view('acidezVolatil', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          }
        }
      }

      if($analisis == "durabilidad") {
        $existe = $this->durabilidad->buscarDurabilidad($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('durabilidad', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          }
        }
      }

      if($analisis == "extractoSecoTotal") {
        $existe = $this->extractoSecoTotal->buscarExtractoSecoTotal($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('extractoSecoTotal', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "extractoSecoRm") {
        $existe = $this->extractoSecoRm->buscarExtractoSecoRm($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('extractoSecoRm', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          }  
        }
      }

      if($analisis == "extractoSecoDesengrasado") {
        $existe = $this->extractoSecoDesengrasado->buscarExtractoSecoDesengrasado($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('extractoSecoDesengrasado', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          }   
        }
      }

      if($analisis == "solidosTotales") {
        $existe = $this->solidosTotales->buscarSolidosTotales($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('solidosTotales', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "solidosDisueltosTotales") {
        $existe = $this->solidosDisueltosTotales->buscarSolidosDisueltosTotales($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('solidosDisueltosTotales', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "solidosDisueltosVolatiles") {
        $existe = $this->solidosDisueltosVolatiles->buscarSolidosDisueltosVolatiles($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('solidosDisueltosVolatiles', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "solidosSuspendidosTotales") {
        $existe = $this->solidosSuspendidosTotales->buscarSolidosSuspendidcosTotales($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('solidosSuspendidosTotales', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "solidosSuspendidosVolatiles") {
        $existe = $this->solidosSuspendidosVolatiles->buscarSolidosSuspendidosVolatiles($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('solidosSuspendidosVolatiles', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }
      if($analisis == "solidosSedimentables") {
        $existe = $this->solidosSedimentables->buscarSolidosSedimentables($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('solidosSedimentables', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "solidosInsolubles") {
        $existe = $this->solidosInsolubles->buscarSolidosInsolubles($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('solidosInsolubles', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }
      if($analisis == "basicidad") {
        $existe = $this->basicidad->buscarBasicidad($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('basicidad', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

       if($analisis == "dqo") {
        $existe = $this->dqo->buscarDqo($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('dqo', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "dbo5") {
        $existe = $this->dbo5->buscarDbo5($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('dbo5', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }
      if($analisis == "extraccionSoxhlet") {
        $existe = $this->extraccionSoxhlet->buscarExtraccionSoxhlet($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('extraccionSoxhlet', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "volumetricoGerberBabcock") {
        $existe = $this->volumetricoGerberBabcock->buscarVolumetricoGerberBabcock($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('volumetricoGerberBabcock', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }

      if($analisis == "roseGottlie") {
        $existe = $this->roseGottlie->buscarRoseGottlie($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('roseGottlie', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }
      if($analisis == "hidrocarburos") {
        $existe = $this->hidrocarburos->buscarHidrocarburo($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('hidrocarburos', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }
      if($analisis == "fosfatos") {
        $existe = $this->fosfatos->buscarFosfatos($codigoInterno);
        if($existe) {
          $data['error'] = "El código Interno ya existe en la base de datos";
          $this->load->view('registrarResultados', $data);
        }else {
          if ($this->session->userdata('estadoSesion')) {
            $this->load->view('fosfatos', $data);
          }
          else{
            $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
          } 
        }
      }
    }
    else {
      $this->load->view('registrarResultados');
    }
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarAnalisisFisicos() {
    if($this->session->userdata('estadoSesion')) {
    $existe = $this->analisisFisicos->buscarAnalisisFisico($this->input->post('codigoInterno'));
          if($existe) {
            $data['error'] = "El código Interno para este Análisis Físico ya existe en la base de datos";
            $this->load->view('registrarResultados', $data);
          }
    else{
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    //$links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "ph1" => $this->input->post('ph1'),
                          "ph2" => $this->input->post('ph2'),
                          "phPromedio" => $this->input->post('phPromedio'),
                          "phSolucionCartaControl" => $this->input->post('phSolucionCartaControl'),
                          "phResponsable" => $this->input->post('phResponsable'),
                          "temperatura1" => $this->input->post('temperatura1'),
                          "temperatura2" => $this->input->post('temperatura2'),
                          "temperaturaPromedio" => $this->input->post('temperaturaPromedio'),
                          "temperaturaSolucionCartaControl" => $this->input->post('temperaturaSolucionCartaControl'),
                          "temperaturaResponsable" => $this->input->post('temperaturaResponsable'),
                          "colorAparente1" => $this->input->post('colorAparente1'),
                          "colorAparente2" => $this->input->post('colorAparente2'),
                          "colorAparentePromedio" => $this->input->post('colorAparentePromedio'),
                          "colorAparenteSolucionCartaControl" => $this->input->post('colorAparenteSolucionCartaControl'),
                          "colorAparenteResponsable" => $this->input->post('colorAparenteResponsable'),
                          "colorVerdadero1" => $this->input->post('colorVerdadero1'),
                          "colorVerdadero2" => $this->input->post('colorVerdadero2'),
                          "colorVerdaderoPromedio" => $this->input->post('colorVerdaderoPromedio'),
                          "colorVerdaderoSolucionCartaControl" => $this->input->post('colorVerdaderoSolucionCartaControl'),
                          "colorVerdaderoResponsable" => $this->input->post('colorVerdaderoResponsable'),
                          "turbiedad1" => $this->input->post('turbiedad1'),
                          "turbiedad2" => $this->input->post('turbiedad2'),
                          "turbiedadPromedio" => $this->input->post('turbiedadPromedio'),
                          "turbiedadSolucionCartaControl" => $this->input->post('turbiedadSolucionCartaControl'),
                          "turbiedadResponsable" => $this->input->post('turbiedadResponsable'),
                          "sustanciasFlotantes1" => $this->input->post('sustanciasFlotantes1'),
                          "sustanciasFlotantes2" => $this->input->post('sustanciasFlotantes2'),
                          "sustanciasFlotantesPromedio" => $this->input->post('sustanciasFlotantesPromedio'),
                          "sustanciasFlotantesSolucionCartaControl" => $this->input->post('sustanciasFlotantesSolucionCartaControl'),
                          "sustanciasFlotantesResponsable" => $this->input->post('sustanciasFlotantesResponsable'),
                          "olor1" => $this->input->post('olor1'),
                          "olor2" => $this->input->post('olor2'),
                          "olorPromedio" => $this->input->post('olorPromedio'),
                          "olorSolucionCartaControl" => $this->input->post('olorSolucionCartaControl'),
                          "olorResponsable" => $this->input->post('olorResponsable'),
                          "oxigenoDisuelto1" => $this->input->post('oxigenoDisuelto1'),
                          "oxigenoDisuelto2" => $this->input->post('oxigenoDisuelto2'),
                          "oxigenoDisueltoPromedio" => $this->input->post('oxigenoDisueltoPromedio'),
                          "oxigenoDisueltoSolucionCartaControl" => $this->input->post('oxigenoDisueltoSolucionCartaControl'),
                          "oxigenoDisueltoResponsable" => $this->input->post('oxigenoDisueltoResponsable'),
                          "conductividad1" => $this->input->post('conductividad1'),
                          "conductividad2" => $this->input->post('conductividad2'),
                          "conductividadPromedio" => $this->input->post('conductividadPromedio'),
                          "conductividadSolucionCartaControl" => $this->input->post('conductividadSolucionCartaControl'),
                          "conductividadResponsable" => $this->input->post('conductividadResponsable'),
                          "temperaturaSegunda1" => $this->input->post('temperaturaSegunda1'),
                          "temperaturaSegunda2" => $this->input->post('temperaturaSegunda2'),
                          "temperaturaSegundaPromedio" => $this->input->post('temperaturaSegundaPromedio'),
                          "temperaturaSegundaSolucionCartaControl" => $this->input->post('temperaturaSegundaSolucionCartaControl'),
                          "temperaturaSegundaResponsable" => $this->input->post('temperaturaSegundaResponsable'),
                          "fluoruros1" => $this->input->post('fluoruros1'),
                          "fluoruros2" => $this->input->post('fluoruros2'),
                          "fluorurosPromedio" => $this->input->post('fluorurosPromedio'),
                          "fluorurosSolucionCartaControl" => $this->input->post('fluorurosSolucionCartaControl'),
                          "fluorurosResponsable" => $this->input->post('fluorurosResponsable')
                         );
      $this->analisisFisicos->registrarAnalisisFisicos($datosRegistro);
      $this->actividades->registrarActividad('Análisis Físico Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
      $mensaje['analisisRegistrado'] = "Análisis Físicos";
      $this->load->view('registrarResultados', $mensaje);
    }
      } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarAlcalinidadTotal() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "nH2SO4Blanco" => $this->input->post('nH2SO4Blanco'),
                          "nH2SO41" => $this->input->post('nH2SO41'),
                          "nH2SO42" => $this->input->post('nH2SO42'),
                          "nH2SO4SolucionCartaControl" => $this->input->post('nH2SO4SolucionCartaControl'),
                          "vH2SO4Blanco" => $this->input->post('vH2SO4Blanco'),
                          "vH2SO41" => $this->input->post('vH2SO41'),
                          "vH2SO42" => $this->input->post('vH2SO42'),
                          "vH2SO4SolucionCartaControl" => $this->input->post('vH2SO4SolucionCartaControl'),
                          "phBlanco" => $this->input->post('phBlanco'),
                          "ph1" => $this->input->post('ph1'),
                          "ph2" => $this->input->post('ph2'),
                          "phSolucionCartaControl" => $this->input->post('phSolucionCartaControl'),
                          "resultadoBlanco" => $this->input->post('resultadoBlanco'),
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "resultadoSolucionCartaControl" => $this->input->post('resultadoSolucionCartaControl'),
                          "promedioBlanco" => $this->input->post('promedioBlanco'),
                          "promedio1" => $this->input->post('promedio1'),
                          "promedio2" => $this->input->post('promedio2'),
                          "promedioSolucionCartaControl" => $this->input->post('promedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->alcalinidadTotal->registrarAlcalinidadTotal($datosRegistro);
    $this->actividades->registrarActividad('Alcalinidad Total Registrada', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Alcalinidad Total";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarCarbonatos() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "nH2SO4Blanco" => $this->input->post('nH2SO4Blanco'),
                          "nH2SO41" => $this->input->post('nH2SO41'),
                          "nH2SO42" => $this->input->post('nH2SO42'),
                          "nH2SO4SolucionCartaControl" => $this->input->post('nH2SO4SolucionCartaControl'),
                          "vH2SO4Blanco" => $this->input->post('vH2SO4Blanco'),
                          "vH2SO41" => $this->input->post('vH2SO41'),
                          "vH2SO42" => $this->input->post('vH2SO42'),
                          "vH2SO4SolucionCartaControl" => $this->input->post('vH2SO4SolucionCartaControl'),
                          "phBlanco" => $this->input->post('phBlanco'),
                          "ph1" => $this->input->post('ph1'),
                          "ph2" => $this->input->post('ph2'),
                          "phSolucionCartaControl" => $this->input->post('phSolucionCartaControl'),
                          "resultadoBlanco" => $this->input->post('resultadoBlanco'),
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "resultadoSolucionCartaControl" => $this->input->post('resultadoSolucionCartaControl'),
                          "vH2SO4SegundoBlanco" => $this->input->post('vH2SO4SegundoBlanco'),
                          "vH2SO4Segundo1" => $this->input->post('vH2SO4Segundo1'),
                          "vH2SO4Segundo2" => $this->input->post('vH2SO4Segundo2'),
                          "vH2SO4SegundoSolucionCartaControl" => $this->input->post('vH2SO4SegundoSolucionCartaControl'),
                          "phSegundoBlanco" => $this->input->post('phSegundoBlanco'),
                          "phSegundo1" => $this->input->post('phSegundo1'),
                          "phSegundo2" => $this->input->post('phSegundo2'),
                          "phSegundoSolucionCartaControl" => $this->input->post('phSegundoSolucionCartaControl'),
                          "resultadoCarbonatosBlanco" => $this->input->post('resultadoCarbonatosBlanco'),
                          "resultadoCarbonatos1" => $this->input->post('resultadoCarbonatos1'),
                          "resultadoCarbonatos2" => $this->input->post('resultadoCarbonatos2'),
                          "resultadoCarbonatosSolucionCartaControl" => $this->input->post('resultadoCarbonatosSolucionCartaControl'),
                          "promedioCarbonatosBlanco" => $this->input->post('promedioCarbonatosBlanco'),
                          "promedioCarbonatos1" => $this->input->post('promedioCarbonatos1'),
                          "promedioCarbonatosSolucionCartaControl" => $this->input->post('promedioCarbonatosSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->carbonatos->registrarCarbonatos($datosRegistro);
    $this->actividades->registrarActividad('Carbonatos Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Carbonatos";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarBicarbonatos() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "nH2SO4Blanco" => $this->input->post('nH2SO4Blanco'),
                          "nH2SO41" => $this->input->post('nH2SO41'),
                          "nH2SO42" => $this->input->post('nH2SO42'),
                          "nH2SO4SolucionCartaControl" => $this->input->post('nH2SO4SolucionCartaControl'),
                          "vH2SO4Blanco" => $this->input->post('vH2SO4Blanco'),
                          "vH2SO41" => $this->input->post('vH2SO41'),
                          "vH2SO42" => $this->input->post('vH2SO42'),
                          "vH2SO4SolucionCartaControl" => $this->input->post('vH2SO4SolucionCartaControl'),
                          "phBlanco" => $this->input->post('phBlanco'),
                          "ph1" => $this->input->post('ph1'),
                          "ph2" => $this->input->post('ph2'),
                          "phSolucionCartaControl" => $this->input->post('phSolucionCartaControl'),
                          "resultadoBlanco" => $this->input->post('resultadoBlanco'),
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "resultadoSolucionCartaControl" => $this->input->post('resultadoSolucionCartaControl'),
                          "vH2SO4SegundoBlanco" => $this->input->post('vH2SO4SegundoBlanco'),
                          "vH2SO4Segundo1" => $this->input->post('vH2SO4Segundo1'),
                          "vH2SO4Segundo2" => $this->input->post('vH2SO4Segundo2'),
                          "vH2SO4SegundoSolucionCartaControl" => $this->input->post('vH2SO4SegundoSolucionCartaControl'),
                          "phSegundoBlanco" => $this->input->post('phSegundoBlanco'),
                          "phSegundo1" => $this->input->post('phSegundo1'),
                          "phSegundo2" => $this->input->post('phSegundo2'),
                          "phSegundoSolucionCartaControl" => $this->input->post('phSegundoSolucionCartaControl'),
                          "resultadoCarbonatosBlanco" => $this->input->post('resultadoCarbonatosBlanco'),
                          "resultadoCarbonatos1" => $this->input->post('resultadoCarbonatos1'),
                          "resultadoCarbonatos2" => $this->input->post('resultadoCarbonatos2'),
                          "resultadoCarbonatosSolucionCartaControl" => $this->input->post('resultadoCarbonatosSolucionCartaControl'),
                          "promedioCarbonatosBlanco" => $this->input->post('promedioCarbonatosBlanco'),
                          "promedioCarbonatos1" => $this->input->post('promedioCarbonatos1'),
                          "promedioCarbonatosSolucionCartaControl" => $this->input->post('promedioCarbonatosSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->bicarbonatos->registrarBicarbonatos($datosRegistro);
    $this->actividades->registrarActividad('Bicarbonatos Registrado', 'Código Interno', $this->input->post('codigoInterno'), 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Bicarbonatos";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarHidroxidos() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "nH2SO4Blanco" => $this->input->post('nH2SO4Blanco'),
                          "nH2SO41" => $this->input->post('nH2SO41'),
                          "nH2SO42" => $this->input->post('nH2SO42'),
                          "nH2SO4SolucionCartaControl" => $this->input->post('nH2SO4SolucionCartaControl'),
                          "vH2SO4Blanco" => $this->input->post('vH2SO4Blanco'),
                          "vH2SO41" => $this->input->post('vH2SO41'),
                          "vH2SO42" => $this->input->post('vH2SO42'),
                          "vH2SO4SolucionCartaControl" => $this->input->post('vH2SO4SolucionCartaControl'),
                          "phBlanco" => $this->input->post('phBlanco'),
                          "ph1" => $this->input->post('ph1'),
                          "ph2" => $this->input->post('ph2'),
                          "phSolucionCartaControl" => $this->input->post('phSolucionCartaControl'),
                          "resultadoBlanco" => $this->input->post('resultadoBlanco'),
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "resultadoSolucionCartaControl" => $this->input->post('resultadoSolucionCartaControl'),
                          "vH2SO4SegundoBlanco" => $this->input->post('vH2SO4SegundoBlanco'),
                          "vH2SO4Segundo1" => $this->input->post('vH2SO4Segundo1'),
                          "vH2SO4Segundo2" => $this->input->post('vH2SO4Segundo2'),
                          "vH2SO4SegundoSolucionCartaControl" => $this->input->post('vH2SO4SegundoSolucionCartaControl'),
                          "phSegundoBlanco" => $this->input->post('phSegundoBlanco'),
                          "phSegundo1" => $this->input->post('phSegundo1'),
                          "phSegundo2" => $this->input->post('phSegundo2'),
                          "phSegundoSolucionCartaControl" => $this->input->post('phSegundoSolucionCartaControl'),
                          "resultadoCarbonatosBlanco" => $this->input->post('resultadoCarbonatosBlanco'),
                          "resultadoCarbonatos1" => $this->input->post('resultadoCarbonatos1'),
                          "resultadoCarbonatos2" => $this->input->post('resultadoCarbonatos2'),
                          "resultadoCarbonatosSolucionCartaControl" => $this->input->post('resultadoCarbonatosSolucionCartaControl'),
                          "promedioCarbonatosBlanco" => $this->input->post('promedioCarbonatosBlanco'),
                          "promedioCarbonatos1" => $this->input->post('promedioCarbonatos1'),
                          "promedioCarbonatosSolucionCartaControl" => $this->input->post('promedioCarbonatosSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->hidroxidos->registrarHidroxidos($datosRegistro);
    $this->actividades->registrarActividad('Hidróxidos Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Hidróxidos";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarNitritos() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),                          
                          "vFinal1" => $this->input->post('vFinal1'),
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),                          
                          "absorbancia1" => $this->input->post('absorbancia1'),
                          "absorbancia2" => $this->input->post('absorbancia2'),
                          "absorbanciaSolucionCartaControl" => $this->input->post('absorbanciaSolucionCartaControl'),                          
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),                         
                          "concentracionCorregida1" => $this->input->post('concentracionCorregida1'),
                          "concentracionCorregida2" => $this->input->post('concentracionCorregida2'),
                          "concentracionCorregidaSolucionCartaControl" => $this->input->post('concentracionCorregidaSolucionCartaControl'),                          
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),                          
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->nitritos->registrarNitritos($datosRegistro);
    $this->actividades->registrarActividad('Nitritos Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Nitritos";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarNitratos() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),                          
                          "abs2201" => $this->input->post('abs2201'),
                          "abs2202" => $this->input->post('abs2202'),
                          "abs220SolucionCartaControl" => $this->input->post('abs220SolucionCartaControl'),                          
                          "abs2751" => $this->input->post('abs2751'),
                          "abs2752" => $this->input->post('abs2752'),
                          "abs275SolucionCartaControl" => $this->input->post('abs275SolucionCartaControl'),                          
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),                   
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),                          
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->nitratos->registrarNitratos($datosRegistro);
    $this->actividades->registrarActividad('Nitratos Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Nitratos";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarCloruros() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "codigoMuestra1" => $this->input->post('codigoMuestra1'),
                          "codigoMuestra2" => $this->input->post('codigoMuestra2'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "vFinalBlanco" => $this->input->post('vFinalBlanco'),
                          "vFinal1" => $this->input->post('vFinal1'),
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),
                          "nAgno3Blanco" => $this->input->post('nAgno3Blanco'),
                          "nAgno31" => $this->input->post('nAgno31'),
                          "nAgno32" => $this->input->post('nAgno32'),
                          "nAgno3SolucionCartaControl" => $this->input->post('nAgno3SolucionCartaControl'),
                          "vAgno3Blanco" => $this->input->post('vAgno3Blanco'),
                          "vAgno31" => $this->input->post('vAgno31'),
                          "vAgno32" => $this->input->post('vAgno32'),
                          "vAgno3SolucionCartaControl" => $this->input->post('vAgno3SolucionCartaControl'),
                          "concentracionBlanco" => $this->input->post('concentracionBlanco'),
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),
                          "concentracionPromedioBlanco" => $this->input->post('concentracionPromedioBlanco'),
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->cloruros->registrarCloruros($datosRegistro);
    $this->actividades->registrarActividad('Cloruros Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Cloruros";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarSulfatos() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),                          
                          "vFinal1" => $this->input->post('vFinal1'),
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),                          
                          "turbiedad1" => $this->input->post('turbiedad1'),
                          "turbiedad2" => $this->input->post('turbiedad2'),
                          "turbiedadSolucionCartaControl" => $this->input->post('turbiedadSolucionCartaControl'),                          
                          "tBlanco" => $this->input->post('tBlanco'),
                          "tBlancoSolucionCartaControl" => $this->input->post('tBlancoSolucionCartaControl'),
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),                   
                          "promedio" => $this->input->post('promedio'),                          
                          "promedioSolucionCartaControl" => $this->input->post('promedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->sulfatos->registrarSulfatos($datosRegistro);
    $this->actividades->registrarActividad('Sulfatos Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Sulfatos";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarDurezaTotal() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),                          
                          "vFinalBlanco" => $this->input->post('vFinalBlanco'),
                          "vFinal1" => $this->input->post('vFinal1'),
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),                          
                          "concentracionEdtaBlanco" => $this->input->post('concentracionEdtaBlanco'),
                          "concentracionEdta1" => $this->input->post('concentracionEdta1'),
                          "concentracionEdta2" => $this->input->post('concentracionEdta2'),
                          "concentracionEdtaSolucionCartaControl" => $this->input->post('concentracionEdtaSolucionCartaControl'),                          
                          "vEdtaBlanco" => $this->input->post('vEdtaBlanco'),
                          "vEdta1" => $this->input->post('vEdta1'),
                          "vEdta2" => $this->input->post('vEdta2'),
                          "vEdtaSolucionCartaControl" => $this->input->post('vEdtaSolucionCartaControl'),
                          "resultadoBlanco" => $this->input->post('resultadoBlanco'),
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "resultadoSolucionCartaControl" => $this->input->post('resultadoSolucionCartaControl'),                   
                          "promedioBlanco" => $this->input->post('promedioBlanco'),
                          "promedio" => $this->input->post('promedio'),                          
                          "promedioSolucionCartaControl" => $this->input->post('promedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->durezaTotal->registrarDurezaTotal($datosRegistro);
    $this->actividades->registrarActividad('Dureza Total Registrada', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Dureza Total";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarDurezaCalcicaMagnesica() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "codigoMuestra1" => $this->input->post('codigoMuestra1'),
                          "codigoMuestra2" => $this->input->post('codigoMuestra2'),
                          "vMuestraBlanco" => $this->input->post('vMuestraBlanco'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),                          
                          "vFinalBlanco" => $this->input->post('vFinalBlanco'),
                          "vFinal1" => $this->input->post('vFinal1'),
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),                          
                          "concentracionEdtaBlanco" => $this->input->post('concentracionEdtaBlanco'),
                          "concentracionEdta1" => $this->input->post('concentracionEdta1'),
                          "concentracionEdta2" => $this->input->post('concentracionEdta2'),
                          "concentracionEdtaSolucionCartaControl" => $this->input->post('concentracionEdtaSolucionCartaControl'),                          
                          "vEdtaBlanco" => $this->input->post('vEdtaBlanco'),
                          "vEdta1" => $this->input->post('vEdta1'),
                          "vEdta2" => $this->input->post('vEdta2'),
                          "vEdtaSolucionCartaControl" => $this->input->post('vEdtaSolucionCartaControl'),
                          "durezaCalcicaBlanco" => $this->input->post('durezaCalcicaBlanco'),
                          "durezaCalcica" => $this->input->post('durezaCalcica'),
                          "durezaCalcicaSolucionCartaControl" => $this->input->post('durezaCalcicaSolucionCartaControl'),
                          "durezaMagnesicaBlanco" => $this->input->post('durezaMagnesicaBlanco'),                   
                          "durezaMagnesica" => $this->input->post('durezaMagnesica'),
                          "durezaMagnesicaSolucionCartaControl" => $this->input->post('durezaMagnesicaSolucionCartaControl'),                          
                          "responsable" => $this->input->post('responsable')
                         );
    $this->durezaCalcicaMagnesica->registrarDurezaCalcicaMagnesica($datosRegistro);
    $this->actividades->registrarActividad('Dureza Cálcica Magnésica Registrada', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Dureza Cálcica Magnésica";
    $this->load->view('registrarResultados', $mensaje);

   } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarCloroResidual() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('codigoMuestra1').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('codigoMuestra1').'/'.$this->input->post('analisis') , 'Editar ');
   $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra1'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra1" => $this->input->post('codigoMuestra1'),
                          "codigoMuestra2" => $this->input->post('codigoMuestra2'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),                          
                          "vFas1" => $this->input->post('vFas1'),
                          "vFas2" => $this->input->post('vFas2'),
                          "vFasSolucionCartaControl" => $this->input->post('vFasSolucionCartaControl'),                          
                          "nFas1" => $this->input->post('nFas1'),
                          "nFas2" => $this->input->post('nFas2'),
                          "nFasSolucionCartaControl" => $this->input->post('nFasSolucionCartaControl'),                          
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "resultadoSolucionCartaControl" => $this->input->post('resultadoSolucionCartaControl'),                   
                          "promedio" => $this->input->post('promedio'),                          
                          "promedioSolucionCartaControl" => $this->input->post('promedioSolucionCartaControl'),
                          "responsable1" => $this->input->post('responsable1'),
                          "responsable2" => $this->input->post('responsable2')
                         );
    $this->cloroResidual->registrarCloroResidual($datosRegistro);
    $this->actividades->registrarActividad('Cloro Residual Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Cloro Residual";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarMetales() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "metal" => $this->input->post('metal'),
                          "metalSolucionCartaControl" => $this->input->post('metalSolucionCartaControl'),
                          "tecnica" => $this->input->post('tecnica'),
                          "tecnicaSolucionCartaControl" => $this->input->post('tecnicaSolucionCartaControl'),                          
                          "cantidadMuestra" => $this->input->post('cantidadMuestra'),
                          "cantidadMuestraSolucionCartaControl" => $this->input->post('cantidadMuestraSolucionCartaControl'),
                          "vFinal" => $this->input->post('vFinal'),                          
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),
                          "factorDilucion" => $this->input->post('factorDilucion'),
                          "factorDilucionSolucionCartaControl" => $this->input->post('factorDilucionSolucionCartaControl'),                          
                          "absorbancia" => $this->input->post('absorbancia'),
                          "absorbanciaSolucionCartaControl" => $this->input->post('absorbanciaSolucionCartaControl'),            
                          "concentracionLeida" => $this->input->post('concentracionLeida'),                          
                          "concentracionLeidaSolucionCartaControl" => $this->input->post('concentracionLeidaSolucionCartaControl'),
                          "concentracionMgUg" => $this->input->post('concentracionMgUg'),
                          "concentracionMgUgSolucionCartaControl" => $this->input->post('concentracionMgUgSolucionCartaControl'),
                          "concentracionCorregida" => $this->input->post('concentracionCorregida'),
                          "concentracionCorregidaSolucionCartaControl" => $this->input->post('concentracionCorregidaSolucionCartaControl'),
                          "unidades" => $this->input->post('unidades'),
                          "unidadesSolucionCartaControl" => $this->input->post('unidadesSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->metales->registrarMetales($datosRegistro);
    $this->actividades->registrarActividad('Metales Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Metales";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarAluminio() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "vFinal1" => $this->input->post('vFinal1'),                          
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),
                          "absorbancia1" => $this->input->post('absorbancia1'),    
                          "absorbancia2" => $this->input->post('absorbancia2'),                       
                          "absorbanciaSolucionCartaControl" => $this->input->post('absorbanciaSolucionCartaControl'),
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),                          
                          "concentracionCorregida1" => $this->input->post('concentracionCorregida1'),
                          "concentracionCorregida2" => $this->input->post('concentracionCorregida2'),
                          "concentracionCorregidaSolucionCartaControl" => $this->input->post('concentracionCorregidaSolucionCartaControl'),            
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),                                              
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'),
                          "responsable" => $this->input->post('responsable')
                         );
    $this->aluminio->registrarAluminio($datosRegistro);
    $this->actividades->registrarActividad('Aluminio Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Aluminio (Método Eriocromo Cianina)";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarAcidezTotal() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "gMlMuestra1" => $this->input->post('gMlMuestra1'),
                          "gMlMuestra2" => $this->input->post('gMlMuestra2'),
                          "vFinal1" => $this->input->post('vFinal1'),                          
                          "vFinal2" => $this->input->post('vFinal2'),
                          "nNaOh1" => $this->input->post('nNaOh1'),    
                          "nNaOh2" => $this->input->post('nNaOh2'), 
                          "vNaOh1" => $this->input->post('vNaOh1'),
                          "vNaOh2" => $this->input->post('vNaOh2'),                      
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "promedio" => $this->input->post('promedio'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->acidezTotal->registrarAcidezTotal($datosRegistro);
    $this->actividades->registrarActividad('Acidéz Total Registrada', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Acidéz Total";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarAcidezLibre() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "gMlMuestra1" => $this->input->post('gMlMuestra1'),
                          "gMlMuestra2" => $this->input->post('gMlMuestra2'),
                          "vFinal1" => $this->input->post('vFinal1'),                          
                          "vFinal2" => $this->input->post('vFinal2'),
                          "nNaOh1" => $this->input->post('nNaOh1'),    
                          "nNaOh2" => $this->input->post('nNaOh2'), 
                          "vNaOh1" => $this->input->post('vNaOh1'),
                          "vNaOh2" => $this->input->post('vNaOh2'),                      
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "promedio" => $this->input->post('promedio'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->acidezLibre->registrarAcidezLibre($datosRegistro);
    $this->actividades->registrarActividad('Acidéz Libre Registrada', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Acidéz Libre";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarAcidezVolatil() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vNaOh1" => $this->input->post('vNaOh1'),                          
                          "vNaOh2" => $this->input->post('vNaOh2'),
                          "nNaOh1" => $this->input->post('nNaOh1'),    
                          "nNaOh2" => $this->input->post('nNaOh2'), 
                          "acidezVolatil1" => $this->input->post('acidezVolatil1'),
                          "acidezVolatil2" => $this->input->post('acidezVolatil2'),                      
                          "acidezFija1" => $this->input->post('acidezFija1'),
                          "acidezFija2" => $this->input->post('acidezFija2'),
                          "promedio" => $this->input->post('promedio'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->acidezVolatil->registrarAcidezVolatil($datosRegistro);
    $this->actividades->registrarActividad('Acidéz Volátil Registrada', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Acidéz Volatil";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }


  public function registrarDurabilidad() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "gMuestra1" => $this->input->post('gMuestra1'),
                          "gMuestra2" => $this->input->post('gMuestra2'),
                          "gMuestraBlanco" => $this->input->post('gMuestraBlanco'),
                          "volumenH2SO41" => $this->input->post('volumenH2SO41'),                          
                          "volumenH2SO42" => $this->input->post('volumenH2SO42'),
                          "volumenH2SO4Blanco" => $this->input->post('volumenH2SO4Blanco'),
                          "nH2SO41" => $this->input->post('nH2SO41'),    
                          "nH2SO42" => $this->input->post('nH2SO42'), 
                          "nH2SO4Blanco" => $this->input->post('nH2SO4Blanco'),
                          "volumenNaOH1" => $this->input->post('volumenNaOH1'),
                          "volumenNaOH2" => $this->input->post('volumenNaOH2'),                      
                          "volumenNaOHBlanco" => $this->input->post('volumenNaOHBlanco'), 
                          "resutadoH2SO41" => $this->input->post('resutadoH2SO41'),
                          "resutadoH2SO42" => $this->input->post('resutadoH2SO42'),
                          "resutadoH2SO4Blanco" => $this->input->post('resutadoH2SO4Blanco'),
                          "promedioH2SO4" => $this->input->post('promedioH2SO4'),  
                          "promedioH2SO4Blanco" => $this->input->post('promedioH2SO4Blanco'),                                             
                          "responsable" => $this->input->post('responsable')
                         );
    $this->durabilidad->registrarDurabilidad($datosRegistro);
    $this->actividades->registrarActividad('Durabilidad Registrada', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Durabilidad";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarExtractoSecoTotal() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "NoCapsula1" => $this->input->post('NoCapsula1'),
                          "NoCapsula2" => $this->input->post('NoCapsula2'),
                          "McapsulaVacia1" => $this->input->post('McapsulaVacia1'),                          
                          "McapsulaVacia2" => $this->input->post('McapsulaVacia2'),
                          "cantidadMuestra1" => $this->input->post('cantidadMuestra1'),    
                          "cantidadMuestra2" => $this->input->post('cantidadMuestra2'), 
                          "mDespuesSecado11" => $this->input->post('mDespuesSecado11'),
                          "mDespuesSecado12" => $this->input->post('mDespuesSecado12'),                      
                          "mdespuesSecado21" => $this->input->post('mdespuesSecado21'),
                          "mdespuesSecado22" => $this->input->post('mdespuesSecado22'),
                          "extractoSecoTotal1" => $this->input->post('extractoSecoTotal1'),
                          "extractoSecoTotal2" => $this->input->post('extractoSecoTotal2'),
                          "promedioEst" => $this->input->post('promedioEst'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->extractoSecoTotal->registrarExtractoSecoTotal($datosRegistro);
    $this->actividades->registrarActividad('Extracto Seco Total Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Extracto Seco Total";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarExtractoSecoRm() {
    if($this->session->userdata('estadoSesion')) {

    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "densidad1" => $this->input->post('densidad1'),
                          "densidad2" => $this->input->post('densidad2'),
                          "grasa1" => $this->input->post('grasa1'),                          
                          "grasa2" => $this->input->post('grasa2'),
                          "resultado1" => $this->input->post('resultado1'),    
                          "resultado2" => $this->input->post('resultado2'),
                          "promedio" => $this->input->post('promedio'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->extractoSecoRm->registrarExtractoSecoRm($datosRegistro);
    $this->actividades->registrarActividad('Extracto Seco R.M. Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Extracto Seco R.M.";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarExtractoSecoDesengrasado() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "est1" => $this->input->post('est1'),
                          "est2" => $this->input->post('est2'),
                          "grasa1" => $this->input->post('grasa1'),                          
                          "grasa2" => $this->input->post('grasa2'),
                          "cantidadMuestra1" => $this->input->post('cantidadMuestra1'),    
                          "cantidadMuestra2" => $this->input->post('cantidadMuestra2'), 
                          "densidad1" => $this->input->post('densidad1'),
                          "densidad2" => $this->input->post('densidad2'),                      
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "promedio" => $this->input->post('promedio'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->extractoSecoDesengrasado->registrarExtractoSecoDesengrasado($datosRegistro);
    $this->actividades->registrarActividad('Extracto Seco Desengrasado Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Extracto Seco Desangrado";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

   public function registrarSolidosTotales() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "noCapsula1" => $this->input->post('noCapsula1'),                          
                          "noCapsula2" => $this->input->post('noCapsula2'),
                          "capsulaVacia1" => $this->input->post('capsulaVacia1'),    
                          "capsulaVacia2" => $this->input->post('capsulaVacia2'), 
                          "capsulaMuestra1" => $this->input->post('capsulaMuestra1'),
                          "capsulaMuestra2" => $this->input->post('capsulaMuestra2'),                      
                          "concentracionSt1" => $this->input->post('concentracionSt1'),
                          "concentracionSt2" => $this->input->post('concentracionSt2'),
                          "concentracionPromedioSt" => $this->input->post('concentracionPromedioSt'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->solidosTotales->registrarSolidosTotales($datosRegistro);
    $this->actividades->registrarActividad('Sólidos Totales Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Sólidos Totales";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarSolidosDisueltosTotales() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestra1" => $this->input->post('vMuestra1'),
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "noCapsula1" => $this->input->post('noCapsula1'),                          
                          "noCapsula2" => $this->input->post('noCapsula2'),
                          "capsulaVacia1" => $this->input->post('capsulaVacia1'),    
                          "capsulaVacia2" => $this->input->post('capsulaVacia2'), 
                          "capsulaMuestra1" => $this->input->post('capsulaMuestra1'),
                          "capsulaMuestra2" => $this->input->post('capsulaMuestra2'),                      
                          "concentracionSdt1" => $this->input->post('concentracionSdt1'),
                          "concentracionSdt2" => $this->input->post('concentracionSdt2'),
                          "concentracionPromedioSdt" => $this->input->post('concentracionPromedioSdt'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->solidosDisueltosTotales->registrarSolidosDisueltosTotales($datosRegistro);
    $this->actividades->registrarActividad('Sólidos Disueltos Totales Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Sólidos Disueltos Totales";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarSolidosDisueltosVolatiles() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vAlicuotaMuestraFiltrada1" => $this->input->post('vAlicuotaMuestraFiltrada1'),
                          "vAlicuotaMuestraFiltrada2" => $this->input->post('vAlicuotaMuestraFiltrada2'),
                          "noCapsula1" => $this->input->post('noCapsula1'),                          
                          "noCapsula2" => $this->input->post('noCapsula2'),
                          "capsulaVacia1" => $this->input->post('capsulaVacia1'),    
                          "capsulaVacia2" => $this->input->post('capsulaVacia2'), 
                          "crisolMuestra1" => $this->input->post('crisolMuestra1'),
                          "crisolMuestra2" => $this->input->post('crisolMuestra2'),                      
                          "capsulaMuestra1" => $this->input->post('capsulaMuestra1'),
                          "capsulaMuestra2" => $this->input->post('capsulaMuestra2'),
                          "concentracionSdv1" => $this->input->post('concentracionSdv1'),
                          "concentracionSdv2" => $this->input->post('concentracionSdv2'),
                          "concentracionPromedioSdv" => $this->input->post('concentracionPromedioSdv'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->solidosDisueltosVolatiles->registrarSolidosDisueltosVolatiles($datosRegistro);
    $this->actividades->registrarActividad('Sólidos Disueltos Volátiles Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Sólidos Disueltos Volátiles";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarSolidosSuspendidosTotales() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "VmuestraFiltrada1" => $this->input->post('VmuestraFiltrada1'),
                          "VmuestraFiltrada2" => $this->input->post('VmuestraFiltrada2'),
                          "VmuestraFiltradaSolucionCartaControl" => $this->input->post('VmuestraFiltradaSolucionCartaControl'),
                          "noCrisol1" => $this->input->post('noCrisol1'),                          
                          "noCrisol2" => $this->input->post('noCrisol2'),
                          "noCrisolSolucionCartaControl" => $this->input->post('noCrisolSolucionCartaControl'),
                          "crisolVacio1" => $this->input->post('crisolVacio1'),    
                          "crisolVacio2" => $this->input->post('crisolVacio2'), 
                          "crisolVacioSolucionCartaControl" => $this->input->post('crisolVacioSolucionCartaControl'),
                          "crisolMuestra1" => $this->input->post('crisolMuestra1'),
                          "crisolMuestra2" => $this->input->post('crisolMuestra2'),                      
                          "crisolMuestraSolucionCartaControl" => $this->input->post('crisolMuestraSolucionCartaControl'), 
                          "concentracionSst1" => $this->input->post('concentracionSst1'),
                          "concentracionSst2" => $this->input->post('concentracionSst2'),
                          "concentracionSstSolucionCartaControl" => $this->input->post('concentracionSstSolucionCartaControl'),
                          "concentracionPromedioSst" => $this->input->post('concentracionPromedioSst'),  
                          "concentracionPromedioSstSolucionCartaControl" => $this->input->post('concentracionPromedioSstSolucionCartaControl'),                                             
                          "responsable" => $this->input->post('responsable')
                         );
    $this->solidosSuspendidosTotales->registrarSolidosSuspendidosTotales($datosRegistro);
    $this->actividades->registrarActividad('Sólidos Suspendidos Totales Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Sólidos Suspendidos Totales";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarSolidosSuspendidosVolatiles() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraFiltrada1" => $this->input->post('vMuestraFiltrada1'),
                          "vMuestraFiltrada2" => $this->input->post('vMuestraFiltrada2'),
                          "noCrisol1" => $this->input->post('noCrisol1'),                          
                          "noCrisol2" => $this->input->post('noCrisol2'),
                          "crisolVacio1" => $this->input->post('crisolVacio1'),    
                          "crisolVacio2" => $this->input->post('crisolVacio2'), 
                          "crisolMuestra1051" => $this->input->post('crisolMuestra1051'),
                          "crisolMuestra1052" => $this->input->post('crisolMuestra1052'),                      
                          "crisolMuestra5501" => $this->input->post('crisolMuestra5501'),
                          "crisolMuestra5502" => $this->input->post('crisolMuestra5502'),
                          "concentracionSsv1" => $this->input->post('concentracionSsv1'),
                          "concentracionSsv2" => $this->input->post('concentracionSsv2'),
                          "concentracionPromedioSsv" => $this->input->post('concentracionPromedioSsv'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->solidosSuspendidosVolatiles->registrarSolidosSuspendidosVolatiles($datosRegistro);
    $this->actividades->registrarActividad('Sólidos Suspendidos Volátiles Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Sólidos Suspendidos Volátiles";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarSolidosSedimentables() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),                    
                          "vMuestra" => $this->input->post('vMuestra'),
                          "ss10" => $this->input->post('ss10'),
                          "ss60" => $this->input->post('ss60'),                            
                          "responsable" => $this->input->post('responsable')
                         );
    $this->solidosSedimentables->registrarSolidosSedimentables($datosRegistro);
    $this->actividades->registrarActividad('Sólidos Sedimentables Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Sólidos Sedimentables";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarSolidosInsolubles() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "cantidadMuestra1" => $this->input->post('cantidadMuestra1'),
                          "cantidadMuestra2" => $this->input->post('cantidadMuestra2'),
                          "noCrisol1" => $this->input->post('noCrisol1'),                          
                          "noCrisol2" => $this->input->post('noCrisol2'),
                          "crisolVacio1" => $this->input->post('crisolVacio1'),    
                          "crisolVacio2" => $this->input->post('crisolVacio2'), 
                          "crisolMuestra1051" => $this->input->post('crisolMuestra1051'),
                          "crisolMuestra1052" => $this->input->post('crisolMuestra1052'),                      
                          "conentracionSi1" => $this->input->post('conentracionSi1'),
                          "conentracionSi2" => $this->input->post('conentracionSi2'),
                          "concentracionPromedioSi" => $this->input->post('concentracionPromedioSi'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->solidosInsolubles->registrarSolidosInsolubles($datosRegistro);
    $this->actividades->registrarActividad('Sólidos Insolubles Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Sólidos Insolubles";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

   public function registrarBasicidad() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "gMlMuestra1" => $this->input->post('gMlMuestra1'),
                          "gMlMuestra2" => $this->input->post('gMlMuestra2'),
                          "vFinal1" => $this->input->post('vFinal1'),                          
                          "vFinal2" => $this->input->post('vFinal2'),
                          "nNaOH1" => $this->input->post('nNaOH1'),    
                          "nNaOH2" => $this->input->post('nNaOH2'), 
                          "vNaOH1" => $this->input->post('vNaOH1'),
                          "vNaOH2" => $this->input->post('vNaOH2'),                      
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),
                          "promedio" => $this->input->post('promedio'),                                              
                          "responsable" => $this->input->post('responsable')
                         );
    $this->basicidad->registrarBasicidad($datosRegistro);
    $this->actividades->registrarActividad('Basicidad Registrada', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Basicidad";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

   public function registrarDqo() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaAnalisis" => $this->input->post('fechaAnalisis'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vAlicuota1" => $this->input->post('vAlicuota1'),
                          "vAlicuota2" => $this->input->post('vAlicuota2'),
                          "vFas11" => $this->input->post('vFas11'),                          
                          "vFas12" => $this->input->post('vFas12'),
                          "normalidadFas1" => $this->input->post('normalidadFas1'),    
                          "normalidadFas2" => $this->input->post('normalidadFas2'), 
                          "normalidadPromedioFas" => $this->input->post('normalidadPromedioFas'), 
                          "vConsumidoBlanco1" => $this->input->post('vConsumidoBlanco1'),                          
                          "vConsumidoBlanco2" => $this->input->post('vConsumidoBlanco2'),
                          "vMuestra" => $this->input->post('vMuestra'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "factorDilucion1" => $this->input->post('factorDilucion1'),
                          "factorDilucion2" => $this->input->post('factorDilucion2'),
                          "factorDilucion3" => $this->input->post('factorDilucion3'),                      
                          "factorDilucionSolucionCartaControl" => $this->input->post('factorDilucionSolucionCartaControl'),
                          "vFas21" => $this->input->post('vFas21'),
                          "vFas22" => $this->input->post('vFas22'),
                          "vFas23" => $this->input->post('vFas23'),
                          "vFas2SolucionCartaControl" => $this->input->post('vFas22'),
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracion3" => $this->input->post('concentracion3'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'),                                          
                          "responsable" => $this->input->post('responsable')
                         );
    $this->dqo->registrarDqo($datosRegistro);
    $this->actividades->registrarActividad('DQO Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "DQO";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarDbo5() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "winklerNo1" => $this->input->post('winklerNo1'),
                          "winklerNo2" => $this->input->post('winklerNo2'),
                          "winklerNo3" => $this->input->post('winklerNo3'),
                          "winklerNoSolucionCartaControl" => $this->input->post('winklerNoSolucionCartaControl'),
                          "factorDilucion1" => $this->input->post('factorDilucion1'),                          
                          "factorDilucion2" => $this->input->post('factorDilucion2'),
                          "factorDilucion3" => $this->input->post('factorDilucion3'),
                          "factorDilucionSolucionCartaControl" => $this->input->post('factorDilucionSolucionCartaControl'),
                          "vMuestra1" => $this->input->post('vMuestra1'),                          
                          "vMuestra2" => $this->input->post('vMuestra2'),
                          "vMuestra3" => $this->input->post('vMuestra3'),
                          "vMuestraSolucionCartaControl" => $this->input->post('vMuestraSolucionCartaControl'),
                          "odInicial1" => $this->input->post('odInicial1'),    
                          "odInicial2" => $this->input->post('odInicial2'), 
                          "odInicial3" => $this->input->post('odInicial3'),
                          "odInicialSolucionCartaControl" => $this->input->post('odInicialSolucionCartaControl'),
                          "odFinal1" => $this->input->post('odFinal1'),    
                          "odFinal2" => $this->input->post('odFinal2'), 
                          "odFinal3" => $this->input->post('odFinal3'),
                          "odFinalSolucionCartaControl" => $this->input->post('odFinalSolucionCartaControl'),
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracion3" => $this->input->post('concentracion3'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'),                                          
                          "responsable" => $this->input->post('responsable')
                         );
    $this->dbo5->registrarDbo5($datosRegistro);
    $this->actividades->registrarActividad('DBO5 Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "DBO5";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarExtraccionSoxhlet() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "cantidadMuestra" => $this->input->post('cantidadMuestra'),
                          "noCrisol" => $this->input->post('noCrisol'),
                          "pesoCrisolVacio" => $this->input->post('pesoCrisolVacio'),
                          "pesoCrisolMuestra" => $this->input->post('pesoCrisolMuestra'),
                          "resultado" => $this->input->post('resultado'),                           
                          "responsable" => $this->input->post('responsable')
                         );
    $this->extraccionSoxhlet->registrarExtraccionSoxhlet($datosRegistro);
    $this->actividades->registrarActividad('Extracción Soxhlet Registrada', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Extracción Soxhlet";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarVolumetricoGerberBabcock() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "cantidadMuestra" => $this->input->post('cantidadMuestra'),
                          "butirometro" => $this->input->post('butirometro'),
                          "resultado" => $this->input->post('resultado'),                           
                          "responsable" => $this->input->post('responsable')
                         );
    $this->volumetricoGerberBabcock->registrarVolumetricoGerberBabcock($datosRegistro);
    $this->actividades->registrarActividad('Volumétrico Gerber Babcock Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Volumétrico Gerber Babcock";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarRoseGottlie() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "cantidadMuestra1" => $this->input->post('cantidadMuestra1'),
                          "cantidadMuestra2" => $this->input->post('cantidadMuestra2'),
                          "noBeaker1" => $this->input->post('noBeaker1'),                          
                          "noBeaker2" => $this->input->post('noBeaker2'),
                          "pesoBeakerVacio1" => $this->input->post('pesoBeakerVacio1'),    
                          "pesoBeakerVacio2" => $this->input->post('pesoBeakerVacio2'), 
                          "pesoBeakerMuestra1" => $this->input->post('pesoBeakerMuestra1'),
                          "pesoBeakerMuestra2" => $this->input->post('pesoBeakerMuestra2'),                      
                          "resultado1" => $this->input->post('resultado1'),
                          "resultado2" => $this->input->post('resultado2'),                                         
                          "responsable" => $this->input->post('responsable')
                         );
    $this->roseGottlie->registrarRoseGottlie($datosRegistro);
    $this->actividades->registrarActividad('Rose Gottlie Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Rose Gottlie";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarHidrocarburos() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "vMuestraFiltrada" => $this->input->post('vMuestraFiltrada'),
                          "noCapsula" => $this->input->post('noCapsula'),
                          "capsulaVacia" => $this->input->post('capsulaVacia'),
                          "capsulaMuestra" => $this->input->post('capsulaMuestra'),
                          "resultado" => $this->input->post('resultado'),                           
                          "responsable" => $this->input->post('responsable')
                         );
    $this->hidrocarburos->registrarHidrocarburos($datosRegistro);
    $this->actividades->registrarActividad('Hidrocarburos Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Hidrocarburos";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  }

  public function registrarFosfatos() {
    if($this->session->userdata('estadoSesion')) {
    $links = '<a href="//localhost/laboratorio/index.php/welcome/verResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" target="_blank" onClick="window.open(this.href, this.target, '."'".'width=800, height=600'."'".'); return false;">Ver </a>';
    $links .= anchor('welcome/EditarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis') , 'Editar ');
    $links .= '<a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/'.$this->input->post('codigoInterno').'/'.$this->input->post('analisis').'" class="confirmacion" >Eliminar </a>';

    $datosResultado = array(
                          "analisis" => $this->input->post('analisis'),
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "operacion" => $links
                          );

    $this->resultados->registrarResultado($datosResultado);

    $datosRegistro = array(
                          "codigoInterno" => $this->input->post('codigoInterno'),
                          "fechaRecepcion" => $this->input->post('fechaRecepcion'),
                          "fechaEnsayo" => $this->input->post('fechaEnsayo'),
                          "codigoMuestra" => $this->input->post('codigoMuestra'),
                          "digestion1" => $this->input->post('digestion1'),
                          "digestion2" => $this->input->post('digestion2'),
                          "digestionSolucionCartaControl" => $this->input->post('digestionSolucionCartaControl'),
                          "vFinalDigestion1" => $this->input->post('vFinalDigestion1'),
                          "vFinalDigestion2" => $this->input->post('vFinalDigestion2'),
                          "vFinalDigestionSolucionCartaControl" => $this->input->post('vFinalDigestionSolucionCartaControl'),
                          "vAlicuota1" => $this->input->post('vAlicuota1'),
                          "vAlicuota2" => $this->input->post('vAlicuota2'),
                          "vAlicuotaSolucionCartaControl" => $this->input->post('vAlicuotaSolucionCartaControl'),
                          "vFinal1" => $this->input->post('vFinal1'),
                          "vFinal2" => $this->input->post('vFinal2'),
                          "vFinalSolucionCartaControl" => $this->input->post('vFinalSolucionCartaControl'),
                          "absorbancia1" => $this->input->post('absorbancia1'),
                          "absorbancia2" => $this->input->post('absorbancia2'),
                          "absorbanciaSolucionCartaControl" => $this->input->post('absorbanciaSolucionCartaControl'),
                          "concentracion1" => $this->input->post('concentracion1'),
                          "concentracion2" => $this->input->post('concentracion2'),
                          "concentracionSolucionCartaControl" => $this->input->post('concentracionSolucionCartaControl'),
                          "concentracionPo1" => $this->input->post('concentracionPo1'),
                          "concentracionPo2" => $this->input->post('concentracionPo2'),
                          "concentracionPoSolucionCartaControl" => $this->input->post('concentracionPoSolucionCartaControl'),
                          "concentracionPromedio" => $this->input->post('concentracionPromedio'),
                          "concentracionPromedioSolucionCartaControl" => $this->input->post('concentracionPromedioSolucionCartaControl'), 
                          "responsable" => $this->input->post('responsable')
                         );
    $this->fosfatos->registrarFosfatos($datosRegistro);
    $this->actividades->registrarActividad('Fosfatos Registrado', 'Código Interno', $this->input->post('codigoInterno'), $this->session->userdata('usuario'), date('d-m-Y H:i:s'));
    $mensaje['analisisRegistrado'] = "Fosfatos";
    $this->load->view('registrarResultados', $mensaje);
    } else {
    $data['sesionCerrada']="La operación no se pudo llevar a cabo porque la sesión ha expirado";
    $this->load->view('logueo', $data);
   }
  } 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

