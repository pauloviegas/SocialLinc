<?php

class anexo extends SocialController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('anexoModel');
    }

    public function inserirAnexo()
    {
        $this->form_validation->set_rules('nome', 'Nome Do Anexo', 'required');
        $anexo = $this->_request;
        if ($this->form_validation->run())
        {
            $nomeDoAnexo = explode('.', $_FILES['anexo']['name']);
            if (end($nomeDoAnexo) != 'ppt')
            {
                $config['upload_path'] = './assets/img/anexo';
                $config['allowed_types'] = 'csv|bin|exe|psd|pdf|xls|ppt|zip|mpga'
                        . '|mp3|gif|jpeg|jpg|jpe|png|txt|xsl|mpeg|mpg|avi|doc|docx';
                $config['max_size'] = '0';
                $config['max_width'] = '0';
                $config['max_height'] = '0';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('anexo'))
                {
                    $data = $this->upload->data();
                    $anexo['localizacao'] = '/assets/img/anexo/' . $data['file_name'];
                    if ($this->anexoModel->inserir($anexo))
                    {
                        $this->session->set_flashdata(
                                'sucesso', 'O anexo foi inserido com sucesso!');
                        redirect($anexo['controller'] .'/descricao/' . $anexo['id_grupo']);
                    }
                    else
                    {
                        $this->session->set_flashdata(
                                'erro', 'Ops... Ocorreu um problema e o anexo não'
                                . ' foi inserido com sucesso!');
                        redirect($anexo['controller'] .'/descricao/' . $anexo['id_grupo']);
                    }
                }
                else
                {
                    $this->session->set_flashdata('erro', 'Você não selecionou um'
                            . ' arquivo ou então não enviou um arquivo de formato'
                            . ' válido. Por favor, verifique o arquivo enviado.');
                    redirect($anexo['controller'] .'/descricao/' . $anexo['id_grupo']);
                }
            }
            else
            {
                $this->session->set_flashdata(
                        'erro', 'O tipo do arquivo enviado não é permitido.');
                redirect($anexo['controller'] .'/descricao/' . $anexo['id_grupo']);
            }
        }
        else
        {
            $this->session->set_flashdata(
                    'erro', validation_errors());
            redirect($anexo['controller'] .'/descricao/' . $anexo['id_grupo']);
        }
    }

    public function excluirAnexo()
    {
        $idAnexo = $this->uri->segment(4);
        $controller = $this->_request;
        $anexo = $this->anexoModel->recuperaPorParametro($idAnexo);
        $imagem = explode('/', $anexo[0]->localizacao);
        if ($this->anexoModel->deletar($idAnexo))
        {
            if (unlink($imagem[1] . '/' . $imagem[2] . '/' . $imagem[3] . '/' . $imagem[4]))
            {
                $this->session->set_flashdata('sucesso', 'O anexo ' . $anexo[0]->nome
                        . ' foi excluido com sucesso.');
                redirect($controller['controller'] . '/descricao/' . $anexo[0]->id_grupo);
            }
            else
            {
                $this->session->set_flashdata('erro', 'O anexo ' . $anexo[0]->nome
                        . ' foi excluido com sucesso, porém ocorreu um problema'
                        . ' e o arquivo não foi excluido.');
                redirect($controller['controller'] . '/descricao/' . $anexo[0]->id_grupo);
            }
        }
        else
        {
            $this->session->set_flashdata('erro', 'Ops... Ocorreu um erro e'
                    . ' o anexo ' . $anexo[0]->nome . ' não foi excluido com'
                    . ' sucesso! Tente novamente.');
            redirect($controller['controller'] . '/descricao/' . $anexo[0]->id_grupo);
        }
    }

}
