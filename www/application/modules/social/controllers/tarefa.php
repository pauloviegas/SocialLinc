<?php

class tarefa extends SocialController
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tarefaModel');
    }
    
    public function index()
    {
        //Permissões
        $this->data['aprovarTarefa'] = $this->viewPerfilAcaoModel->verificaPermissao('social/tarefa/aprovar');
        
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;
        
        //Recuperação de Dados
        
        //Redirecionamento
        $this->load->view('social/tarefa/index', $this->data);
    }
}
