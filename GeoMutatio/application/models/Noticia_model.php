<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia_model extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}


//Funções de consulta

	function getNoticias()
	{
		$query = $this->db->query('SELECT * FROM noticia');
		return $query->result();
	}

	function getNoticia($codnoticia)
	{
		$query = $this->db->query('SELECT * FROM noticia WHERE `codnoticia` ='.$codnoticia);
		return $query->row();
	}

	function getNoticiasRelacionada($codnoticia)
	{
		$query = $this->db->query('SELECT * FROM noticia WHERE `codnoticia` != ".$codnoticia." ORDER BY rand() limit 3');
		return $query->result();
	}

	function getLastsNoticias()
	{
		$ult = $this->db->query('SELECT * FROM noticia ORDER BY codnoticia DESC LIMIT 3');
		return $ult->result();
	}
	

//Funções do CRUD

	function criarNoticia($file){

		$nome_noticia = $this->input->post('titulo_noticia');


		$noticia = array(
			'titulo_noticia' => $this->input->post('titulo_noticia'),
			'subtitulo_noticia' => $this->input->post('subtitulo_noticia'),
			'desc_noticia' => $this->input->post('desc_noticia'),
			'data_noticia' => $this->input->post('data_noticia'),
			'foto_noticia' => $foto_noticia,
			'cpf' => $this->input->post('cpf')
		);

			$target_dir = BASEPATH."../assets/imagens/noticias/";
			$target_file = $target_dir . basename($file["foto_noticia"]["name"]);



	   		if (move_uploaded_file($file["foto_noticia"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $file["foto_noticia"]["name"]). " has been uploaded.";

	        $nome_antigo = $target_dir.basename($file["foto_noticia"]["name"]);
	        $nome_novo = $target_dir.$nome_noticia;

	        rename($nome_antigo, $nome_novo);



	    	} else {
	        	echo "Sorry, there was an error uploading your file.";
	    	}




		$this->db->insert('noticia', $noticia);
	}

	function atualizarNoticia($codnoticia)
	{
		$noticia = array(
			'titulo_noticia' => $this->input->post('titulo_noticia'),
			'subtitulo_noticia' => $this->input->post('subtitulo_noticia'),
			'desc_noticia' => $this->input->post('desc_noticia'),
            'data_noticia' => $this->input->post('data_noticia'),
			'foto_noticia' => $this->input->post('foto_noticia'),
		);
		$this->db->where('codnoticia', $codnoticia);
		$this->db->update('noticia', $noticia);
	}

	function deletarNoticia($codnoticia)
	{
		$this->db->where('codnoticia', $codnoticia);
		$this->db->delete('noticia');
	}

	function noticiasIguais(){

		$nomeNoticia = $this->input->post('titulo_noticia');
		$noticias = $this->Noticia_model->getNoticias();

		$value = 'válido';

		foreach ($noticias as $noticia) {
			$array_noticias[] = $noticia->titulo_noticia; 
		}
			foreach ($array_noticias as $titulo) {
				if ($titulo == $nomeNoticia) {
					$value = 'inválido';
				}
			}
		return $value;
	}


}
