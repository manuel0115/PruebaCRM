<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Clientes_model");
			
	}

	

	public function datosTablaClientes()
	{	
		//echo "dd";
		
		$datos=$this->Clientes_model->getClientes();
		$datos= ["data"=>$datos];
		
		echo json_encode($datos);

	}

	function modalAgrgarModificarCliente($idCliente=0){

		if($idCliente > 0){
			
			$data['cliente']=$this->Clientes_model->getCliente($idCliente);
			
		}

		$this->load->model("Estado_model");
		$this->load->model("TipoCliente_model");
		
		$data["tipoCliente"]=$this->TipoCliente_model->getTipoClienteModel();
		$data["estado"]=$this->Estado_model->getEstados();
		
		$this->load->view('cliente/modal/agregarModificarCliente',$data);
	}

	function guardarCliente(){
		$codigo =13;
		$mensaje = '';

		$this->load->library('form_validation');


		/*
		nombre: 
apellido: 
tipo: 1
correo: 
estado: 1 */
		$config = array(
			array(
					'field' => 'nombre',
					'label' => 'Nombre',
					'rules' => 'required'
			),
			array(
					'field' => 'apellido',
					'label' => 'Apellido',
					'rules' => 'required',
					
			),
			array(
				'field' => 'tipo',
				'label' => 'Tipo',
				'rules' => 'required',
				
			),
			array(
				'field' => 'correo',
				'label' => 'Correo',
				'rules' => 'required|valid_email',
				
			),
			array(
				'field' => 'empresa',
				'label' => 'Empresa',
				'rules' => 'required',
				
			),
			array(
				'field' => 'estado',
				'label' => 'Estado',
				'rules' => 'required',
				
			),
			
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run())
        {	
			//die("asqui");
			$cliente = new stdClass();

			foreach($this->input->post() as $key => $value){
				$cliente->$key= $value;
			}

           

			if($cliente->idCliente > 0){
				$resultado=$this->Clientes_model->actualizarCliente();
			}else{
				$resultado=$this->Clientes_model->agregarCliente($cliente);

			}
			
			if($resultado){
				
				$mensaje ="datos del cliente guradados correctamente";
				$codigo =0;
			}else{
				$mensaje ="Hubo un error al guardadr los datos del cliente";
			}

        }
        else
        {

				$mensaje =$this->form_validation->error_array();
        }

		echo json_encode(['mensaje'=>$mensaje,'codigo'=>$codigo]);
	}
}
