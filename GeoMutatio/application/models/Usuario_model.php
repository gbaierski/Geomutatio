<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}


//Funções do CRUD

	function criarUsuario($file){

		$cpf = ($this->Usuario_model->valida_cpf($this->input->post('cpf')));
		$email = $this->input->post('email');
		$senha = $this->input->post('senha');


		$foto_perfil = $cpf;


			$usuario = array(
				'nome' => $this->input->post('nome'),
				'email' => $email,
				'cpf' => $cpf,
				'tipuser' => $this->input->post('tipuser'),
				'senha' => $senha,
				'datanasc' => $this->input->post('datanasc'),
				'foto_perfil' => $foto_perfil,
			);

			$target_dir = BASEPATH."../assets/imagens/usuarios/";
			$target_file = $target_dir . basename($file["foto_perfil"]["name"]);



	   		if (move_uploaded_file($file["foto_perfil"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $file["foto_perfil"]["name"]). " has been uploaded.";

	        $nome_antigo = $target_dir.basename($file["foto_perfil"]["name"]);
	        $nome_novo = $target_dir.$cpf;

	        rename($nome_antigo, $nome_novo);



	    	} else {
	        	echo "Sorry, there was an error uploading your file.";
	    	}


				$this->db->insert('usuario', $usuario);

				
				//Realiza login automático

				$this->load->library('session');


				$usuario = $this->Usuario_model->UsuarioLogin($email, $senha);

				if($usuario){
					$this->session->set_userdata('usuario', $usuario);
			 		$this->session->set_flashdata("success", "Seja bem vindo!");
				
				}else{

			 		$this->session->set_flashdata("danger", "Usuário ou senha inválidos!");

		}
		
	
	}	

	function getUsuarios()
	{
		$query = $this->db->query('SELECT * FROM usuario');
		return $query->result();
	}


	function getUsuario($cpf)
	{
		$query = $this->db->query('SELECT * FROM usuario WHERE `cpf` ='.$cpf);
		return $query->row();
	}

	function cpfsIguais(){

		$cpf = ($this->Usuario_model->valida_cpf($this->input->post('cpf')));
		$usuarios = $this->Usuario_model->getUsuarios();

		$value = 'válido';

			foreach ($usuarios as $usuario) {

				$array_usuarios[] = $usuario->cpf; 

				}

			foreach ($array_usuarios as $cpf_arr) {

				if ($cpf_arr == $cpf) {
					$value = 'inválido';
				}
			}
		return $value;
		}
	

	function emailsIguais(){

		$email = $this->input->post('email');
		$usuarios = $this->Usuario_model->getUsuarios();

		$value = 'válido';

		foreach ($usuarios as $usuario) {

				$array_emails[] = $usuario->email; 

				}

			foreach ($array_emails as $email_arr) {

				if ($email_arr == $email) {
					$value = 'inválido';
				}
			}
		return $value;
		

	}

	function senhasIguais(){

		$senha = $this->input->post('senha');
		$confirmarSenha = $this->input->post('confirma_senha');

		if ($senha == $confirmarSenha) {
			$validaSenha = 'válido';
		}else{
			$validaSenha = 'inválido';
		}

		return $validaSenha;

	}

	function atualizarUsuario($cpf, $file){

		$cpf = ($this->Usuario_model->valida_cpf($this->input->post('cpf')));
		$caminhoFoto = BASEPATH."../assets/imagens/usuarios/".$cpf;



		$usuario = array(
			'nome' => $this->input->post('nome'),
			'email' => $this->input->post('email'),
			'cpf' => $cpf,
			'senha' => $this->input->post('senha'),
			'datanasc' => $this->input->post('datanasc'),
		
		);
		$this->db->where('cpf', $cpf);
		$this->db->update('usuario', $usuario);


		//Verifica se o usuário é ADM para dar refresh na session e não logar em outra conta
		$this->load->library('session');

		$usuarioLogado = $this->session->userdata('usuario');

		if ($usuarioLogado['tipuser'] != 1 and $usuario['tipuser'] != 1) { 

		$this->session->unset_userdata('usuario');


		$email =  $this->input->post('email');
		$senha = $this->input->post('senha');

		$usuario = $this->Usuario_model->UsuarioLogin($email, $senha);

		
		$this->session->set_userdata('usuario', $usuario);

			}
			 
		
		
	}	
	

	function deletarUsuario($cpf){

		$this->db->where('cpf', $cpf);
		$this->db->delete('usuario');

		$caminhoFoto = BASEPATH."../assets/imagens/usuarios/".$cpf;
		unlink($caminhoFoto);
	}

	function deletarUsuarioLogout($cpf){
		$this->db->where('cpf', $cpf);
		$this->db->delete('usuario');

		$caminhoFoto = BASEPATH."../assets/imagens/usuarios/".$cpf;
		unlink($caminhoFoto);
		
	}

	 function valida_cpf($cpf){

		if ($cpf[3] == '.') {
			
		$cpf_ponto = explode('.', $cpf);
		$cpf_traco = implode('', $cpf_ponto);
		$cpf_semTraco = explode('-', $cpf_traco);
		$cpf_final = implode('', $cpf_semTraco);
			
		}else{

			$array_cpf[0] = [$cpf[0], $cpf[1], $cpf[2], "."];
			$array_final[0] = implode('', $array_cpf[0]);

			$array_cpf[1] = [$cpf[3], $cpf[4], $cpf[5], "."];
			$array_final[1] = implode('', $array_cpf[1]);

			$array_cpf[2] = [$cpf[6], $cpf[7], $cpf[8], "-"];
			$array_final[2] = implode('', $array_cpf[2]);

			$array_cpf[3] = [$cpf[9], $cpf[10]];
			$array_final[3] = implode('', $array_cpf[3]);

			$cpf_final = implode('', $array_final);

		
		}

		return $cpf_final;
	}

	function valida_tipUser_num($tipuser){

		if ($tipuser == 0) {

			$tipUserFinal = 'Usuário Comum';
			return $tipUserFinal;

		}elseif ($tipuser == 1) {

			$tipUserFinal = 'Administrador';
			return $tipUserFinal;

		}elseif ($tipuser == 2) {

			$tipUserFinal = 'Autor';
			return $tipUserFinal;

		}

	}

	function valida_tipUser_nome($tipuser){

		if ($tipuser == 'Usuário Comum') {

				$tipUserFinal = 0;
				return $tipUserFinal;

			}elseif ($tipuser == 'Administrador') {

				$tipUserFinal = 1;
				return $tipUserFinal;

			}elseif ($tipuser == 'Autor') {

				$tipUserFinal = 2;
				return $tipUserFinal;

			}
	}



		
	
	

//Funções do Login

	function UsuarioLogin($email,$senha){
		$usuario = $this->db->get_where('usuario', array('email'=>$email,'senha'=>$senha));
		return $usuario->row_array();
	}

	
}