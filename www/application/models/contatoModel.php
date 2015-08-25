<?php

class contatoModel extends abstractModel
{

    protected $_table = '';

    public function __construct()
    {

        parent::__construct();
    }

    public function enviarEmail($mensagem)
    {
        $this->email->from($mensagem['email'], $mensagem['nome']);
        $this->email->to('linc@ufpa.br');
        $this->email->subject('Contato');
        $this->email->message($mensagem['mensagem']);
        if ($this->email->send())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

}
