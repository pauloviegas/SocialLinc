<?php

class permissao extends SocialController
{

    /**
     * Carrega todos os métodos contidos na classe pai, necessárias .
     * @param NULL
     * @author Paulo Viegas <pauloviegas93@gmail.com>
     * @return NULL
     */
    public function __construct()
    {

        parent::__construct();
        $this->load->model('permissaoModel');
        $this->load->model('acaoModel');
    }

    public function index()
    {
        //Permissões

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;
        
        //Recuperação de Dados
        $idPerfil = $this->uri->segment(4);
        $this->data['controllers'] = $this->acaoModel->recuperaPermissaoDivididaPorController($idPerfil);
        $this->data['idPerfil'] = $idPerfil;

        //Redirecionamento
        $this->load->view('permissao/index', $this->data);
    }
    
    public function atualizarPermissao()
    {
        $resposta = 0;
        $permissao = $this->_request;
        $permissaoParaAtualizar = $this->permissaoModel->recupera(Array(
            'id_acao' => $permissao['idAcao'],
            'id_perfil' => $permissao['idPerfil']));
        if(count($permissaoParaAtualizar) > 0)
        {
            $resposta = $this->permissaoModel->deletar($permissaoParaAtualizar[0]->id);
        }
        else
        {
            $resposta = $this->permissaoModel->inserir(Array(
                'id_acao' => $permissao['idAcao'],
                'id_perfil' => $permissao['idPerfil']));
        }        
        return print json_encode($resposta);
    }

}
