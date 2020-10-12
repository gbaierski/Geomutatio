<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ocorrencia_model extends CI_Model{

	public function __construct(){

		$this->load->database();

	}



	function criarOcorrencia(){

		$local = $this->Ocorrencia_model->validaLatLng($this->input->post('local'));

		$ocorrencia = $this->input->post('tipo_ocorrencia');

		if ($ocorrencia == 'buraco') {

			$nome = 'Buraco';
			$imagem = 'p_buraco.png';
			
		}elseif ($ocorrencia == 'alagamento') {

			$nome = 'Alagamento';
			$imagem = 'p_alagamento.png';
			
		}elseif ($ocorrencia == 'deslizamento') {

			$nome = 'Deslizamento de Terra';
			$imagem = 'p_deslizamento.png';
			
		}elseif ($ocorrencia == 'arvore') {

			$nome = 'Árvore Caída';
			$imagem = 'p_arvore.png';
			
		}else {
			$nome = 'ocorrencia';
			$imagem = 'default.png';
		}


		$ocorrencia = array(

			'nome_ocorrencia' => $nome,
			'tipo_ocorrencia' => $this->input->post('tipo_ocorrencia'),
			'data_ocorrencia' => $this->input->post('data_ocorrencia'),
			'qtd_curtidas' => 10,
			'local' => $local,
			'cpf' => $this->input->post('cpf'),
			'imagem_ocorrencia' => $imagem

		);

		$this->db->insert('ocorrencia', $ocorrencia);
	}

	function getOcorrencias()
	{
		$query = $this->db->query('SELECT * FROM ocorrencia');
		return $query->result();
	}


	function getOcorrencia($id_ocorrencia)
	{
		$query = $this->db->query('SELECT * FROM ocorrencia WHERE `id_ocorrencia` ='.$id_ocorrencia);
		return $query->row();
	}

	

	function atualizarOcorrencia($id_ocorrencia)
	{

		$ocorrencia = $this->input->post('tipo_ocorrencia');

		if ($ocorrencia == 'buraco') {

			$nome = 'Buraco';
			$imagem = 'p_buraco.png';
			
		}elseif ($ocorrencia == 'alagamento') {

			$nome = 'Alagamento';
			$imagem = 'p_alagamento.png';
			
		}elseif ($ocorrencia == 'deslizamento') {

			$nome = 'Deslizamento de Terra';
			$imagem = 'p_deslizamento.png';
			
		}elseif ($ocorrencia == 'arvore') {

			$nome = 'Árvore Caída';
			$imagem = 'p_arvore.png';
			
		}else {
			$nome = 'ocorrencia';
			$imagem = 'default.png';
		}


			$ocorrencia = array(
			
			'nome_ocorrencia' => $nome,
			'tipo_ocorrencia' => $this->input->post('tipo_ocorrencia'),
			'data_ocorrencia' => $this->input->post('data_ocorrencia'),
			'imagem_ocorrencia' => $imagem
			
		);
		$this->db->where('id_ocorrencia', $id_ocorrencia);
		$this->db->update('ocorrencia', $ocorrencia);
	}

		function deletarOcorrencia($id_ocorrencia){

		$this->db->where('id_ocorrencia', $id_ocorrencia);
		$this->db->delete('ocorrencia');

		$curtidasArray = $this->Ocorrencia_model->getCurtidas();

		foreach ($curtidasArray as $curtida) {
			if ($curtida->ocorrencia_id == $id_ocorrencia) {
				
				$this->Ocorrencia_model->deleteCurtida($curtida->id_curtida);
			}
		}
	}

		function lat_lng_array($local){

			$localFrag1 = explode("(", $local);
			$localFrag2 = explode(")", $localFrag1[1]);
			$localFrag3 = explode(",", $localFrag2[0]);

			$latLng['lat'] = $localFrag3[0];
			$latLng['lng'] = $localFrag3[1];

			return $latLng;

		}

		function validaLatLng($local){

			$localFrag1 = explode("(", $local);
			$localFrag2 = explode(")", $localFrag1[1]);
			
			$latLng = $localFrag2[0];

			return $latLng;

		}

		function getCurtida($id_ocorrencia){

			$query = $this->db->query('SELECT * FROM curtidas WHERE `ocorrencia_id` ='.$id_ocorrencia);
			return $query->row();

		}

		function getCurtidas(){
			$query = $this->db->query('SELECT * FROM curtidas');
			return $query->result();
		}


		function curtirOcorrencia($id_ocorrencia, $usuarioLogado){

			$curtidas = $this->Ocorrencia_model->getCurtidas();
			$usuario =  $usuarioLogado;

			$validacao = 0;


		
			if ($curtidas) {
				
			
				foreach ($curtidas as $curtida) {

					if ($curtida->usuario_cpf == $usuario['cpf'] and $curtida->ocorrencia_id == $id_ocorrencia ) {
			

						$validacao ++;


			
					}
					
				}
			}



			if ($validacao != 1) {
				
							$curtidasArray = array(
						
								'usuario_cpf' => $usuario['cpf'],
								'ocorrencia_id' => $id_ocorrencia,
								'avaliacao' => 'like',
									
							);
								

							$this->db->insert('curtidas', $curtidasArray);

			}elseif ($validacao == 1) {

							$curtidasArray = array(
								
								'usuario_cpf' => $usuario['cpf'],
								'ocorrencia_id' => $id_ocorrencia,
								'avaliacao' => 'like',
											
							);
										
							$this->db->where('usuario_cpf', $usuario['cpf']);
							$this->db->where('ocorrencia_id', $id_ocorrencia);
							$this->db->update('curtidas', $curtidasArray);
			}else{
				echo "erro";
			}



		}


		function descurtirOcorrencia($id_ocorrencia, $usuarioLogado){

			$curtidas = $this->Ocorrencia_model->getCurtidas();
			$usuario =  $usuarioLogado;

			$validacao = 0;


		
			if ($curtidas) {
				
			
				foreach ($curtidas as $curtida) {

					if ($curtida->usuario_cpf == $usuario['cpf'] and $curtida->ocorrencia_id == $id_ocorrencia ) {
						

						$validacao ++;


			
					}
					
				}
			}



			if ($validacao != 1) {
				
							$curtidasArray = array(
						
								'usuario_cpf' => $usuario['cpf'],
								'ocorrencia_id' => $id_ocorrencia,
								'avaliacao' => 'deslike',
									
							);
								

							$this->db->insert('curtidas', $curtidasArray);

			}elseif ($validacao == 1) {

							$curtidasArray = array(
								
								'usuario_cpf' => $usuario['cpf'],
								'ocorrencia_id' => $id_ocorrencia,
								'avaliacao' => 'deslike',
											
							);


										
							$this->db->where('usuario_cpf', $usuario['cpf']);
							$this->db->where('ocorrencia_id', $id_ocorrencia);
							$this->db->update('curtidas', $curtidasArray);
			}else{
				echo "erro";
			}



		}

		
		function atualiza_curtidas(){

			$curtidas = $this->Ocorrencia_model->getCurtidas();
			$qtd_curtidas = [];
			

			$qtd_curtidas[$curtida->ocorrencia_id] = 0;

			
			foreach ($curtidas as $curtida) {
				
				$query[$curtida->ocorrencia_id] = $this->db->query("SELECT * FROM curtidas WHERE `ocorrencia_id` =".$curtida->ocorrencia_id);

				if($curtida->avaliacao == 'like'){
				
				$qtd_curtidas[$curtida->ocorrencia_id]++;

				}elseif ($curtida->avaliacao == 'deslike') {
					
					$qtd_curtidas[$curtida->ocorrencia_id] = $qtd_curtidas[$curtida->ocorrencia_id] - 1;

				}else{
					echo "erro";
				}

			}


			foreach ($qtd_curtidas as $id_ocorrenciaCurtida => $valorCurtida) {


				$ocorrenciaArray = array(

					'qtd_curtidas' => $valorCurtida,

				);

				foreach ($ocorrenciaArray as $ocorrenciaNome => $ocorrenciaValor) {
					
					$ocorrencia[$ocorrenciaNome] = $ocorrenciaValor + 10;
				}

			$this->db->where('id_ocorrencia', $id_ocorrenciaCurtida);
			$this->db->update('ocorrencia', $ocorrencia);

			}

		

		}

		function deleteCurtida($id_curtida){

		$this->db->where('id_curtida', $id_curtida);
		$this->db->delete('curtidas');
		}


		function deletaOcorrenciaFalsa(){


			

				$curtidasArray = $this->Ocorrencia_model->getOcorrencias();

				foreach ($curtidasArray as $curtida) {
					if ($curtida->qtd_curtidas <= 5 ) {

						$this->Ocorrencia_model->deletarOcorrencia($curtida->id_ocorrencia);


							
					}else{

						

					}
					

					
				}

				
			
	
			


		}

		function atualizaImagemOcorrencia(){

			$ocorrencias = $this->Ocorrencia_model->getOcorrencias();

			foreach ($ocorrencias as $ocorrencia) {


				if ($ocorrencia->qtd_curtidas >= 15 ) {
						
						$nome_imagem = $ocorrencia->tipo_ocorrencia . '.png';

						$ocorrenciaArray = array(

						'imagem_ocorrencia' => $nome_imagem,

						);

			$this->db->where('id_ocorrencia', $ocorrencia->id_ocorrencia);
			$this->db->update('ocorrencia', $ocorrenciaArray);

				}else{

					$nome_imagem = 'p_'.$ocorrencia->tipo_ocorrencia . '.png';


					$ocorrenciaArray = array(

						'imagem_ocorrencia' => $nome_imagem,

						);

			$this->db->where('id_ocorrencia', $ocorrencia->id_ocorrencia);
			$this->db->update('ocorrencia', $ocorrenciaArray);

				}

			}

		}




			function atualizaSetas($usuarioLogado,$id_ocorrencia){

				$ocorrenciaArray = $this->Ocorrencia_model->getCurtidas();

				foreach ($ocorrenciaArray as $ocorrencia) {
					if ($ocorrencia->ocorrencia_id == $id_ocorrencia and $ocorrencia->usuario_cpf == $usuarioLogado['cpf'] ) {
						$curtida_user = $ocorrencia->avaliacao;

					}
				}
				
				return $curtida_user;

			}

	



	}

?>


