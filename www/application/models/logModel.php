<?php

class logModel extends abstractModel
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
