<?php

class sistema extends SocialController
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
        $this->load->model('viewUsuarioGrupoVinculoModel');
        $this->load->model('perfilModel');
        $this->load->model('usuarioVinculoModel');
    }

    public function index()
    {
        //Recuperação de Dados
        $this->data['usuariosVinculados'] = $this->viewUsuarioGrupoVinculoModel->recuperaPorParametro(NULL, Array('id_grupo' => 1), Array('nome_usuario' => 'asc'));
        $this->data['usuarios'] = $this->usuarioModel->recuperaUsuariosQueNaoPertecemAoLab(1, 5);
        $this->data['perfis'] = $this->perfilModel->recuperaTodos("perfil", "asc");

        //Permissões
        $this->data['permissaoVincularUsuario'] = $this->viewPerfilAcaoModel->verificaPermissao('social/sistema/vincularUsuario');
        $this->data['permissaoDesvincularUsuario'] = $this->viewPerfilAcaoModel->verificaPermissao('social/sistema/vincularUsuario');

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('sistema/index', $this->data);
    }
    
    public function vincularUsuario()
    {
        $this->form_validation->set_rules('id_usuario', 'Usuário', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('id_perfil', 'Perfil de Vinculo', 'required|is_natural_no_zero');
        $this->form_validation->set_message('is_natural_no_zero', 'Você não selecionou o Usuário ou'
                . ' o tipo de vínculo que ele tem com o laboratório. Faça novamente.');
        $usuario = $this->_request;
        if ($this->form_validation->run())
        {
            if ($this->usuarioVinculoModel->inserir($usuario))
            {
                $this->session->set_flashdata(
                        'sucesso', 'O Usuário foi vinculado com sucesso!');
            redirect('social/sistema/index');
            }
            else
            {
                $this->session->set_flashdata(
                        'noticia', 'Ops... Ocorreu um problema e o usuário não foi'
                        . ' vinculado com sucesso! Tente Novamente!');
            redirect('social/sistema/index');
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/sistema/index');
        }
    }

    public function desvincularUsuario()
    {
        $idVinculo = $this->uri->segment(4);
        if ($this->usuarioVinculoModel->deletar($idVinculo))
        {
            $this->session->set_flashdata(
                    'sucesso', 'O usuário foi desvinculado com sucesso!');
            redirect('social/sistema/index/');
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Ocorreu um erro e o usuário não foi'
                    . ' desvinculado com sucesso! Tente novamente.');
            redirect('social/sistema/index/');
        }
    }

}
