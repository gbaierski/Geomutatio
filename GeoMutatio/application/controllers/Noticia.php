<?php

include('Redirect.php');
defined('BASEPATH') OR exit('No direct script access allowed');

Class Noticia extends Redirect{


//Funções do CRUD


	public function createNoticia(){


		$nomesIguais = $this->Noticia_model->noticiasIguais();



		if ($nomesIguais == 'válido') {
			
		
			@$foto = getimagesize($_FILES['foto_noticia']);

			if (is_null($foto) or ($foto["mime"] == "image/jpeg") or ($foto["mime"] == "image/png") or ($foto["mime"] == "image/jpg")){
							
				$this->Noticia_model->criarNoticia($_FILES);
				redirect("Redirect/noticias");

			}else{

				$this->session->set_flashdata("fotoInvalida", "Envie um arquivo no formato PNG ou JPG!");
				redirect("Redirect/cad_noticia");


			}

		}else{

			$this->session->set_flashdata("nomeNoticiaInvalido", "Já existe uma notícia cadastrada com este nome!");
			redirect("Redirect/cad_noticia");

		}
	}

	public function editNoticia($codnoticia)
	{
		$noticia['row'] = $this->Noticia_model->getNoticia($codnoticia);
		$this->load->view('editar_noticia', $noticia);
		
	}

	public function editMinhaNoticia($codnoticia)
	{
		$noticia['row'] = $this->Noticia_model->getNoticia($codnoticia);
		$this->load->view('editarminha_noticia', $noticia);
		
	}

	public function updateNoticia($codnoticia)
	{
		$this->Noticia_model->atualizarNoticia($codnoticia);
		redirect("Redirect/tabela_noticias");
	}
	
	public function updateMinhaNoticia($codnoticia)
	{
		$this->Noticia_model->atualizarNoticia($codnoticia);
		redirect("Redirect/minhasnoticias");
	}

	public function deleteNoticia($codnoticia)
	{
		$this->Noticia_model->deletarNoticia($codnoticia);
		redirect("Redirect/tabela_noticias");
	}

	public function deleteMinhaNoticia($codnoticia)
	{
		$this->Noticia_model->deletarNoticia($codnoticia);
		redirect("Redirect/minhasnoticias");
	}


}