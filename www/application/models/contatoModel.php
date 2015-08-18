<?php

class contatoModel extends abstractModel
{

    /**
     * @var String $_table Nome da tabela no banco na qual este Model atua.
     */
    protected $_table = '';

    /**
     * Carrega todos os métodos contidos na classe pai.
     * @param NULL
     * @author Paulo Viegas <pauloviegas93@gmail.com>
     * @return NULL
     */
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
