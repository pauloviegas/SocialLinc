<?php

/**
 * Classe abstrata, implementa todos os métodos de conexão com o banco, para
 * apenas serem utilizadas ou sobrescritas nas classes filhas.
 * @package    Abtract
 * @subpackage Models
 */
class abstractModel extends CI_Model {
	/**
	 * @var String $_table variável abstrata que será sobrescrita nas classes
	 *  filhas, representando a tabela na qual a model vai atuar.
	 * @access Protected
	 */
	protected $_table = "";

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Recupera todas as colunas contidas na tabela (definida pela variável
	 *  $_table).
	 * @return Array
	 * @author    Paulo Viegas <pauloviegas93@gmail.com>
	 * @copyright 2015 LINC - Laboratório de Inteligência Computacional e
	 *  Pesquisa Operacional (UFPA - Universidade Federal do Pará).
	 * @access    public
	 */
	public function descreverTabela() {
		$resultado = $this->db->query('describe ' . $this->_table);
		$dados = $resultado->result_array();
		$colunas = Array();
		foreach ($dados as $dado) {
			array_push($colunas, $dado['Field']);
		}
		return $colunas;
	}

	/**
	 * Função genérica para inserir informações na tabela (definida pela
	 *  variável $_tabela).
	 * @return Int Se for inserido com sucesso retorna o id da inserção, caso
	 * ocorra um erro retorna 0.
	 * @author    Paulo Viegas <pauloviegas93@gmail.com>
	 * @copyright 2015 LINC - Laboratório de Inteligência Computacional e
	 *  Pesquisa Operacional (UFPA - Universidade Federal do Pará).
	 * @access    public
	 *
	 * @param Array $dados Vetor com as informações validadas, tratadas e
	 *                     obrigatórias (no mínimo), vindas do formulário.
	 */
	public function inserir(Array $dados) {
		$colunasBanco = $this->descreverTabela();
		foreach ($dados as $coluna => $valor) {
			if (!in_array($coluna, $colunasBanco)) {
				unset($dados[$coluna]);
			}
		}
		if ($this->db->insert($this->_table, $dados)) {
			return $this->db->insert_id();
		} else {
			return 0;
		}
	}

	/**
	 * Função genérica para alterar informumações na tabela (definida pela variável $_tabela).   *
	 * @return Int Se for alterado com sucesso retorna a quantida de linhas
	 * afetadas pela query, caso contrário retorna 0.
	 * @author    Paulo Viegas <pauloviegas93@gmail.com>
	 * @copyright 2015 LINC - Laboratório de Inteligência Computacional e Pesquisa Operacional (UFPA - Universidade Federal do Pará).
	 * @access    public
	 *
	 * @param Array $dados              Contendo as novas informações validadas e tratadas,
	 *                                  prontas para serem aletaradas no banco.
	 * @param Array $parametroAlteracao Parametro(s) de busca para alteração.
	 */
	public function alterar(Array $dados, Array $parametroAlteracao = NULL) {
		$arrayDados = (Array)$dados;
		$colunasBanco = $this->descreverTabela();
		$novoDados = Array();
		if ($parametroAlteracao) {
			$where = $parametroAlteracao;
		} else {
			$where['id'] = $arrayDados['id'];
		}
		foreach ($arrayDados as $coluna => $valor) {
			if (in_array($coluna, $colunasBanco) && $coluna != 'id') {
				$novoDados[$coluna] = $valor;
			}
		}
		if (count($novoDados) > 0) {
			if ($this->db->update($this->_table, $novoDados, $where)) {
				return $this->db->affected_rows();
			} else {
				return 0;
			}
		}
	}

	/**
	 * Função genérica para excluir informações na tabela (definida pela
	 *  variável $_tabela).
	 * @return Int Se for inserido com sucesso retorna o id da inserção, caso
	 * ocorra um erro retorna 0.
	 * @author    Paulo Viegas <pauloviegas93@gmail.com>
	 * @copyright 2015 LINC - Laboratório de Inteligência Computacional e
	 *  Pesquisa Operacional (UFPA - Universidade Federal do Pará).
	 * @access    public
	 *
	 * @param Array $dados Vetor com as informações validadas, tratadas e
	 *                     obrigatórias (no mínimo), vindas do formulário.
	 */
	public function deletar($id = NULL, Array $parametros = NULL) {
		if ($id) {
			$parametros['id'] = $id;
		}
		$colunasBanco = $this->descreverTabela();
		if (in_array('excluido', $colunasBanco)) {
			if ($this->db->update($this->_table, Array('excluido' => 1), $parametros)) {
				return $this->db->affected_rows();
			} else {
				return 0;
			}
		} else {
			if ($this->db->delete($this->_table, $parametros)) {
				return $this->db->affected_rows();
			} else {
				return 0;
			}
		}
	}

	public function recupera(Array $parametro = NULL, Array $ordens = NULL, $limiteInicial = NULL, $limiteFinal = NULL) {
		if ($ordens) {
			foreach ($ordens as $coluna => $ordenacao) {
				$this->db->order_by($coluna, $ordenacao);
			}
		}
		($parametro) ? $this->db->where($parametro) : '';
		($limiteInicial && !$limiteFinal) ? $this->db->limit($limiteInicial) : '';
		($limiteInicial && $limiteFinal) ? $this->db->limit($limiteInicial, $limiteFinal) : '';
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function recuperaUrl() {
		$modulo = $this->uri->segment('1');
		$controller = $this->uri->segment('2');
		$action = $this->uri->segment('3');
		$acao = $modulo . '/' . $controller . '/' . $action;
		return $acao;
	}
}
