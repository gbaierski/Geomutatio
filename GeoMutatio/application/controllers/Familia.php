<?php

include('Redirect.php');
defined('BASEPATH') OR exit('No direct script access allowed');

Class Familia extends Redirect{


//Funções do CRUD


	public function createFamilia(){

		$familiasIguais = $this->Familia_model->familiasIguais();

			if ($familiasIguais == 'válido') {

				@$foto = getimagesize($_FILES['foto_familia']);

				if (is_null($foto) or ($foto["mime"] == "image/jpeg") or ($foto["mime"] == "image/png") or ($foto["mime"] == "image/jpg")){

					$this->Familia_model->criarFamilia($_FILES);
					redirect("Redirect/familias");

				}else{

					$this->session->set_flashdata("fotoInvalida", "Envie um arquivo no formato PNG ou JPG!");
					redirect("Redirect/cad_familia");

				}

			}else{

			$this->session->set_flashdata("nomeFamiliaInvalido", "Já existe uma família cadastrada com este nome!");
			redirect("Redirect/cad_familia");

		}

	}
	public function editFamilia($id_familia)
	{
		$familia['row'] = $this->Familia_model->getFamilia($id_familia);
		$this->load->view('editar_familia', $familia);
		
	}

	public function editMinhaFamilia($codfamilia)
	{
		$familia['row'] = $this->Familia_model->getFamilia($codfamilia);
		$this->load->view('editarminha_familia', $familia);
		
	}


	public function updateFamilia($id_familia)
	{
		$this->Familia_model->atualizarFamilia($id_familia);
		redirect("Redirect/familias");
	}

	public function deleteFamilia($id_familia)
	{
		$this->Familia_model->deletarFamilia($id_familia);
		redirect("Redirect/tabela_familias");
	}

	public function deleteMinhaFamilia($id_familia)
	{
		$this->Familia_model->deletarFamilia($id_familia);
		redirect("Redirect/minhasfamilias");
	}


}