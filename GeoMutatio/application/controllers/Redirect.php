<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redirect extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('url');
		$this->load->model('Usuario_model');
		$this->load->model('Familia_model');
		$this->load->model('Noticia_model');
		$this->load->model('Ocorrencia_model');
	}

	public function index(){

		//comando que limpa a session caso haja algum problema :
		//$this->session->unset_userdata('usuario');


		//carrega a session
		$this->load->library('session');

		//restrict users to go back to login if session has been set
		if($this->session->userdata('usuario')){
			$this->load->view('home');
		}else{
			$this->load->view('home');
			
		}
	}

	public function home(){

		//load session library
		$this->load->library('session');
	
		//restrict users to go to home if not logged in
		if($this->session->userdata('usuario')){
			$this->load->view('home');
		}else{
			redirect('/');
		}
	}

	//TELAS DE CADASTRO
	
	public function cadastro(){

		$usuario['result'] = $this->Usuario_model->getUsuarios(); 
		$this->load->view('cadastro_user', $usuario);
	}

	public function cad_familia(){
		$familia['result'] = $this->Familia_model->getFamilias(); 
		$this->load->view('cadastro_familia', $familia);
	}

	public function cad_noticia(){	
		$noticia['result'] = $this->Noticia_model->getNoticias(); 
		$this->load->view('cadastro_noticia', $noticia);
	}	

	//PARTES INDIVIDUAIS DOS USUÁRIOS

	public function profile(){
		$this->load->view('profile');
	}

	public function minhasnoticias(){
		$this->load->view('minhasnoticias');
	}

	public function minhasocorrencias(){
		$this->load->view('minhasocorrencias');
	}

	public function minhasfamilias(){
		$this->load->view('minhasfamilias');
	}

	

	//TABELAS DE ADMINISTRAÇÃO

	public function tabela_usuarios(){
		$this->load->view('tabela_usuarios');
	}	
	
	public function tabela_familias(){
		$this->load->view('tabela_familias');
	}

	public function tabela_noticias(){
		$this->load->view('tabela_noticias');
	}

	public function tabela_ocorrencias(){
		$this->load->view('tabela_ocorrencias');
	}

	//Páginas do menu e adjascentes


	public function noticias(){
		$this->load->view('noticias');
	}

	public function familias(){
		$this->load->view('familias');
	}

	public function ocorrencias(){
		$this->load->view('ocorrencias');
	}

	public function noticia($codnoticia){
		$data['row'] = $this->Noticia_model->getNoticia($codnoticia);
		$this->load->view('noticia',$data);
		
	}

	public function familia($id_familia){
		$data['row'] = $this->Familia_model->getFamilia($id_familia);
		$this->load->view('familia',$data);
		
	}

	public function sobre(){
		$this->load->view('sobre');
	}	
}
