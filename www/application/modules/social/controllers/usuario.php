<?php

class usuario extends SocialController
{

    /**
     * Carrega todos os métodos contidos na classe pai, bem como as Models (usuarioModel), necessárias.
     * @param NULL
     * @author Paulo Viegas <pauloviegas93@gmail.com>
     * @return NULL
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuarioModel');
        $this->load->model('usuarioVinculoModel');
        $this->load->model('viewUsuarioModel');
        $this->load->model('formacaoModel');
        $this->load->model('grupoModel');
        $this->load->model('viewPesquisaLinhaUsuarioVinculoModel');
        $this->load->model('pesquisaLinhaUsuarioVinculoModel');
        $this->load->model('pesquisaLinhaModel');
        $this->load->model('authModel');
    }

    public function index()
    {
        //Recuperação de Dados
        $this->data['usuariosAtivos'] = $this->viewUsuarioModel->recuperaPorParametro(NULL, Array('excluido' => 0, 'aprovado' => 1), 'nome', 'asc');
        $this->data['usuariosInativos'] = $this->viewUsuarioModel->recuperaPorParametro(NULL, Array('excluido' => 1, 'aprovado' => 1), 'nome', 'asc');

        //Permissões
        $this->data['permissaoEditarUsuario'] = $this->viewPerfilAcaoModel->verificaPermissao('social/usuario/editar');
        $this->data['permissaoCriarUsuario'] = $this->viewPerfilAcaoModel->verificaPermissao('social/usuario/criar');
        $this->data['permissaoUsuariosInativos'] = $this->viewPerfilAcaoModel->verificaPermissao('social/usuario/visualizarUsuariosExcluido');

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('social/usuario/index', $this->data);
    }

    public function editar()
    {
        //Recuperação de Dados
        $idUsuario = $this->uri->segment(4);
        $this->data['usuario'] = $this->usuarioModel->recuperaPorParametro($idUsuario);
        $this->data['formacoes'] = $this->formacaoModel->recuperaTodos();
        $this->data['instituicoes'] = $this->grupoModel->recuperaPorParametro(NULL, Array('id_tipo' => 1));
        $this->data['linhasPesquisaUsuario'] = $this->viewPesquisaLinhaUsuarioVinculoModel->recuperaPorParametro(NULL, Array('id_usuario' => $idUsuario));
        $this->data['linhasPesquisa'] = $this->pesquisaLinhaModel->recuperaLinhasPesquisaQueNaoPertecemAoUsuario($idUsuario);

        //Permissões
        $this->data['permissaoAlterarSenhautrosUsuarios'] = $this->viewPerfilAcaoModel->verificaPermissao('social/usuario/alterarSenhaOutrosUsuarios');
        $this->data['permissaoVincularLinhaPesquisa'] = $this->viewPerfilAcaoModel->verificaPermissao('social/usuario/vincularLinhaPesquisaUsuario');
        $this->data['permissaoDesvincularLinhaPesquisa'] = $this->viewPerfilAcaoModel->verificaPermissao('social/usuario/desvincularLinhaPesquisaUsuario');
        $this->data['permissaoInativar'] = $this->viewPerfilAcaoModel->verificaPermissao('social/usuario/desvincularLinhaPesquisaUsuario');

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('social/usuario/editar', $this->data);
    }

    public function perfil()
    {
        //Recuperação de Dados
        $idUsuario = $this->session->userdata('usuario');
        $this->data['usuario'] = $idUsuario;
        $this->data['instituicoes'] = $this->grupoModel->recuperaPorParametro(NULL, Array('id_tipo' => 1));
        $this->data['linhasPesquisaUsuario'] = $this->viewPesquisaLinhaUsuarioVinculoModel->recuperaPorParametro(NULL, Array('id_usuario' => $idUsuario->id));
        $this->data['linhasPesquisa'] = $this->pesquisaLinhaModel->recuperaLinhasPesquisaQueNaoPertecemAoUsuario($idUsuario->id);

        //Permissões
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('social/usuario/perfil', $this->data);
    }

    public function inserir()
    {
        $usuario = $this->_request;
        $this->form_validation->set_rules('nome', 'Nome do Usuário', 'required');
        $this->form_validation->set_rules('id_formacao', 'Formação', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('id_instituicao', 'Instituição', 'required|is_natural_no_zero');
        $this->form_validation->set_message('is_natural_no_zero', 'Você tem que selecionar um Título e uma Instituição.');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[sitelinc_usu_usuario.email]');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[4]|max_length[10]|matches[repetirSenha]');
        $this->form_validation->set_rules('repetirSenha', 'Repetir Nova Senha', 'required|min_length[4]|max_length[10]');
        if ($this->form_validation->run())
        {
            $usuario['senha'] = sha1($usuario['senha']);
            if (!empty($_FILES['foto']['name']))
            {
                $config['upload_path'] = './assets/img/usuarios';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';
                $config['max_width'] = '20000';
                $config['max_height'] = '20000';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto'))
                {
                    $data = $this->upload->data();
                    $usuario['foto'] = '/assets/img/usuarios/' . $data['file_name'];
                }
            }
            else
            {
                $usuario['foto'] = '/assets/img/usuarios/default_user.jpg';
            }
            if ($this->usuarioModel->inserir($usuario))
            {
                if ($this->authModel->logar($usuario['email'], $usuario['repetirSenha']))
                {
                    $this->session->set_flashdata('sucesso', 'Seu usuário'
                            . ' foi inserido e você foi logado com sucesso!!!');
                    redirect('/social/home/index');
                }
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... VOcorreu um erro e o usuário não foi'
                        . 'inserido com sucesso! Tente novamente.');
                redirect('social/serviceauth/index');
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/serviceauth/index');
        }
    }

    public function alterar()
    {
        $novoUsuario = $this->_request;
        $usuarioAntigo = $this->usuarioModel->recuperaPorParametro($novoUsuario['id']);
        $this->form_validation->set_rules('nome', 'Nome do Usuário', 'required');
        $this->form_validation->set_rules('id_formacao', 'Formação', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('id_instituicao', 'Instituição', 'required|is_natural_no_zero');
        $this->form_validation->set_message('is_natural_no_zero', 'Você tem que selecionar um Título e uma Instituição para a pessoa');
        $this->form_validation->set_rules('novaSenha', 'Nova Senha', 'min_length[4]|max_length[10]|matches[repetirNovaSenha]');
        $this->form_validation->set_rules('repetirNovaSenha', 'Repetir Nova Senha', 'min_length[4]|max_length[10]');
        if ($novoUsuario['email'] == $usuarioAntigo[0]->email)
        {
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        }
        else
        {
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[sitelinc_usu_usuario.email]');
        }
        if ($this->form_validation->run())
        {
            $alterado = Array();
            if (!empty($_FILES['foto']['name']))
            {
                $config['upload_path'] = './assets/img/usuarios';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';
                $config['max_width'] = '20000';
                $config['max_height'] = '20000';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto'))
                {
                    if ($usuarioAntigo[0]->foto != '/assets/img/usuarios/default_user.jpg')
                    {
                        $fotoParaexcluir = explode('/', $usuarioAntigo[0]->foto);
                        unlink($fotoParaexcluir[1] . '/' . $fotoParaexcluir[2] . '/' . $fotoParaexcluir[3] . '/' . $fotoParaexcluir[4]);
                    }
                    $data = $this->upload->data();
                    $foto = '/assets/img/usuarios/' . $data['file_name'];
                }
                else
                {
                    $foto = '/assets/img/usuarios/default_user.jpg';
                }
                $alterado['foto'] = $foto;
            }
            ($novoUsuario['nome'] != $usuarioAntigo[0]->nome) ? $alterado['nome'] = $novoUsuario['nome'] : '';
            ($novoUsuario['id_formacao'] != $usuarioAntigo[0]->id_formacao) ? $alterado['id_formacao'] = $novoUsuario['id_formacao'] : '';
            ($novoUsuario['id_instituicao'] != $usuarioAntigo[0]->id_instituicao) ? $alterado['id_instituicao'] = $novoUsuario['id_instituicao'] : '';
            ($novoUsuario['email'] != $usuarioAntigo[0]->email) ? $alterado['email'] = $novoUsuario['email'] : '';
            ($novoUsuario['aprovado'] != $usuarioAntigo[0]->aprovado) ? $alterado['aprovado'] = $novoUsuario['aprovado'] : '';
            ($novoUsuario['lattes'] != $usuarioAntigo[0]->lattes) ? $alterado['lattes'] = $novoUsuario['lattes'] : '';
            if (!empty($novoUsuario['novaSenha']))
            {
                (sha1($novoUsuario['novaSenha']) != $usuarioAntigo[0]->senha) ? $alterado['senha'] = sha1($novoUsuario['novaSenha']) : '';
            }
            if (!(empty($alterado) && empty($_FILES['foto']['name'])))
            {
                $alterado['id'] = $novoUsuario['id'];
                if ($this->usuarioModel->alterar((object) $alterado))
                {
                    $this->session->set_flashdata(
                            'sucesso', 'O usuário' . $novoUsuario['nome'] . ' foi'
                            . ' alterado com sucesso!');
                    redirect('social/usuario/index/');
                }
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Você tem que alterar pelo menos uma'
                        . ' informação para alterar esta informação.');
                redirect('social/usuario/editar/' . $novoUsuario['id']);
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/usuario/editar/' . $novoUsuario['id']);
        }
    }

    public function alterarPerfil()
    {
        $novoUsuario = $this->_request;
        $usuarioAntigo = $this->usuarioModel->recuperaPorParametro($novoUsuario['id']);
        $this->form_validation->set_rules('nome', 'Nome do Usuário', 'required');
        $this->form_validation->set_rules('id_instituicao', 'Instituição', 'required|is_natural_no_zero');
        $this->form_validation->set_message('is_natural_no_zero', 'Você tem que selecionar uma Instituição para você');
        if (!empty($novoUsuario['senhaAntiga']) || !empty($novoUsuario['novaSenha']) || !empty($novoUsuario['repetirNovaSenha']))
        {
            $this->form_validation->set_rules('senhaAntiga', 'Nova Senha', 'required|min_length[4]|max_length[10]');
            $this->form_validation->set_rules('novaSenha', 'Nova Senha', 'required|min_length[4]|max_length[10]|matches[repetirNovaSenha]');
            $this->form_validation->set_rules('repetirNovaSenha', 'Repetir Nova Senha', 'required|min_length[4]|max_length[10]');
        }
        if ($novoUsuario['email'] == $usuarioAntigo[0]->email)
        {
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        }
        else
        {
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[sitelinc_usu_usuario.email]');
        }
        if ($this->form_validation->run())
        {
            $alterado = Array();
            if (!empty($_FILES['foto']['name']))
            {
                $config['upload_path'] = './assets/img/usuarios';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';
                $config['max_width'] = '20000';
                $config['max_height'] = '20000';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto'))
                {
                    if ($usuarioAntigo[0]->foto != '/assets/img/usuarios/default_user.jpg')
                    {
                        $fotoParaexcluir = explode('/', $usuarioAntigo[0]->foto);
                        unlink($fotoParaexcluir[1] . '/' . $fotoParaexcluir[2] . '/' . $fotoParaexcluir[3] . '/' . $fotoParaexcluir[4]);
                    }
                    $data = $this->upload->data();
                    $foto = '/assets/img/usuarios/' . $data['file_name'];
                }
                else
                {
                    $foto = '/assets/img/usuarios/default_user.jpg';
                }
                $alterado['foto'] = $foto;
            }
            ($novoUsuario['nome'] != $usuarioAntigo[0]->nome) ? $alterado['nome'] = $novoUsuario['nome'] : '';
            ($novoUsuario['id_instituicao'] != $usuarioAntigo[0]->id_instituicao) ? $alterado['id_instituicao'] = $novoUsuario['id_instituicao'] : '';
            ($novoUsuario['email'] != $usuarioAntigo[0]->email) ? $alterado['email'] = $novoUsuario['email'] : '';
            ($novoUsuario['lattes'] != $usuarioAntigo[0]->lattes) ? $alterado['lattes'] = $novoUsuario['lattes'] : '';
            if (!empty($novoUsuario['senhaAntiga']) || !empty($novoUsuario['novaSenha']) || !empty($novoUsuario['repetirNovaSenha']))
            {
                if (sha1($novoUsuario['senhaAntiga']) == $usuarioAntigo[0]->senha)
                {
                    (sha1($novoUsuario['novaSenha']) != $usuarioAntigo[0]->senha) ? $alterado['senha'] = sha1($novoUsuario['novaSenha']) : '';
                }
                else
                {
                    $this->session->set_flashdata(
                            'erro', 'Ops... O campo senha antiga não confere,'
                            . ' por favor, entre com a senha correta');
                    redirect('social/usuario/perfil');
                }
            }
            if (!(empty($alterado) && empty($_FILES['foto']['name'])))
            {
                $alterado['id'] = $novoUsuario['id'];
                if ($this->usuarioModel->alterar((object) $alterado))
                {
                    $usuario = $this->usuarioModel->recuperaPorParametro($novoUsuario['id']);
                    $this->session->set_userdata('usuario', $usuario[0]);
                    $this->session->set_flashdata(
                            'sucesso', 'O usuário' . $novoUsuario['nome'] . ' foi'
                            . ' alterado com sucesso!');
                    redirect('social/usuario/perfil');
                }
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Você tem que alterar pelo menos uma'
                        . ' informação para alterar esta informação.');
                redirect('social/usuario/perfil');
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/usuario/perfil');
        }
    }

    public function vincularLinhaPesquisaUsuario()
    {
        $vinculo = $this->_request;
        $action = ($this->uri->segment(4) == 1) ? 'perfil' : 'editar' . '/' . $vinculo['id_usuario'];
        if ($vinculo['id_linha'] != 0)
        {
            if ($this->pesquisaLinhaUsuarioVinculoModel->inserir($vinculo))
            {
                $this->session->set_flashdata(
                        'sucesso', 'A linha de pesquisa foi vinculada com sucesso!');
                redirect('social/usuario/' . $action);
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Ocorreu um problema a linha de pesquisa não'
                        . ' foi vinculada com sucesso! Tente novamente.');
                redirect('social/usuario/' . $action);
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Você precisa selecionar uma linha de pesquisa.');
            redirect('social/usuario/' . $action);
        }
    }

    public function desvincularLinhaPesquisaUsuario()
    {
        $linhapesquisa = $this->_request;
        $action = ($this->uri->segment(4) == 1) ? 'perfil' : 'editar' . '/' . $linhapesquisa['idUsuario'];
        if ($this->pesquisaLinhaUsuarioVinculoModel->deletar($linhapesquisa['idVinculoLinha']))
        {
            $this->session->set_flashdata(
                    'sucesso', 'A linha de pesquisa ' . $linhapesquisa['linha']
                    . ' foi desvinculada com sucesso!');
            redirect('social/usuario/' . $action);
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Ocorreu um problema a linha de pesquisa'
                    . $linhapesquisa['linha'] . ' não foi desvinculada com'
                    . ' sucesso! Tente novamente.');
            redirect('social/usuario/' . $action);
        }
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
                redirect('social/' . $usuario['controller'] . '/descricao/' . $usuario['id_instituicao']);
            }
            else
            {
                $this->session->set_flashdata(
                        'noticia', 'Ops... Ocorreu um problema e o usuário não foi'
                        . ' vinculado com sucesso! Tente Novamente!');
                redirect('social/' . $usuario['controller'] . '/descricao/' . $usuario['id_instituicao']);
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/' . $usuario['controller'] . '/descricao/' . $usuario['id_instituicao']);
        }
    }

    public function desvincularUsuario()
    {
        $idVinculo = $this->uri->segment(4);
        $controller = $this->_request;
        $usuarioVinculado = $this->usuarioVinculoModel->recuperaPorParametro($idVinculo);
        if ($this->usuarioVinculoModel->deletar($idVinculo))
        {
            $this->session->set_flashdata(
                    'sucesso', 'O usuário foi desvinculado com sucesso!');
            redirect('social/' . $controller['controller'] . '/descricao/' . $usuarioVinculado[0]->id_instituicao);
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Ocorreu um erro e o usuário não foi'
                    . ' desvinculado com sucesso! Tente novamente.');
            redirect('social/' . $controller['controller'] . '/descricao/' . $usuarioVinculado[0]->id_instituicao);
        }
    }

    public function excluirfoto()
    {
        $idUsuario = $this->_request;
        $usuario = $this->usuarioModel->recuperaPorParametro($idUsuario['idUsuario']);
        $fotoUsuario = explode('/', $usuario[0]->foto);
        $usuario[0]->foto = '/assets/img/usuarios/default_user.jpg';
        if ($this->usuarioModel->alterar($usuario[0]))
        {
            if (unlink($fotoUsuario[1] . '/' . $fotoUsuario[2] . '/' . $fotoUsuario[3] . '/' . $fotoUsuario[4]))
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

    public function ativar()
    {
        $idUsuario = $this->uri->segment(4);
        $alteracao = new stdClass();
        $alteracao->id = $idUsuario;
        $alteracao->excluido = 0;
        if ($this->usuarioModel->alterar($alteracao))
        {
            $this->session->set_flashdata(
                    'sucesso', 'O usuário foi ativado com sucesso!');
            redirect('social/usuario/index');
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Aconteceu um problema e o usuário não foi'
                    . ' ativado com sucesso! Tente Novamente.');
            redirect('social/usuario/index');
        }
    }

    public function inativar()
    {
        $idUsuario = $this->uri->segment(4);
        $alteracao = new stdClass();
        $alteracao->id = $idUsuario;
        $alteracao->excluido = 1;
        if ($this->usuarioModel->alterar($alteracao))
        {
            $this->session->set_flashdata(
                    'sucesso', 'O usuário foi destivado com sucesso!');
            redirect('social/usuario/index');
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Aconteceu um problema e o usuário não foi'
                    . ' destivado com sucesso! Tente Novamente.');
            redirect('social/usuario/index');
        }
    }

    public function verificaVinculoCoordOuResp()
    {
        $dados = $this->_request;
        $usuario = $this->usuarioVinculoModel->recuperaPorParametro($dados['idVinculo']);
        switch ($usuario[0]->id_perfil)
        {
            case 8:
                $resposta['desvincular'] = 0;
                $resposta['msg'] = 'Você não pode desvincular este usuário,'
                        . ' pois ele é o Coordenador do Projeto, para isso'
                        . ' vá em editar, e altere, primeiramente o Coordenador'
                        . ' do projeto.';
                break;

            case 9:
                $resposta['desvincular'] = 0;
                $resposta['msg'] = 'Você não pode desvincular este usuário,'
                        . ' pois ele é o Responsável do Projeto, para isso'
                        . ' vá em editar, e altere, primeiramente o Responsável'
                        . ' do projeto.';
                break;

            default:
                $resposta['desvincular'] = 1;
                break;
        }
        return print json_encode($resposta);
    }

}
