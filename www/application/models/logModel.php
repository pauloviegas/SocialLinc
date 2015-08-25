<?php

class logModel extends abstractModel
{

    protected $_table = 'sitelinc_log_log';

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
