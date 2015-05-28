<?php

class logModel extends AbstractModel
{

    /**
     * @var String $_table Nome da tabela no banco na qual este Model atua.
     */
    protected $_table = 'sitelinc_log_log';

    /**
     * Carrega todos os métodos contidos na classe pai.
     * @param NULL
     * @author Paulo Viegas <pauloviegas93@gmail.com>
     * @return NULL
     */
    public function __construct()
    {

        parent::__construct();
        $this->load->model('acaoModel');
    }

    public function inserir(Array $dados, $acao = NULL)
    {
        $novaAcao = ($acao != NULL) ? $acao : $this->recuperaUrl();
        $MVC = explode('/', $novaAcao);
        $usuarios = $this->session->userdata('usuario');
        foreach ($dados as $dado)
        {
            if (array_key_exists('id', $dado))
            {
                $idUsuario = $dado['id'];
            }
            else
            {
                $idUsuario = $usuarios->id;
            }
        }
        $permissao = $this->acaoModel->recuperaPorParametro(NULL, Array(
            'modulo' => $MVC[0],
            'controller' => $MVC[1],
            'action' => $MVC[2]
        ));
        $xml = $this->gerarXML($dados);
        $data = date('Y-m-d H:i:s');
        $log = Array(
            'id_usuario' => $idUsuario,
            'id_acao' => $permissao[0]->id,
            'descricao' => $xml,
            'data' => $data
        );
        $this->db->insert($this->_table, $log);
        return $this->db->insert_id();
    }

    public function gerarXML(Array $vdados)
    {
        $string = '<?xml version="1.0" encoding="UTF-8"?>';
        foreach ($vdados as $operacao => $linhas)
        {
            $string .= '<' . $operacao . '>';
            foreach ($linhas as $colunas => $valor)
            {
                $string .= '<' . $colunas . '>';
                $string .= $valor;
                $string .= '</' . $colunas . '>';
            }
            $string .= '</' . $operacao . '>';
        }
        return $string;
    }

}
