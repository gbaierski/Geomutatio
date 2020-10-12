<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Familia_model extends CI_Model{

//Funções de consulta

	function getFamilias()
	{
		$query = $this->db->query('SELECT * FROM familia');
		return $query->result();
	}

	function getFamilia($id_familia)
	{
		$query = $this->db->query('SELECT * FROM familia WHERE `id_familia` ='.$id_familia);
		return $query->row();
	}

//Funções do CRUD

	function criarFamilia($file){

		$nome_familia = $this->input->post('nome_fam');
		$foto_familia = $nome_familia;

		$familia = array(
			'nome_fam' => $nome_familia,
			'endereco_fam' => $this->input->post('endereco_fam'),
			'telefone_fam' => $this->input->post('telefone_fam'),
			'pessoas_fam' => $this->input->post('pessoas_fam'),
			'recursos_nec' => $this->input->post('recursos_nec'),
			'foto_familia' => $foto_familia,
			'cpf' => $this->input->post('cpf')
		);

			$target_dir = BASEPATH."../assets/imagens/familias/";
			$target_file = $target_dir . basename($file["foto_familia"]["name"]);



	   		if (move_uploaded_file($file["foto_familia"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $file["foto_familia"]["name"]). " has been uploaded.";

	        $nome_antigo = $target_dir.basename($file["foto_familia"]["name"]);
	        $nome_novo = $target_dir.$nome_familia;

	        rename($nome_antigo, $nome_novo);



	    	} else {
	        	echo "Sorry, there was an error uploading your file.";
	    	}



		$this->db->insert('familia', $familia);
	}

	function atualizarFamilia($id_familia)
	{
		$familia = array(
			'nome_fam' => $this->input->post('nome_fam'),
			'endereco_fam' => $this->input->post('endereco_fam'),
			'telefone_fam' => $this->input->post('telefone_fam'),
			'pessoas_fam' => $this->input->post('pessoas_fam'),
			'recursos_nec' => $this->input->post('recursos_nec'),
			'foto_familia' => $this->input->post('foto_familia'),
		);
		$this->db->where('id_familia', $id_familia);
		$this->db->update('familia', $familia);
	}

	function deletarFamilia($id_familia)
	{
		$this->db->where('id_familia', $id_familia);
		$this->db->delete('familia');
	}

	function familiasIguais(){

		$nomeFamilia = $this->input->post('nome_fam');
		$familias = $this->Familia_model->getFamilias();

		$value = 'válido';

		foreach ($familias as $familia) {
			$array_familias[] = $familia->nome_fam; 
		}
			foreach ($array_familias as $nome_fam) {
				if ($nome_fam == $nomeFamilia) {
					$value = 'inválido';
				}
			}
		return $value;
	}
	
	function getLastsFamilias()
	{
		$ult = $this->db->query('SELECT * FROM familia ORDER BY id_familia DESC LIMIT 4');
		return $ult->result();
	}


}
