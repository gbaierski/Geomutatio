<?php

include('Redirect.php');
defined('BASEPATH') OR exit('No direct script access allowed');

Class Ocorrencia extends Redirect{


	public function createOcorrencia(){

		$this->Ocorrencia_model->criarOcorrencia();
		redirect("Redirect/ocorrencias");
	}

	public function createOcorrenciaM(){

		$this->Ocorrencia_model->criarOcorrencia();
		redirect("Redirect/minhasocorrencias");
	}

	public function editOcorrencia($id_ocorrencia){

		$ocorrencia['row'] = $this->Ocorrencia_model->getOcorrencia($id_ocorrencia);
		$this->load->view('editar_ocorrencia', $ocorrencia);
		
	}

	public function editMinhaOcorrencia($id_ocorrencia){

		$ocorrencia['row'] = $this->Ocorrencia_model->getOcorrencia($id_ocorrencia);
		$this->load->view('editarminha_ocorrencia', $ocorrencia);
		
	}

	public function updateOcorrencia($id_ocorrencia){

		$this->Ocorrencia_model->atualizarOcorrencia($id_ocorrencia);
		redirect("Redirect/minhasocorrencias");
	}

	public function deleteOcorrencia($id_ocorrencia){

		$this->Ocorrencia_model->deletarOcorrencia($id_ocorrencia);
		redirect("Redirect/minhasocorrencias");
	}	

	public function deleteOcorrenciaADM($id_ocorrencia){

		$this->Ocorrencia_model->deletarOcorrencia($id_ocorrencia);
		redirect("Redirect/tabela_ocorrencias");

	}

	public function likeOcorrencia($id_ocorrencia){


		$usuarioLogado = $this->session->userdata('usuario');
		$this->Ocorrencia_model->curtirOcorrencia($id_ocorrencia,$usuarioLogado);
		redirect("Redirect/ocorrencias");


	}

	public function deslikeOcorrencia($id_ocorrencia){

		$usuarioLogado = $this->session->userdata('usuario');
		$this->Ocorrencia_model->descurtirOcorrencia($id_ocorrencia,$usuarioLogado);
		redirect("Redirect/ocorrencias");

	}

	public function minhasOcorrencias(){
		redirect("Redirect/minhasocorrencias");

	}



}
