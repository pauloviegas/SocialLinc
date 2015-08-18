<?php

class perfil extends SocialController
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
        $this->load->model('perfilModel');
    }

    public function index()
    {
        //Permissões
        $this->data['permissaoCriar'] = $this->viewPerfilAcaoModel->verificaPermissao('social/perfil/criar');
        $this->data['permissaoPermissao'] = $this->viewPerfilAcaoModel->verificaPermissao('social/permissao/index');
        $this->data['permissaoEditarPerfil'] = $this->viewPerfilAcaoModel->verificaPermissao('social/perfil/editar');
        $this->data['permissaoExcluirPerfil'] = $this->viewPerfilAcaoModel->verificaPermissao('social/perfil/excluir');

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;
        
        //Recuperação de Dados
        $this->data['perfis'] = $this->perfilModel->recupera(Array('excluido' => 0), Array('perfil' => 'asc'));

        //Redirecionamento
        $this->load->view('perfil/index', $this->data);
    }

    public function criar()
    {

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('perfil/criar', $this->data);
    }

    public function editar()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;
        
        //Recuperação de Dados
        $idPerfil = $this->uri->segment(4);
        $this->data['perfil'] = $this->perfilModel->recupera(Array('id' => $idPerfil));

        //Redirecionamento
        $this->load->view('perfil/editar', $this->data);
    }

    public function inserir()
    {
        $this->form_validation->set_rules('perfil', 'Perfil', 'required');
        if ($this->form_validation->run())
        {
            $perfil = $this->_request;
            $perfil['excluido'] = 0;
            if ($this->perfilModel->inserir($perfil))
            {
                $this->session->set_flashdata(
                        'sucesso', 'O Perfil ' . $perfil['perfil'] . ' foi inserido'
                        . ' com sucesso.');
                redirect('social/perfil/index');
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Ocorreu um erro e o perfil '
                        . $perfil['perfil'] . ' não foi insrido com sucesso.');
                redirect('social/perfil/criar');
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/perfil/criar');
        }
    }

    public function alterar()
    {
        $perfil = $this->_request;
        $this->form_validation->set_rules('perfil', 'Perfil', 'required');
        if ($this->form_validation->run())
        {
            if ($perfil['perfil'] != $perfil['perfilAntigo'])
            {
                if ($this->perfilModel->alterar((object) $perfil))
                {
                    $this->session->set_flashdata(
                            'sucesso', 'O perfil ' . $perfil['perfil'] . ' foi alterado'
                            . ' com sucesso.');
                    redirect('social/perfil/index');
                }
                else
                {
                    $this->session->set_flashdata(
                            'erro', 'Ops... Ocorreu um erro e o perfil ' . $perfil['perfil']
                            . ' não foi alterado com sucesso! Tente novamente.');
                    redirect('social/perfil/editar/' . $perfil['id']);
                }
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Você deve alterar o perfil para mudar esta'
                        . ' informação.');
                redirect('social/perfil/editar/' . $perfil['id']);
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/perfil/editar/' . $perfil['id']);
        }
    }

    public function excluir()
    {
        $dados = $this->_request;
        $perfil = new stdClass();
        $perfil->id = $dados['idPerfil'];
        $perfil->excluido = 1;
        if ($this->perfilModel->alterar($perfil))
        {
            $this->session->set_flashdata(
                    'sucesso', 'O Perfil ' . $dados['perfil'] . ' foi excluido'
                    . ' com sucesso.');
            redirect('social/perfil/index');
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Ocorreu um erro e o Perfil '
                    . $dados['perfil'] . ' não foi excluido com sucesso!'
                    . ' Tente novamente.');
            redirect('social/perfil/index');
        }
    }

}
