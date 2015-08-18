<?php

class projeto extends SocialController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('anexoModel');
        $this->load->model('postModel');
        $this->load->model('grupoModel');
        $this->load->model('usuarioModel');
        $this->load->model('projetoModel');
        $this->load->model('tarefaModel');
        $this->load->model('perfilModel');
        $this->load->model('usuarioVinculoModel');
        $this->load->model('grupoVinculoModel');
        $this->load->model('viewProjetoModel');
        $this->load->model('viewUsuarioGrupoVinculoModel');
        $this->load->model('pesquisaLinhaModel');
        $this->load->model('viewPesquisaLinhaGrupoVinculoModel');
        $this->load->model('pesquisaLinhaGrupoVinculoModel');
    }

    public function index()
    {
        //Permissões
        $this->data['criarProjeto'] = $this->viewPerfilAcaoModel->verificaPermissao('social/projeto/criar');

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;
        
        //Recuperação de Dados
        $idLab = $this->uri->segment(4);
        $this->data['laboratorio'] = $this->grupoModel->recupera(Array('id' => $idLab));
        $this->data['projetos'] = $this->viewProjetoModel->recuperaProjetosPorLaboratorio($idLab);

        //Redirecionamento
        $this->load->view('social/projeto/index', $this->data);
    }

    public function criar()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Recuperação de Dados
        $idLab = $this->uri->segment(4);
        $this->data['laboratorio'] = $this->grupoModel->recupera(Array('id' => $idLab));
        $this->data['projetos'] = $this->viewProjetoModel->recuperaProjetosPorLaboratorio($idLab);
        $this->data['usuarios'] = $this->usuarioModel->recupera(Array('excluido' => 0), Array('nome' => 'asc'));
        $this->data['financiadoras'] = $this->grupoModel->recupera(Array('id_tipo' => 4, 'excluido' => 0), Array('nome' => 'asc'));
        $this->data['idLab'] = $idLab;
        $this->data['linhasPesquisa'] = $this->pesquisaLinhaModel->recupera(NULL, Array('linha' => 'asc'));

        //Redirecionamento
        $this->load->view('social/projeto/criar', $this->data);
    }

    public function descricao()
    {
        //Permissões
        $this->data['permissaoEditar'] = $this->viewPerfilAcaoModel->verificaPermissao('social/projeto/editar');
        $this->data['permissaoExcluir'] = $this->viewPerfilAcaoModel->verificaPermissao('social/projeto/excluir');
        $this->data['permissaoVisualizarAnexo'] = $this->viewPerfilAcaoModel->verificaPermissao('social/projeto/visualizaranexo');
        $this->data['permissaoAdicionarAnexo'] = $this->viewPerfilAcaoModel->verificaPermissao('social/projeto/adicionaranexo');
        $this->data['permissaoExcluirAnexo'] = $this->viewPerfilAcaoModel->verificaPermissao('social/projeto/excluiranexo');
        $this->data['permissaoVincularUsuario'] = $this->viewPerfilAcaoModel->verificaPermissao('social/projeto/vincularusuario');
        $this->data['permissaoDesvincularUsuario'] = $this->viewPerfilAcaoModel->verificaPermissao('social/projeto/desvincularusuario');
        $this->data['permissaoVincularLinhaPesquisa'] = $this->viewPerfilAcaoModel->verificaPermissao('social/projeto/vincularLinhaPesquisaProjeto');
        $this->data['permissaoDesvincularLinhaPesquisa'] = $this->viewPerfilAcaoModel->verificaPermissao('social/projeto/desvincularLinhaPesquisaProjeto');
        $this->data['permissaoAtivarInativarVinculo'] = $this->viewPerfilAcaoModel->verificaPermissao('social/usuario/ativarInativarVinculo');

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;
        
        //Recuperação de Dados
        $idProj = $this->uri->segment(4);
        $this->data['projeto'] = $this->viewProjetoModel->recupera(Array('id' => $idProj));
        $this->data['anexos'] = $this->anexoModel->recupera(Array('id_grupo' => $idProj));
        $this->data['usuariosProj'] = $this->viewUsuarioGrupoVinculoModel->recupera(Array('id_tipo_grupo' => 2, 'id_grupo' => $idProj), Array('ativo' => 'desc', 'nome_usuario' => 'asc'));
        $this->data['usuarios'] = $this->usuarioModel->recuperaUsuariosQueNaoPertecemAoProj($idProj);
        $this->data['perfis'] = $this->perfilModel->recupera(Array('excluido' => 0), Array('perfil' => 'asc'));
        $this->data['linhasPesquisaProjeto'] = $this->viewPesquisaLinhaGrupoVinculoModel->recupera(Array('id_grupo' => $idProj));
        $this->data['linhasPesquisa'] = $this->pesquisaLinhaModel->recuperaLinhasPesquisaQueNaoPertecemAoGrupo($idProj);
        $this->data['alumni'] = 0;

        //Redirecionamento
        $this->load->view('social/projeto/descricao', $this->data);
    }

    public function editar()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;
        
        //Recuperação de Dados
        $idProj = $this->uri->segment(4);
        $this->data['projeto'] = $this->viewProjetoModel->recupera(Array('id' => $idProj));
        $this->data['usuarios'] = $this->usuarioModel->recupera(NULL, Array('nome' => 'asc'));
        $this->data['financiadoras'] = $this->grupoModel->recupera(Array('id_tipo' => 4, 'excluido' => 0), Array('nome' => 'asc'));

        //Redirecionamento
        $this->load->view('social/projeto/editar', $this->data);
    }

    public function inserir()
    {
        $dados = $this->_request;
        $idLab = $this->uri->segment(4);
        $this->form_validation->set_rules('nome', 'Nome do Projeto', 'required|is_unique[sitelinc_gru_grupo.nome]');
        $this->form_validation->set_rules('sigla', 'Sigla do Projeto', 'required|is_unique[sitelinc_gru_grupo.sigla]');
        $this->form_validation->set_rules('inicio', 'Data de Inicio', 'required');
        $this->form_validation->set_rules('termino', 'Previsão de Termino', 'required');
        $this->form_validation->set_rules('id_linha', 'Linha de Pesquisa', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('resumo', 'Descrição do Projeto', 'required');
        $this->form_validation->set_rules('id_coordenador', 'Coordenador do Projeto', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('id_responsavel', 'Responsável do Projeto', 'required|is_natural_no_zero');
        $this->form_validation->set_message('is_natural_no_zero', 'Você tem que'
                . ' selecionar um Coordenador, um Responsável e uma linha de'
                . ' pesquisa para o projeto.');
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
                $logo = 'assets/img/grupo/' . $data['file_name'];
            }
            else
            {
                $logo = 'assets/img/grupo/projeto.jpg';
            }
            $dados['id_tipo'] = 2;
            $dados['logo'] = $logo;
            $dados['publico'] = 1;
            $dados['excluido'] = 0;
            $idProjeto = $this->grupoModel->inserir($dados);
            if ($idProjeto)
            {
                $inicio = explode('/', $dados['inicio']);
                $termino = explode('/', $dados['termino']);
                $dados['id_projeto'] = $idProjeto;
                $dados['inicio'] = $inicio[2] . '-' . $inicio[1] . '-' . $inicio[0];
                $dados['termino'] = $termino[2] . '-' . $termino[1] . '-' . $termino[0];
                $dados['fim'] = 0;
                $dados['id_financiador'] = ($dados['id_financiador']) ? $dados['id_financiador'] : NULL;
                if ($this->projetoModel->inserir($dados))
                {
                    if ($this->projetoModel->inserirVinculosDeProjeto($idProjeto, $dados['id_coordenador'], $dados['id_responsavel'], $idLab, $dados['id_financiador']))
                    {
                        $linhaDePesquisa = Array(
                            'id_linha' => $dados['id_linha'],
                            'id_grupo' => $idProjeto
                        );
                        if ($this->pesquisaLinhaGrupoVinculoModel->inserir($linhaDePesquisa))
                        {
                            $this->session->set_flashdata(
                                    'sucesso', 'O Projeto ' . $dados['nome'] . ' Foi'
                                    . ' inserido com sucesso, bem como seu'
                                    . ' coordenador, responsável, instituição'
                                    . ' financiadora e linha de pesquisa do'
                                    . ' mesmo.');
                            redirect('social/projeto/index/' . $idLab);
                        }
                        else
                        {
                            $this->session->set_flashdata(
                                    'noticia', 'O Projeto ' . $dados['nome']
                                    . ' e seu coordenador, responsável e'
                                    . ' instituição financeira foram inseridos'
                                    . ' com sucesso, porém ao vincular a linha'
                                    . ' de pesquisa do mesmo ocorreu um erro,'
                                    . ' vá na descrição do projeto e vincule-a'
                                    . ' manualemnte. <a href="/social/projeto/'
                                    . 'descricao/' . $idProjeto . '">Clique aqui'
                                    . ' para ir para a descrição do projeto.</a>');
                            redirect('social/projeto/index/' . $idLab);
                        }
                    }
                    else
                    {
                        $this->session->set_flashdata(
                                'noticia', 'O Projeto ' . $dados['nome'] . ' Foi'
                                . ' inserido com sucesso, Porém ao vincular o'
                                . ' Coordenador do Projeto, Responsável do'
                                . ' Projeto ocorreu um erro, vá na descrição do'
                                . ' projeto inserido e vincule-os manualemnte.'
                                . ' <a href="/social/projeto/descricao/'
                                . $idProjeto . '">Clique aqui para ir para a'
                                . ' descrição do projeto.</a>');
                        redirect('social/projeto/index/' . $idLab);
                    }
                }
                else
                {
                    $this->grupoModel->deletar($idProjeto);
                    $this->session->set_flashdata(
                            'erro', 'Ops... Ocorreu um problema e o Projeto '
                            . $dados['nome'] . ' não foi inserido com sucesso!'
                            . ' Tente novamente.');
                    redirect('social/projeto/criar/' . $idLab);
                }
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Ocorreu um prooblema e o Projeto '
                        . $dados['nome'] . ' não foi inserido com sucesso!'
                        . ' Tente novamente!');
                redirect('social/projeto/criar/' . $idLab);
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/projeto/criar/' . $idLab);
        }
    }

    public function alterar()
    {
        $idProj = $this->uri->segment(4);
        $novosDados = $this->_request;
        $dados = $this->viewProjetoModel->recupera(Array('id' => $idProj));
        $this->form_validation->set_rules('nome', 'Nome do Projeto', 'required');
        $this->form_validation->set_rules('sigla', 'Sigla do Projeto', 'required');
        $this->form_validation->set_rules('inicio', 'Data de Inicio', 'required');
        $this->form_validation->set_rules('termino', 'Previsão de Termino', 'required');
        $this->form_validation->set_rules('id_coordenador', 'Coordenador do Projeto', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('id_responsavel', 'Responsável do Projeto', 'required|is_natural_no_zero');
        $this->form_validation->set_message('is_natural_no_zero', 'Você tem que'
                . ' selecionar um Coordenador e Responsável e uma instituição'
                . ' financeira para o projeto.');
        if ($this->form_validation->run())
        {
            if ($_FILES['logo']['name'] != '')
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
                    $logo = 'assets/img/grupo/' . $data['file_name'];
                }
                else
                {
                    $this->session->set_flashdata('erro', 'Você não selecionou um'
                            . ' arquivo ou então não enviou um arquivo de formato'
                            . ' válido. Por favor, verifique o arquivo enviado.');
                    redirect('social/projeto/descricao/' . '$idProj');
                }
            }
            else
            {
                $logo = $dados[0]->logo;
            }
            $inicio = explode('/', $novosDados['inicio']);
            $termino = explode('/', $novosDados['termino']);
            $novosDados['inicio'] = $inicio[2] . '-' . $inicio[1] . '-' . $inicio[0];
            $novosDados['termino'] = $termino[2] . '-' . $termino[1] . '-' . $termino[0];
            $novosDados['logo'] = $logo;
            $novosDados['id_tipo'] = 2;
            $novosDados['id_projeto'] = $idProj;
            $novosDados['fim'] = 0;
            $novosDados['excluido'] = 0;
            if ($novosDados['id_coordenador'] != $dados[0]->id_coordenador)
            {
                $this->usuarioVinculoModel->desvinculaVinculaUsuariosProjeto($idProj, 8, $dados[0]->id_coordenador, $novosDados['id_coordenador']);
            }
            if ($novosDados['id_responsavel'] != $dados[0]->id_responsavel)
            {
                $this->usuarioVinculoModel->desvinculaVinculaUsuariosProjeto($idProj, 9, $dados[0]->id_responsavel, $novosDados['id_responsavel']);
            }
            $novosDados['id_financiador'] = ($novosDados['id_financiador']) ? $novosDados['id_financiador'] : NULL;
            $ateraGrupo = $this->grupoModel->alterar((object) $novosDados, Array('id' => $idProj));
            $alteraProjeto = $this->projetoModel->alterar((object) $novosDados, Array('id_projeto' => $novosDados['id_projeto']));
            if ($ateraGrupo || $alteraProjeto)
            {
                $this->session->set_flashdata('sucesso', 'O Projeto '
                        . $novosDados['nome'] . ' foi alterado com sucesso.');
                redirect('social/projeto/descricao/' . $idProj);
            }
            else
            {
                $this->session->set_flashdata('erro', 'Ops... Ocorreu um erro e'
                        . ' o Projeto ' . $novosDados['nome'] . ' não foi'
                        . ' alterado com sucesso! Tente novamente.');
                redirect('social/projeto/editar/' . $idProj);
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect('social/projeto/editar/' . $idProj);
        }
    }

    public function vincularLinhaPesquisaProjeto()
    {
        $vinculo = $this->_request;
        if ($vinculo['id_linha'] != 0)
        {
            if ($this->pesquisaLinhaGrupoVinculoModel->inserir($vinculo))
            {
                $this->session->set_flashdata(
                        'sucesso', 'A linha de pesquisa foi vinculada com sucesso!');
                redirect('social/projeto/descricao/' . $vinculo['id_grupo']);
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'Ops... Ocorreu um problema a linha de pesquisa não'
                        . ' foi vinculada com sucesso! Tente novamente.');
                redirect('social/projeto/descricao/' . $vinculo['id_grupo']);
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Você precisa selecionar uma linha de pesquisa.');
            redirect('social/laboratorio/descricao/' . $vinculo['id_grupo']);
        }
    }

    public function desvincularLinhaPesquisaProjeto()
    {
        $linhapesquisa = $this->_request;
        if ($this->pesquisaLinhaGrupoVinculoModel->deletar($linhapesquisa['idVinculoLinha']))
        {
            $this->session->set_flashdata(
                    'sucesso', 'A linha de pesquisa ' . $linhapesquisa['linha']
                    . ' foi desvinculada com sucesso!');
            redirect('social/projeto/descricao/' . $linhapesquisa['idGrupo']);
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Ocorreu um problema a linha de pesquisa'
                    . $linhapesquisa['linha'] . ' não foi desvinculada com'
                    . ' sucesso! Tente novamente.');
            redirect('social/projeto/descricao/' . $linhapesquisa['idGrupo']);
        }
    }

    public function excluir()
    {
        $idProj = $this->uri->segment(4);
        $projeto = $this->viewProjetoModel->recupera(Array('id' => $idProj));
        $projeto[0]->excluido = 1;
        if ($this->grupoModel->alterar($projeto[0]))
        {
            $this->session->set_flashdata(
                    'sucesso', 'O Projeto ' . $projeto[0]->nome
                    . ' foi excluido com sucesso!');
            redirect('social/projeto/index/' . $projeto[0]->id_laboratorio);
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Ops... Ocorreu um problema e o Projeto '
                    . $projeto[0]->nome . ' não foi excluido com sucesso!'
                    . ' Tente novamente.');
            redirect('social/projeto/descricao/' . $projeto[0]->id);
        }
    }

    public function excluirfoto()
    {
        $idProj = $this->_request;
        $laboratorio = $this->grupoModel->recupera(Array('id' => $idProj['idProj']));
        $logoLab = explode('/', $laboratorio[0]->logo);
        $laboratorio[0]->logo = 'assets/img/grupo/projeto.jpg';
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

    public function verificaVinculadosDoProjeto()
    {
        $idProj = $this->_request;
        $proj = $this->grupoModel->recupera(Array('id' => $idProj['idProj']));
        $tarefas = $this->tarefaModel->recupera(Array('id_projeto' => $idProj['idProj']));
        $usuarios = $this->viewUsuarioGrupoVinculoModel->recupera(Array('id_grupo' => $idProj['idProj']));
        $anexos = $this->anexoModel->recupera(Array('id_grupo' => $idProj['idProj']));
        $posts = $this->postModel->recupera(Array('id_grupo' => $idProj['idProj']));
        if ($tarefas || $usuarios || $anexos || $posts)
        {
            $msg = 'O Projeto ' . $proj[0]->nome . ' possui';
            if (count($tarefas) > 0)
            {
                $msg .= ' Terafa(s)';
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
            $msg .= ' Vinculado(s), se ainda assim desejar exclui-lo, estes ficarão'
                    . ' invisíveis. Você tem certeza que deseja exclui-lo?';
        }
        else
        {
            $msg = 'O Projeto ' . $proj[0]->nome . ' não possui nenhuma Tarefa,'
                    . ' Usuário, Anexo ou Post, vinculado você tem certeza que'
                    . ' deseja exclui-lo?';
        }
        $mensagem = Array(
            'msg' => $msg
        );
        return print json_encode($mensagem);
    }

}
