<?php

class pesquisa extends SiteController
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
        $this->load->model('viewPesquisaLinhaGrupoVinculoModel');
        $this->load->model('viewProjetoModel');
        $this->load->model('viewUsuarioGrupoVinculoModel');
    }

    public function linhas()
    {
        //Recuperação de Dados
        $this->data['linhas'] = $this->viewPesquisaLinhaGrupoVinculoModel->recuperaPorParametro(NULL, Array('id_grupo' => 7));
        
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('pesquisa/linhas', $this->data);
    }
    
    public function projetos()
    {
        //Recuperação de Dados
        $this->data['projetos'] = $this->viewProjetoModel->recuperaPorParametro(NULL, Array('id_laboratorio' => 7, 'publico' => 1));
        
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('pesquisa/projetos', $this->data);
    }
    
    public function projeto()
    {
        //Recuperação de Dados
        $idProjeto = $this->uri->segment(4);
        $this->data['projeto'] = $this->viewProjetoModel->recuperaPorParametro($idProjeto);
        $this->data['usuarios'] = $this->viewUsuarioGrupoVinculoModel->recuperaPorParametro(NULL, Array('id_grupo' => $idProjeto), 'nome_usuario', 'asc');
        
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('pesquisa/projeto', $this->data);
    }

        public function publicacoes()
    {
        //Recuperação de Dados
        
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('pesquisa/publicacoes', $this->data);
    }

}
