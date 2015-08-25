<?php

class instituicaoEnsino extends SocialController
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
        $this->load->model('grupoModel');
        $this->load->model('viewPerfilAcaoModel');
    }

    public function index()
    {
        //Permissões
        $this->data['permissaoCriar'] = $this->viewPerfilAcaoModel->verificaPermissao('social/instituicaoEnsino/criar');
        $this->data['permissaoEditar'] = $this->viewPerfilAcaoModel->verificaPermissao('social/instituicaoEnsino/editar');
        $this->data['permissaoExcluir'] = $this->viewPerfilAcaoModel->verificaPermissao('social/instituicaoEnsino/excluir');

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;
        
        //Recuperação de Dados
        $this->data['instituicoes'] = $this->grupoModel->recupera(Array('id_tipo' => 1, 'excluido' => 0), Array('nome' => 'asc'));

        //Redirecionamento
        $this->load->view('instituicaoEnsino/index', $this->data);
    }

    public function criar()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('instituicaoEnsino/criar', $this->data);
    }

    public function editar()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;
        
        //Recuperação de Dados
        $idInstituicao = $this->uri->segment(4);
        $this->data['instituicao'] = $this->grupoModel->recupera(Array('id' => $idInstituicao));

        //Redirecionamento
        $this->load->view('instituicaoEnsino/editar', $this->data);
    }

    public function inserir()
    {
        $instituicao = $this->_request;
        $this->form_validation->set_rules('nome', 'Nome da Instituição de Ensino', 'required|is_unique[sitelinc_gru_grupo.nome]');
        $this->form_validation->set_rules('sigla', 'Sigla da Instituição de Ensino', 'required|is_unique[sitelinc_gru_grupo.sigla]');
        $this->form_validation->set_rules('email', 'E-mail', 'valid_email|is_unique[sitelinc_gru_grupo.email]');
        if ($this->form_validation->run())
        {
            $config['upload_path'] = './assets/img/grupo';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '20000';
            $config['max_height'] = '20000';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo'))
            {
                $data = $this->upload->data();
                $instituicao['logo'] = 'assets/img/grupo/' . $data['file_name'];
            }
            else
            {
                $instituicao['logo'] = 'assets/img/grupo/sem_imagem.jpg';
            }
            $instituicao['nome'] = ucwords(strtolower($instituicao['nome']));
            $instituicao['sigla'] = strtoupper($instituicao['sigla']);
            if ($this->grupoModel->inserir($instituicao))
            {
                $this->session->set_flashdata(
                        'sucesso', 'A Instituicao de Ensino '
                        . $instituicao['nome'] . ' foi inserida com sucesso!');
                redirect('social/instituicaoEnsino/index');
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Ocorreu um erro e a instituição de Ensino'
                        . $instituicao['nome'] . 'não foi inserida com sucesso!');
                redirect('social/instituicaoEnsino/criar');
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/instituicaoEnsino/criar');
        }
    }

    public function alterar()
    {
        $instituicao = $this->_request;
        $antigaInstituicao = $this->grupoModel->recupera(Array('id' => $instituicao['id']));
        $this->form_validation->set_rules('nome', 'Nome da Instituição de Ensino', 'required');
        $this->form_validation->set_rules('sigla', 'Sigla da Instituição de Ensino', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'valid_email');
        if ($this->form_validation->run())
        {
            if (!empty($_FILES['logo']['name']))
            {
                $config['upload_path'] = './assets/img/grupo';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';
                $config['max_width'] = '20000';
                $config['max_height'] = '20000';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('logo'))
                {
                    $data = $this->upload->data();
                    $instituicao['logo'] = 'assets/img/grupo/' . $data['file_name'];
                    if ($antigaInstituicao[0]->logo != 'assets/img/grupo/sem_imagem.jpg')
                    {
                        $foto = explode('/', $antigaInstituicao[0]->foto);
                        unlink($foto[1] . '/' . $foto[2] . '/' . $foto[3] . '/' . $foto[4]);
                    }
                }
            }
            $instituicao['nome'] = ucwords(strtolower($instituicao['nome']));
            $instituicao['sigla'] = strtoupper($instituicao['sigla']);
            if ($this->grupoModel->alterar($instituicao))
            {
                $this->session->set_flashdata(
                        'sucesso', 'A Instituicao de Ensino '
                        . $instituicao['nome'] . ' foi alterada com sucesso!');
                redirect('social/instituicaoEnsino/index');
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Ocorreu um erro e a instituição de Ensino'
                        . $instituicao['nome'] . 'não foi inserida com sucesso!');
                redirect('social/instituicaoEnsino/editar/' . $instituicao['id']);
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/instituicaoEnsino/editar/' . $instituicao['id']);
        }
    }

    public function excluir()
    {
        $instituicao = $this->_request;
        $novaInstituicao = $this->grupoModel->recupera(Array('id' => $instituicao['idInstituicao']));
        $novaInstituicao[0]->excluido = 1;
        if ($this->grupoModel->alterar($novaInstituicao[0]))
        {
            $this->session->set_flashdata(
                    'sucesso', 'A Instituição de ensino ' . $novaInstituicao[0]->nome
                    . ' foi excluida com sucesso com sucesso!');
            redirect('social/instituicaoEnsino/index');
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Ocorreu um problema e a instituição de ensino '
                    . $novaInstituicao[0]->nome . ' não foi excluida com sucesso'
                    . ' com sucesso! Tente novamente.');
            redirect('social/instituicaoEnsino/index');
        }
    }

    public function excluirfoto()
    {
        $idInstituicao = $this->_request;
        $instituicao = $this->grupoModel->recupera(Array('id' => $idInstituicao['idInstituicao']));
        $logoInstituicao = explode('/', $instituicao[0]->logo);
        $instituicao[0]->logo = 'assets/img/grupo/sem_imagem.jpg';
        if ($this->grupoModel->alterar($instituicao[0]))
        {
            if (unlink($logoInstituicao[1] . '/' . $logoInstituicao[2] . '/' . $logoInstituicao[3] . '/' . $logoInstituicao[4]))
            {
                $resultado = Array('excluido' => 1);
            }
            else
            {
                $resultado = Array('excluido' => 0);
            }
        }
        else
        {
            $resultado = Array('excluido' => 0);
        }
        return print json_encode($resultado);
    }

}
