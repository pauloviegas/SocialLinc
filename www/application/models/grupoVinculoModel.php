<?php

class grupoVinculoModel extends abstractModel
{

    protected $_table = 'sitelinc_gru_vinculo';

    public function __construct()
    {

        parent::__construct();
    }

    public function recuperaQuantDeProjetosDoLaboratorio($idLaboratorio)
    {
        $this->db->where(Array('id_grupo' => $idLaboratorio, 'id_tipo' => 1));
        $this->db->from($this->_table);
        return $this->db->count_all_results();
    }

}
