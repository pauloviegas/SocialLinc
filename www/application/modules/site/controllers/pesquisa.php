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

    public function index()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;
        
        //Recuperação de Dados
        $this->data['linhas'] = $this->viewPesquisaLinhaGrupoVinculoModel->recupera(Array('id_grupo' => 7));
        $this->data['projetos'] = $this->viewProjetoModel->recupera(Array('id_laboratorio' => 7, 'publico' => 1), Array('nome' => 'asc'));

        //Redirecionamento
        $this->load->view('pesquisa/index', $this->data);
    }

    public function linhas()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;
        
        //Recuperação de Dados
        $this->data['linhas'] = $this->viewPesquisaLinhaGrupoVinculoModel->recupera(Array('id_grupo' => 7));

        //Redirecionamento
        $this->load->view('pesquisa/linhas', $this->data);
    }
    
    public function projetos()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;
        
        //Recuperação de Dados
        $this->data['projetos'] = $this->viewProjetoModel->recupera(Array('id_laboratorio' => 7, 'publico' => 1), Array('nome' => 'asc'));
        
        //Redirecionamento
        $this->load->view('pesquisa/projetos', $this->data);
    }
    
    public function projetosLinha()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Recuperação de Dados
        $idLinha = $this->uri->segment(4);
        $this->data['projetos'] = $this->viewPesquisaLinhaGrupoVinculoModel->recupera(Array('id_linha' => $idLinha, 'id_tipo_grupo' => 2), Array('nome_grupo' => 'asc'));
        
        //Redirecionamento
        $this->load->view('pesquisa/projetoLinha', $this->data);
    }
    
    public function projeto()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Recuperação de Dados
        $idProjeto = $this->uri->segment(4);
        $this->data['projeto'] = $this->viewProjetoModel->recupera(Array('id' => $idProjeto));
        $this->data['usuarios'] = $this->viewUsuarioGrupoVinculoModel->recupera(Array('id_grupo' => $idProjeto), Array('nome_usuario' => 'asc'));
        $this->data['linhas'] = $this->viewPesquisaLinhaGrupoVinculoModel->recupera(Array('id_grupo' => $idProjeto));
        $this->data['alumni'] = 0;
        
        //Redirecionamento
        $this->load->view('pesquisa/projeto', $this->data);
    }

        public function publicacoes()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('pesquisa/publicacoes', $this->data);
    }

}
