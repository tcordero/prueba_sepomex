<?php

class Codigo_postal_model extends CI_Model
{
    private $_table;
    private $d_codigo;
    private $d_asenta;
    private $d_tipo_asenta;
    private $D_mnpio;
    private $d_estado;
    private $d_ciudad;
    private $d_CP;
    private $c_estado;
    private $c_oficina;
    private $c_CP;
    private $c_tipo_asenta;
    private $c_mnpio;
    private $id_asenta_cpcons;
    private $d_zona;
    private $c_cve_ciudad;
    
    public function __construct()
    {
        $this->load->database();
        $this->_table = 'codigo_postal';
    }
    
    
    
    public function save ($codigo_postal)
    {
        $this->db->insert($this->_table, $codigo_postal);
    }
    
    public function find ($codigo)
    {
        $query = $this->db->get_where('codigo_postal', array('d_codigo' => $codigo));
        
        return $query->row_array();
    }
}

