<?php

class usuarioModel extends abstractModel
{

    /**
     * @var String $_table Nome da tabela no banco na qual este Model atua.
     */
    protected $_table = 'sitelinc_usu_usuario';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('viewUsuarioGrupoVinculoModel');
    }

    public function inserir(Array $dados)
    {
        $colunasBanco = $this->descreverTabela();
        foreach ($dados as $coluna => $valor)
        {
            if (!in_array($coluna, $colunasBanco))
            {
                unset($dados[$coluna]);
            }
        }
        if ($this->db->insert($this->_table, $dados))
        {
            return 1;
        }
        return 0;
    }

    public function recuperaUsuariosQueNaoPertecemAoLab($idLab, $tipoGrupo = NULL)
    {
        $tipoGrupo = ($tipoGrupo) ? $tipoGrupo : 3;
        $usuarios = $this->recuperaPorParametro(NULL, Array('excluido' => 0));
        $usuariosLab = $this->viewUsuarioGrupoVinculoModel->recuperaPorParametro(NULL, Array('id_tipo_grupo' => $tipoGrupo, 'id_grupo' => $idLab));
        $outrosUsuarios = Array();
        foreach ($usuarios as $usuario)
        {
            $flag = count($usuariosLab);
            foreach ($usuariosLab as $usuarioLab)
            {
                if ($usuario->id == $usuarioLab->id_usuario)
                {
                    $flag--;
                }
            }
            if ($flag == count($usuariosLab))
            {
                $outrosUsuarios[] = $usuario;
                $flag = 0;
            }
        }
        return $outrosUsuarios;
    }

    public function recuperaUsuariosQueNaoPertecemAoProj($idProj)
    {
        $usuarios = $this->recuperaPorParametro(NULL, Array('excluido' => 0));
        $usuariosLab = $this->viewUsuarioGrupoVinculoModel->recuperaPorParametro(NULL, Array('id_tipo_grupo' => 2, 'id_grupo' => $idProj));
        $outrosUsuarios = Array();
        foreach ($usuarios as $usuario)
        {
            $flag = count($usuariosLab);
            foreach ($usuariosLab as $usuarioLab)
            {
                if ($usuario->id == $usuarioLab->id_usuario)
                {
                    $flag--;
                }
            }
            if ($flag == count($usuariosLab))
            {
                $outrosUsuarios[] = $usuario;
                $flag = 0;
            }
        }
        return $outrosUsuarios;
    }

}
