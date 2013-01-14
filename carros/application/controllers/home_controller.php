<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_Controller extends CI_Controller {
    var $dados = array();
    public function __construct() {
        parent::__construct();
        $this->dados['dados_site'] = $this->sys_model->getDadosSite();
        $this->load->model('veiculos_model');
        $this->dados['veiculos_home'] = $this->veiculos_model->Home();
        $this->dados['total_veiculos'] = count($this->dados['veiculos_home']);
        if($this->dados['total_veiculos']<5){
            $this->dados['itens_por_pagina'] = $this->dados['total_veiculos'];
        }else{
            $this->dados['itens_por_pagina'] = 5;
        }
        $this->dados['total_paginas'] = ceil($this->dados['total_veiculos']/$this->dados['itens_por_pagina']);
        
        
    }

    public function index()
    {
        
        if($this->dados['dados_site']['status_site'] == "1"){
            $this->load->view($this->dados['dados_site']['template']['template'].'home_view',$this->dados);
        }
        else{
            $this->load->view($this->dados['dados_site']['template']['template'].'manutencao_view');
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */