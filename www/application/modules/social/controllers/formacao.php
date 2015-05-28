<?php

class formacao extends SocialController
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
        $this->load->model('formacaoModel');
    }

    public function index()
    {
        //Recuperação de Dados
        $this->data['formacoes'] = $this->formacaoModel->recuperaPorParametro(NULL, Array('excluido' => 0));

        //Permissões
        $this->data['permissaoCriar'] = $this->viewPerfilAcaoModel->verificaPermissao('social/formacao/criar');
        $this->data['permissaoEditarFormacao'] = $this->viewPerfilAcaoModel->verificaPermissao('social/formacao/editar');
        $this->data['permissaoExcluirFormacao'] = $this->viewPerfilAcaoModel->verificaPermissao('social/formacao/excluir');

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('formacao/index', $this->data);
    }

    public function criar()
    {

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('formacao/criar', $this->data);
    }

    public function editar()
    {
        //Recuperação de Dados
        $idFormacao = $this->uri->segment(4);
        $this->data['formacao'] = $this->formacaoModel->recuperaPorParametro($idFormacao);

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('formacao/editar', $this->data);
    }

    public function inserir()
    {
        $formacao = $this->_request;
        $formacao['excluido'] = 0;
        $this->form_validation->set_rules('formacao', 'Formação', 'required');
        if ($this->form_validation->run())
        {
            if ($this->formacaoModel->inserir($formacao))
            {
                $this->session->set_flashdata(
                        'sucesso', 'A formacação acadêmica ' . $formacao['formacao']
                        . ' foi inserida com sucesso.');
                redirect('social/formacao/index');
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Ocorreu um erro e a formação acadêmica '
                        . $formacao['formacao'] . ' não foi insrida com sucesso.');
                redirect('social/formacao/criar');
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/formacao/criar');
        }
    }

    public function alterar()
    {
        $formacao = $this->_request;
        $this->form_validation->set_rules('formacao', 'Formação', 'required');
        if ($this->form_validation->run())
        {
            if ($formacao['formacao'] != $formacao['formacaoAntiga'])
            {
                if ($this->formacaoModel->alterar((object) $formacao))
                {
                    $this->session->set_flashdata(
                            'sucesso', 'A formação acadêmica ' . $formacao['formacao']
                            . ' foi alterado com sucesso.');
                    redirect('social/formacao/index');
                }
                else
                {
                    $this->session->set_flashdata(
                            'erro', 'Ops... Ocorreu um erro e a formacao acadêmica '
                            . $formacao['formacao'] . ' não foi alterado com'
                            . ' sucesso! Tente novamente.');
                    redirect('social/formacao/editar/' . $formacao['id']);
                }
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Você deve alterar a formação acadêmica para'
                        . ' mudar esta informação.');
                redirect('social/formacao/editar/' . $formacao['id']);
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/formacao/editar/' . $formacao['id']);
        }
    }

    public function excluir()
    {
        $formacao = $this->_request;
        $objetoFormacao = new stdClass();
        $objetoFormacao->id = $formacao['idFormacao'];
        $objetoFormacao->excluido = 1;
        if ($this->formacaoModel->alterar($objetoFormacao))
        {
            $this->session->set_flashdata(
                    'sucesso', 'A formação acadêmica ' . $formacao['formacao']
                    . ' foi excluida com sucesso.');
            redirect('social/formacao/index');
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Ocorreu um erro e a formação acadêmica '
                    . $formacao['formacao'] . ' não foi excluido com sucesso!'
                    . ' Tente novamente.');
            redirect('social/formacao/index');
        }
    }

}
