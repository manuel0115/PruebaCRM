<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
			
	}



	public function index()
	{	
		$this->load->view('login/login');

	}

	public function iniciarSession()
	{	
		$codigo =13;
		$mensaje = '';

		$this->load->library('form_validation');

		$config = array(
			array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|valid_email'
			),
			array(
					'field' => 'pass',
					'label' => 'Password',
					'rules' => 'required',
					
			),
			
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run())
        {	
			$usuario = new stdClass();

			foreach($this->input->post() as $key => $value){
				$usuario->$key= $value;
			}

            $credencialesValidas=$this->comprobarUsuario($usuario);

			if($credencialesValidas){
				$codigo =0;
				$mensaje = 'Inicio de session  realizado correctamente';
			}else{
				$codigo =13;
				$mensaje ="Usuario o password incorrectos";
			}
			
			

        }
        else
        {

				$mensaje =$this->form_validation->error_array();
        }

		echo json_encode(['mensaje'=>$mensaje,'codigo'=>$codigo]);
		

	}

	public function comprobarUsuario($usuario)
	{	
		$usuario->pass=base64_decode(base64_decode(base64_decode($usuario->pass)));

		$this->load->model("Usuarios_model");

		$datos=$this->Usuarios_model->getUsuario($usuario);

		$credencialesValidas= false;

	
		if(count($datos)>0){
			$credencialesValidas = password_verify($usuario->pass,$datos[0]->PASS);
		}


		return $credencialesValidas;

		
	}
	
}
