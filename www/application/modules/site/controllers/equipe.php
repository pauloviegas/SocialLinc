<?php

class equipe extends SiteController
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
        $this->load->model('viewUsuarioGrupoVinculoModel');
    }

    public function index()
    {
        //Recuperação de Dados
        $this->data['usuarios'] = $this->viewUsuarioGrupoVinculoModel->recuperaPorParametro(NULL, Array('id_grupo' => 7), Array('nome_usuario' => 'asc'));
        
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('equipe/index', $this->data);
    }

}
