<?php

class log extends SocialController
{
    
    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('viewLogUsuarioAcaoModel');
    }
    
    public function index()
    {
        //Recuperação de Dados
        $this->data['logs'] = $this->viewLogUsuarioAcaoModel->recuperaTodos();
        
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;
        
        //Redirecionamento
        $this->load->view('social/log/index', $this->data);
    }
}
