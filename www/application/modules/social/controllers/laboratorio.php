<?php

class laboratorio extends SocialController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('grupoModel');
        $this->load->model('perfilModel');
        $this->load->model('anexoModel');
        $this->load->model('usuarioModel');
        $this->load->model('postModel');
        $this->load->model('viewProjetoModel');
        $this->load->model('viewUsuarioGrupoVinculoModel');
        $this->load->model('pesquisaLinhaModel');
        $this->load->model('viewPesquisaLinhaGrupoVinculoModel');
        $this->load->model('pesquisaLinhaGrupoVinculoModel');
    }

    public function index()
    {
        //Recuperação de Dados
        $this->data['laboratorios'] = $this->grupoModel->recuperaLaboratoriosComQuantProj();

        //Permissões
        $this->data['criarLaboratorio'] = $this->viewPerfilAcaoModel->verificaPermissao('social/laboratorio/criar');

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('social/laboratorio/index', $this->data);
    }

    public function criar()
    {
        //Recuperação de Dados
        $this->data['linhasPesquisa'] = $this->pesquisaLinhaModel->recuperaTodos();

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('social/laboratorio/criar', $this->data);
    }

    public function descricao()
    {
        //Recuperação de Dados
        $idLab = $this->uri->segment(4);
        $this->data['laboratorio'] = $this->grupoModel->recuperaPorParametro($idLab);
        $this->data['usuariosLab'] = $this->viewUsuarioGrupoVinculoModel->recuperaPorParametro(NULL, Array('id_tipo_grupo' => 3, 'id_grupo' => $idLab));
        $this->data['usuarios'] = $this->usuarioModel->recuperaUsuariosQueNaoPertecemAoLab($idLab);
        $this->data['perfis'] = $this->perfilModel->recuperaPorParametro(NULL, Array('excluido' => 0));
        $this->data['anexos'] = $this->anexoModel->recuperaPorParametro(NULL, Array('id_grupo' => $idLab));
        $this->data['idLab'] = $idLab;
        $this->data['linhasPesquisaLaboratorio'] = $this->viewPesquisaLinhaGrupoVinculoModel->recuperaPorParametro(NULL, Array('id_grupo' => $idLab));
        $this->data['linhasPesquisa'] = $this->pesquisaLinhaModel->recuperaLinhasPesquisaQueNaoPertecemAoGrupo($idLab);


        //Permissões
        $this->data['permissaoEditar'] = $this->viewPerfilAcaoModel->verificaPermissao('social/laboratorio/editar');
        $this->data['permissaoExcluir'] = $this->viewPerfilAcaoModel->verificaPermissao('social/laboratorio/excluir');
        $this->data['permissaoAdicionarAnexo'] = $this->viewPerfilAcaoModel->verificaPermissao('social/laboratorio/adicionaranexo');
        $this->data['permissaoVisualizarAnexo'] = $this->viewPerfilAcaoModel->verificaPermissao('social/laboratorio/visualizaranexo');
        $this->data['permissaoExcluirAnexo'] = $this->viewPerfilAcaoModel->verificaPermissao('social/laboratorio/excluiranexo');
        $this->data['permissaoVincularUsuario'] = $this->viewPerfilAcaoModel->verificaPermissao('social/laboratorio/vincularUsuario');
        $this->data['permissaoDesvincularUsuario'] = $this->viewPerfilAcaoModel->verificaPermissao('social/laboratorio/desvincularUsuario');
        $this->data['permissaoDesvincularLinhaPesquisa'] = $this->viewPerfilAcaoModel->verificaPermissao('social/laboratorio/desvincularLinhaPesquisaLaboratorio');
        $this->data['permissaoVincularLinhaPesquisa'] = $this->viewPerfilAcaoModel->verificaPermissao('social/laboratorio/vincularLinhaPesquisaLaboratorio');

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('social/laboratorio/descricao', $this->data);
    }

    public function editar()
    {
        //Recuperação de Dados
        $idLab = $this->uri->segment(4);
        $this->data['laboratorio'] = $this->grupoModel->recuperaPorParametro($idLab);

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('social/laboratorio/editar', $this->data);
    }

    public function inserir()
    {
        $cadastro = $this->_request;
        $this->form_validation->set_rules('nome', 'Nome do Laboratório', 'required|is_unique[sitelinc_gru_grupo.nome]');
        $this->form_validation->set_rules('sigla', 'Sigla do Laboratório', 'required|is_unique[sitelinc_gru_grupo.sigla]');
        $this->form_validation->set_message('is_unique', 'Este Laborátório já existe, se você não tiver encontrando, verifique com o administrador do sistema se ele não encontra-se excluido!');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');
        $this->form_validation->set_rules('id_linha', 'Linha de Pesquisa', 'required|is_natural_no_zero');
        $this->form_validation->set_message('is_natural_no_zero', 'Você precisa selecionar uma linha de pesquisa para o laboratório');
        $this->form_validation->set_rules('resumo', 'Descrição do Laboratório', 'required');
        if ($this->form_validation->run())
        {
            $config['upload_path'] = '/assets/img/grupo';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '20000';
            $config['max_height'] = '20000';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo'))
            {
                $data = $this->upload->data();
                $cadastro['logo'] = '/assets/img/grupo/' . $data['file_name'];
            }
            else
            {
                $cadastro['logo'] = '/assets/img/grupo/laboratorio.png';
            }
            $idLaboratorio = $this->grupoModel->inserir($cadastro);
            if ($idLaboratorio)
            {
                $linhaDePesquisa = Array(
                    'id_linha' => $cadastro['id_linha'],
                    'id_grupo' => $idLaboratorio
                );
                if ($this->pesquisaLinhaGrupoVinculoModel->inserir($linhaDePesquisa))
                {
                    $this->session->set_flashdata(
                            'sucesso', 'O laboratório ' . $cadastro['nome'] . ' foi'
                            . ' inserido com sucesso!');
                    redirect('social/laboratorio/index');
                }
                else
                {
                    $this->session->set_flashdata(
                            'noticia', 'O laboratório ' . $cadastro['nome'] . ' foi'
                            . ' inserido com sucesso, porém ao vincular a'
                            . ' linha de pesquisa o correu um erro, vá na'
                            . ' descrição do projeto e vincule-a manualmente.'
                            . ' <a href="/social/laboratorio/descricao/'
                            . $idLaboratorio . '">Clique aqui para ir para a'
                            . ' descrição do laboratório.</a>');
                    redirect('social/laboratorio/index');
                }
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Ocorreu um problema e o laboratório '
                        . $cadastro['nome'] . ' não foi inserido com sucesso!'
                        . ' Tente novamente.');
                redirect('social/laboratorio/criar');
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/laboratorio/criar');
        }
    }

    public function alterar()
    {
        $novoLaboratorio = (object) $this->_request;
        $this->form_validation->set_rules('nome', 'Nome do Laboratório', 'required');
        $this->form_validation->set_rules('sigla', 'Sigla do Laboratório', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');
        $this->form_validation->set_rules('resumo', 'Descrição do Laboratório', 'required');
        if ($this->form_validation->run())
        {
            $laboratorio = $this->grupoModel->recuperaPorParametro($novoLaboratorio->id);
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
                    $logo = explode('/', $laboratorio[0]->logo);
                    if (unlink($logo[1] . '/' . $logo[2] . '/' . $logo[3] . '/' . $logo[4]))
                    {
                        $data = $this->upload->data();
                        $novoLaboratorio->logo = '/assets/img/grupo/' . $data['file_name'];
                    }
                    else
                    {
                        $novoLaboratorio->logo = $laboratorio[0]->logo;
                    }
                }
            }
            if ($this->grupoModel->alterar($novoLaboratorio))
            {
                $this->session->set_flashdata(
                        'sucesso', 'O laboratório ' . $novoLaboratorio->nome . ' foi'
                        . ' alterado com sucesso!');
                redirect('social/laboratorio/descricao/' . $novoLaboratorio->id);
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Ocorreu um problema e o laboratório '
                        . $novoLaboratorio->nome . ' não foi alterado com sucesso!'
                        . ' Tente novamente.');
                redirect('social/laboratorio/descricao/' . $novoLaboratorio->id);
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/laboratorio/descricao' . $novoLaboratorio->id);
        }
    }

    public function excluir()
    {
        $idLab = $this->uri->segment(4);
        $laboratorio = $this->grupoModel->recuperaPorParametro($idLab);
        $laboratorio[0]->excluido = 1;
        if ($this->grupoModel->alterar($laboratorio[0]))
        {
            $this->session->set_flashdata(
                    'sucesso', 'O laboratório ' . $laboratorio[0]->nome
                    . ' foi excluido com sucesso com sucesso!');
            redirect('social/laboratorio/index');
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Ocorreu um problema e o laboratório '
                    . $laboratorio[0]->nome . ' não foi excluido com sucesso'
                    . ' com sucesso! Tente novamente.');
            redirect('social/laboratorio/descricao/' . $laboratorio[0]->id);
        }
    }

    public function vincularLinhaPesquisaLaboratorio()
    {
        $vinculo = $this->_request;
        if ($vinculo['id_linha'] != 0)
        {
            if ($this->pesquisaLinhaGrupoVinculoModel->inserir($vinculo))
            {
                $this->session->set_flashdata(
                        'sucesso', 'A linha de pesquisa foi vinculada com sucesso!');
                redirect('social/laboratorio/descricao/' . $vinculo['id_grupo']);
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Ocorreu um problema a linha de pesquisa não'
                        . ' foi vinculada com sucesso! Tente novamente.');
                redirect('social/laboratorio/descricao/' . $vinculo['id_grupo']);
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Você precisa selecionar uma linha de pesquisa.');
            redirect('social/laboratorio/descricao/' . $vinculo['id_grupo']);
        }
    }

    public function desvincularLinhaPesquisaLaboratorio()
    {
        $linhapesquisa = $this->_request;
        if ($this->pesquisaLinhaGrupoVinculoModel->deletar($linhapesquisa['idVinculoLinha']))
        {
            $this->session->set_flashdata(
                    'sucesso', 'A linha de pesquisa ' . $linhapesquisa['linha']
                    . ' foi desvinculada com sucesso!');
            redirect('social/laboratorio/descricao/' . $linhapesquisa['idGrupo']);
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Ocorreu um problema a linha de pesquisa'
                    . $linhapesquisa['linha'] . ' não foi desvinculada com'
                    . ' sucesso! Tente novamente.');
            redirect('social/laboratorio/descricao/' . $linhapesquisa['idGrupo']);
        }
    }

    public function excluirfoto()
    {
        $idLab = $this->_request;
        $laboratorio = $this->grupoModel->recuperaPorParametro($idLab['idLab']);
        $logoLab = explode('/', $laboratorio[0]->logo);
        $laboratorio[0]->logo = '/assets/img/grupo/laboratorio.png';
        if ($this->grupoModel->alterar($laboratorio[0]))
        {
            if (unlink($logoLab[1] . '/' . $logoLab[2] . '/' . $logoLab[3] . '/' . $logoLab[4]))
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

    public function verificaVinculadosDoLaboratorio()
    {
        $idLab = $this->_request;
        $lab = $this->grupoModel->recuperaPorParametro($idLab['idLab']);
        $projetos = $this->viewProjetoModel->recuperaPorParametro(NULL, Array('id_laboratorio' => $idLab['idLab']));
        $usuarios = $this->viewUsuarioGrupoVinculoModel->recuperaPorParametro(NULL, Array('id_grupo' => $idLab['idLab']));
        $anexos = $this->anexoModel->recuperaPorParametro(NULL, Array('id_grupo' => $idLab['idLab']));
        $posts = $this->postModel->recuperaPorParametro(NULL, Array('id_grupo' => $idLab['idLab']));
        if ($projetos || $usuarios || $anexos || $posts)
        {
            $msg = 'O Laboratório ' . $lab[0]->nome . ' possui';
            if (count($projetos) > 0)
            {
                $msg .= ' Projeto(s)';
            }
            if (count($usuarios) > 0)
            {
                if (count($anexos) == 0 && count($posts) == 0)
                {
                    $msg .= ' e Usuário(s)';
                }
                else
                {
                    $msg .= ', Usuário(s)';
                }
            }
            if (count($anexos) > 0)
            {
                if (count($posts) == 0)
                {
                    $msg .= ' e Anexo(s)';
                }
                else
                {
                    $msg .= ', Anexo(s)';
                }
            }
            if (count($posts) > 0)
            {
                $msg .= ' e Post(s)';
            }
            $msg .= ' Vinculado(s), você tem certeza que deseja exclui-lo, se'
                    . ' ainda assim desejar, estes ficarão invisíveis. Você tem'
                    . ' certeza que deseja exclui-lo?';
        }
        else
        {
            $msg = 'O Laboratório ' . $lab[0]->nome . ' não possui nenhum Projeto,'
                    . ' Usuário, Anexo ou Post, vinculado você tem certeza que'
                    . ' deseja exclui-lo?';
        }
        $mensagem = Array(
            'msg' => $msg
        );
        return print json_encode($mensagem);
    }

}
