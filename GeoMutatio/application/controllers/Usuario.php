<?php

include('Redirect.php');
defined('BASEPATH') OR exit('No direct script access allowed');

Class Usuario extends Redirect{


//Funções do CRUD


	public function createUsuario(){


		$confirmarSenha = $this->Usuario_model->senhasIguais();
		$confirmarEmail = $this->Usuario_model->emailsIguais();
		$confirmarCpf = $this->Usuario_model->cpfsIguais();


	if ($confirmarSenha == 'válido') {
		
		if ($confirmarEmail == 'válido') {
	
				if($confirmarCpf == 'válido') {

					@$foto = getimagesize($_FILES['foto_perfil']);

					if (is_null($foto) or ($foto["mime"] == "image/jpeg") or ($foto["mime"] == "image/png") or ($foto["mime"] == "image/jpg"))  {
						
					

					$this->Usuario_model->criarUsuario($_FILES);
					redirect("Redirect/home");
					
					}else{

						$this->session->set_flashdata("fotoInvalida", "Envie um arquivo no formato PNG ou JPG!");
						redirect("Redirect/cadastro");

					}


				}else{ 
					
					$this->session->set_flashdata("cpfIgual", "CPF já cadastrado!");
					redirect("Redirect/cadastro");

				}

			}else{

				$this->session->set_flashdata("emailIgual", "E-mail já cadastrado!");
				redirect("Redirect/cadastro");

			}
		}else{
				$this->session->set_flashdata("senhaDiferente", "As senhas estão diferentes!");
				redirect("Redirect/cadastro");
		}
	}

	public function editUsuario($cpf){

		$usuario['row'] = $this->Usuario_model->getUsuario($cpf);
		$this->load->view('editar_user', $usuario);
		
	}

	public function updateUsuario($cpf){

		$this->Usuario_model->atualizarUsuario($cpf, $_FILES);


		//carrega a session pra ver se é admin
		$this->load->library('session');
		$usuarioLogado = $this->session->userdata('usuario');

		if ($usuarioLogado['tipuser'] != 1 and $usuario['tipuser'] != 1) { 

			redirect("Redirect/profile");

		}else{
			redirect("Redirect/tabela_usuarios");
		}
	}

	public function deleteUsuario($cpf){

		$this->Usuario_model->deletarUsuario($cpf);
		redirect("Redirect/tabela_usuarios");
	}	

	public function deleteUsuarioLogout($cpf){

		$this->Usuario_model->deletarUsuarioLogout($cpf);

		$this->load->library('session');

		$this->session->unset_userdata('usuario');

		$this->session->set_flashdata("danger", "Conta excluída com sucesso!");

		redirect('/');
	}

//Funções do Login

	public function login(){

		//carrega a session
		$this->load->library('session');

		$email = $_POST['email'];
		$senha = $_POST['senha'];

		$usuario = $this->Usuario_model->UsuarioLogin($email, $senha);

		if($usuario){
			$this->session->set_userdata('usuario', $usuario);
			$this->session->set_flashdata("success", "Seja bem vindo!");
			
		}else{
			 $this->session->set_flashdata("danger", "Usuário ou senha inválidos!");

		}
		redirect('Redirect');
	}

	public function logout(){

		$this->load->library('session');

		$this->session->unset_userdata('usuario');

		$this->session->set_flashdata("logout", "Deslogado com successo!");
		redirect('/');
	}
	
}
