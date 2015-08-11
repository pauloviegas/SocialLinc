<?php

class serviceauth extends MY_Controller
{

    /**
     * Carrega todos os métodos contidos na classe pai, bem como as Models (tituloModel, grupoModel, viewGrupoTipoModel e usuarioModel), necessárias .
     * @param NULL
     * @author Paulo Viegas <pauloviegas93@gmail.com>
     * @return NULL
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('formacaoModel');
        $this->load->model('grupoModel');
        $this->load->model('viewGrupoTipoModel');
        $this->load->model('usuarioModel');
        $this->load->model('usuarioVinculoModel');
        $this->load->model('pesquisaLinhaModel');
        $this->load->model('viewPerfilAcaoModel');
        $this->load->model('authModel');
    }

    /**
     * Carrega a página inicial do sistema, onde o usuário poderá autenticar-se
     * ou, caso não faça parte da rede social ainda, realize o seu cadastro.
     * @param NULL;
     * @return redirecionado para a view index, da pasta service_auth em modules;
     */
    public function index()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Recupração de dados
        $base64Usuario = $this->uri->segment(4);
        $this->session->set_userdata('PaginasNaoPrecisaPermissao', $this->viewPerfilAcaoModel->gerarPaginasSemPermissao());
        $this->data['formacoes'] = $this->formacaoModel->recuperaPorParametro(NULL, Array('excluido' => 0));
        $this->data['instituicoes'] = $this->viewGrupoTipoModel->recuperaPorParametro(NULL, Array('id_tipo' => 1, 'excluido' => 0), Array('nome' => 'asc'));
        $this->data['base64Usuario'] = $base64Usuario;
        $this->data['usuario'] = $this->usuarioModel->recuperaPorParametro(NULL, Array('email' => base64_decode($base64Usuario)));

        //Redirecionamento
        $this->load->view('social/service_auth/index', $this->data);
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
                $usuarioBanco = $this->usuarioModel->recuperaPorParametro(NULL, Array('email' => $usuario['email']));
                $this->usuarioVinculoModel->inserir(Array(
                    'id_usuario' => $usuarioBanco[0]->id,
                    'id_instituicao' => '1',
                    'id_perfil' => '1',
                    'ativo' => '1'
                ));
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
                        'erro', 'Ops... Ocorreu um erro e o usuário não foi'
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

    public function inserirUsuario()
    {
        $usuario = $this->_request;
        $base64Usuario = $this->uri->segment(4);
        $usuarioBanco = $this->usuarioModel->recuperaPorParametro(NULL, Array('email' => base64_decode($base64Usuario)));
        if (base64_decode($base64Usuario) == $usuarioBanco[0]->email)
        {
            $usuario['id'] = $usuarioBanco[0]->id;
            $this->form_validation->set_rules('nome', 'Nome do Usuário', 'required');
            $this->form_validation->set_rules('id_formacao', 'Formação', 'required|is_natural_no_zero');
            $this->form_validation->set_rules('id_instituicao', 'Instituição', 'required|is_natural_no_zero');
            $this->form_validation->set_message('is_natural_no_zero', 'Você tem que selecionar um Título e uma Instituição.');
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
                if ($this->usuarioModel->alterar((object) $usuario))
                {
                    $usuarioBanco = $this->usuarioModel->recuperaPorParametro(NULL, Array('email' => $usuario['email']));
                    $this->usuarioVinculoModel->inserir(Array(
                        'id_usuario' => $usuarioBanco[0]->id,
                        'id_instituicao' => '1',
                        'id_perfil' => '1',
                        'ativo' => '1'
                    ));
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
                            'erro', 'Ops... Ocorreu um erro e o usuário não foi'
                            . 'inserido com sucesso! Tente novamente.');
                    redirect('social/serviceauth/index/' . $base64Usuario);
                }
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', validation_errors());
                redirect('social/serviceauth/index/' . $base64Usuario);
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', 'Você não pode alterar o email no cadastro,'
                    . ' apenas após se cadastrar.');
            redirect('social/serviceauth/index/' . $base64Usuario);
        }
    }

    /**
     * Realiza a requisição ao Model authModel o login do usuário, caso valido
     * redireciona par o Feed de notícias do usuário, se não para a pagina de
     * login da rede social! Validando, anteriormente, os campos fornecidos!
     * @param NULL;
     * @return NULL;
     */
    public function logar($email = NULL, $senha = NULL)
    {
        $login = ($email && $senha) ? ($login['email'] = $email && $login['senha'] = $senha) : $this->_request;
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[4]|max_length[12]');
        if ($this->form_validation->run())
        {
            if ($this->authModel->logar($login['email'], $login['senha']))
            {
                $this->session->set_flashdata('sucesso', 'Você foi logado com sucesso!!!');
                redirect('social/home/index');
            }
        }
        else
        {
            $this->index();
        }
    }

    public function reativarUsuario()
    {
        $email = str_replace('%40', '@', $this->uri->segment(4));
        $usuario = $this->usuarioModel->recuperaPorParametro(NULL, Array('email' => $email));
        $novasenha = dechex(rand(1000000000000, 1099511627775));
        $usuario[0]->senha = sha1($novasenha);
        if ($this->usuarioModel->alterar($usuario[0]))
        {
            $this->email->initialize($config);
            $this->email->to('eng.marciafontes@gmail.com');
            $this->email->from('pauloviegas93@gmail.com', 'Social LINC');
            $this->email->subject('Reativação do usuário ' . $usuario[0]->nome);
            $this->email->message('Olá, ' . $usuario[0]->nome . '<br>'
                    . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Você solicitou a reativação'
                    . ' do seu usuário no Social LINC, uma nova senha foi gerada'
                    . ' para você, aguarde um novo E-mail confimrmando sua aprovação'
                    . ' pelo administrador:<br><br><br>'
                    . 'E-mail: eng.marcia@gmail.com<br>'
                    . 'Senha: ' . $novasenha);
            if ($this->email->send())
            {
                $this->session->set_flashdata('sucesso', 'Sua conta foi reativada'
                        . ' com sucesso, verifique seu E-mail para a confirmação'
                        . ' de sua nova senha e mais informações!');
                redirect('social/serviceauth/index');
            }
            else
            {
                $this->session->set_flashdata('erro', $this->email->print_debugger());
                redirect('social/serviceauth/index');
            }
        }
        else
        {
            $this->session->set_flashdata('erro', 'Ops... Ocorreu um erro e'
                    . ' sua conta não foi reativada! Tente novamente.');
            redirect('social/serviceauth/index');
        }
    }

    public function logout()
    {

        if ($this->authModel->logout())
        {

            return redirect('social/serviceauth/index');
        }
    }

}
