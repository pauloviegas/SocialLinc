<?php

class pesquisaLinhaModel extends AbstractModel
{

    /**
     * @var String $_table Nome da tabela no banco na qual este Model atua.
     */
    protected $_table = 'sitelinc_pesq_linha';

    /**
     * Carrega todos os métodos contidos na classe pai.
     * @param NULL
     * @author Paulo Viegas <pauloviegas93@gmail.com>
     * @return NULL
     */
    public function __construct()
    {

        parent::__construct();
        $this->load->model('pesquisaLinhaGrupoVinculoModel');
        $this->load->model('pesquisaLinhaUsuarioVinculoModel');
    }

    public function recuperaLinhasPesquisaQueNaoPertecemAoGrupo($idGrupo)
    {
        $linhasPesquisaGrupo = $this->pesquisaLinhaGrupoVinculoModel->recuperaPorParametro(NULL, Array('id_grupo' => $idGrupo));
        $linhasPesquisa = $this->recuperaTodos();
        $linhas = Array();
        foreach ($linhasPesquisa as $linhaPesquisa)
        {
            $flag = count($linhasPesquisa);
            foreach ($linhasPesquisaGrupo as $linhaPesquisaGrupo)
            {
                if ($linhaPesquisa->id == $linhaPesquisaGrupo->id_linha)
                {
                    $flag--;
                }
            }
            if ($flag == count($linhasPesquisa))
            {
                $linhas[] = $linhaPesquisa;
            }
        }
        return $linhas;
    }

    public function recuperaLinhasPesquisaQueNaoPertecemAoUsuario($idUsuario)
    {
        $linhasPesquisaUsuario = $this->pesquisaLinhaUsuarioVinculoModel->recuperaPorParametro(NULL, Array('id_usuario' => $idUsuario));
        $linhasPesquisa = $this->recuperaTodos();
        $linhas = Array();
        foreach ($linhasPesquisa as $linhaPesquisa)
        {
            $flag = count($linhasPesquisa);
            foreach ($linhasPesquisaUsuario as $linhaPesquisaUsuario)
            {
                if ($linhaPesquisa->id == $linhaPesquisaUsuario->id_linha)
                {
                    $flag--;
                }
            }
            if ($flag == count($linhasPesquisa))
            {
                $linhas[] = $linhaPesquisa;
            }
        }
        return $linhas;
    }

}
