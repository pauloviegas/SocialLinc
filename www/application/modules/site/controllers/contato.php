<?php

class contato extends SiteController
{

    /**
     * Carrega todos os métodos contidos na classe pai, bem como a Model acaoModel.
     * @param NULL
     * @author Paulo Viegas <pauloviegas93@gmail.com>
     * @return NULL
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('contatoModel');
    }

    public function index()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('contato/index', $this->data);
    }
    
    public function enviar()
    {
        $mensagem = $this->_request;
        if ($mensagem)
        {
            $email = $this->contatoModel->enviarEmail($mensagem);
            if($email)
            {
                $this->session->set_flashdata(
                        'sucesso', 'Sua mensagem foi enviada com sucesso!');
                redirect('site/contato/index');
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Ocorreu um erro e sua mensagem nãpo foi'
                        . ' inserida com sucesso!');
                redirect('site/contato/index');
            }
        }
    }

}
