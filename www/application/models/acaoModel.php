<?php
/**
 * @package Usuario
 * @subpackage Models
 */
class acaoModel extends abstractModel
{

    /**
     * @var String $_table variável abstrata que será sobrescrita nas classes
     *  filhas, representando a tabela na qual a model vai atuar.
     */
    protected $_table = 'sitelinc_usu_acao';

    public function __construct()
    {
        
        parent::__construct();
    }

    public function recuperaPermissaoDivididaPorController($idPerfil, $modulo = 'social')
    {
        $listaPermissoes = $this->recupera(Array('permissao' => 1, 'modulo' => $modulo), Array('controller' => 'asc'));
        $permissoesPerfil = $this->permissaoModel->recupera(Array('id_perfil' => $idPerfil));
        $permissoes = Array();
        foreach ($listaPermissoes as $permissao)
        {
            $permissao->perfilPermissao = 0;
            foreach ($permissoesPerfil as $permissaoPerfil)
            {
                if ($permissao->id == $permissaoPerfil->id_acao)
                {
                    $permissao->perfilPermissao = 1;
                }
            }
            $permissoes[$permissao->alias_controller][] = $permissao;
        }
        return $permissoes;
    }
}
