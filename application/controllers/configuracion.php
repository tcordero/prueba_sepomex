<?php
class Configuracion extends CI_Controller
{
    
    private $_title;
    private $_rsc_path;
    private $_base_url;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper(array('form', 'url'));
        $this->load->model('codigo_postal_model');
        
        $this->_title = "SEPOMEX";
        $this->_rsc_path = "assets/cpanel/configuracion/";
        $this->_base_url = base_url();
        
    }
    
    
    public function index ()
    {
        
        $data["title"] = $this->_title;
        $data["rsc_path"] = $this->_rsc_path;
        $this->load->view("cpanel/inc/header.php", $data);
        $this->load->view("cpanel/inc/menu.php", $data);
        $this->load->view("cpanel/sepomex/configuracion/index.php", $data);
        $this->load->view("cpanel/inc/footer.php", $data);
    }
    
    
    public function actualizar ()
    {
        
        $data["title"] = $this->_title;
        $data["rsc_path"] = $this->_rsc_path;
        $data["action"] = base_url() . "configuracion/guardar";
        
        $this->load->view("cpanel/inc/header.php", $data);
        $this->load->view("cpanel/inc/menu.php", $data);
        $this->load->view("cpanel/sepomex/configuracion/actualizar.php", $data);
        $this->load->view("cpanel/inc/footer.php", $data);
    }
    
    
    public function guardar ()
    {
        set_time_limit(1200);
        
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'csv';
        $config['max_size']             = "80000K";
        $config['max_width']            = "1024";
        $config['max_height']           = "768";
        
        $this->load->library('upload', $config);
        
        if ( !$this->upload->do_upload('file')) {
            echo "ERROR!!!!";
            var_dump($this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
            $separador = trim($this->input->post('separador'));
            $linea = (int) trim($this->input->post('linea'));
            
            $handle = fopen(base_url() . "uploads/" . $data['upload_data']['file_name'], 'r');
            $i = 0;
            
            
            while ($linea = fgetcsv($handle, 0, $separador)) {

                $codigo_postal = array();
                
                if ($i >= 3) {
                    $codigo_postal['d_codigo']  = $linea[0];
                    $codigo_postal['d_asenta']  = $linea[1];
                    $codigo_postal['d_tipo_asenta'] = $linea[2];
                    $codigo_postal['D_mnpio']  = $linea[3];
                    $codigo_postal['d_estado']  = $linea[4];
                    $codigo_postal['d_ciudad']  = $linea[5];
                    $codigo_postal['d_CP']  = $linea[6];
                    $codigo_postal['c_estado']  = $linea[7];
                    $codigo_postal['c_oficina']  = $linea[8];
                    $codigo_postal['c_CP']  = $linea[9];
                    $codigo_postal['c_tipo_asenta']  = $linea[10];
                    $codigo_postal['c_mnpio']  = $linea[11];
                    $codigo_postal['id_asenta_cpcons']  = $linea[12];
                    $codigo_postal['d_zona']  = $linea[13];
                    $codigo_postal['c_cve_ciudad']  = $linea[14];
                    
                    $this->codigo_postal_model->save($codigo_postal);
                }
                
               
                
                $i++;
                
            }
            
        }
        
        redirect('configuracion/actualizar');
        
    }
    
    
    
    /**
     * Ingresar codigo postal
     */
    public function obtener ()
    {
        $data["title"] = "Test SEPOMEX";
        $data["rsc_path"] = $this->_rsc_path;
        $data["codigo_postal"] = base_url() . "configuracion/codigo_postal";
        $this->load->view("cpanel/inc/header.php", $data);
        $this->load->view("cpanel/inc/menu.php", $data);
        $this->load->view("cpanel/sepomex/configuracion/obtener.php", $data);
        $this->load->view("cpanel/inc/footer.php", $data);
        
    }
    
    
    /**
     * Obtiene los datos de un codigo postal
     * a través de JSON
     */
    public function codigo_postal ()
    {
        $codigo = $this->input->get('codigo');
        
        $list_codigo = $this->codigo_postal_model->find($codigo);
        $datos[0] = $list_codigo;
        
        $data = new stdClass();
        $data->message = "C\u00f3digo Postal se encontro";
        $data->datos = $datos;
        
        $response = new stdClass();
        $response->success = true;
        $response->data = $data;
        
        echo json_encode($response);
    }
}

