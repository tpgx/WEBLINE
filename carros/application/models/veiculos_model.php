<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class veiculos_model extends CI_Model {
    var $dados_retorno;
    public function __construct() {
        parent::__construct();
    }
    public function Home(){
        $veiculos = $this->db->get_where('veiculos',array('status'=>'1'))->result();
        foreach ($veiculos as $key => $veiculo) {
            $this->dados_retorno[$key] = get_object_vars($veiculo);
            $this->dados_retorno[$key]['nome_tipo'] = $this->veiculos_model->GetTipoDeVeiculos($this->dados_retorno[$key]['id_tipo_veiculo']);
            $this->dados_retorno[$key]['nome_marca'] = $this->veiculos_model->GetMarca($this->dados_retorno[$key]['id_marca']);
            $this->dados_retorno[$key]['nome_modelo'] = $this->veiculos_model->GetModelo($this->dados_retorno[$key]['id_modelo']);
            $this->dados_retorno[$key]['nome_combustivel'] = $this->veiculos_model->GetCombustivel($this->dados_retorno[$key]['id_combustivel']);
            $this->dados_retorno[$key]['nome_sub_categoria'] = $this->veiculos_model->GetSubCategoria($this->dados_retorno[$key]['id_sub_categoria']);
            
        }
        return $this->dados_retorno;
    }
    public function GetTipoDeVeiculos($id){
        $tipo_veiculos = $this->db->get_where('tipo_veiculos',array('id'=>$id))->result();
        foreach ($tipo_veiculos as $ex){
            $tipo_veiculos = $ex->nome_tipo;
        }
        return $tipo_veiculos;
    }
    public function GetMarca($id){
        $marca_veiculos = $this->db->get_where('marca_veiculos',array('id'=>$id))->result();
        foreach ($marca_veiculos as $ex){
            $marca_veiculos = $ex->nome_marca;
        }
        return $marca_veiculos;
    }
    public function GetModelo($id){
        $modelo_veiculos = $this->db->get_where('modelo_veiculos',array('id'=>$id))->result();
        foreach ($modelo_veiculos as $ex){
            $modelo_veiculos = $ex->nome_modelo;
        }
        return $modelo_veiculos;
    }
    public function GetCombustivel($id){
       $combustivel_veiculos = $this->db->get_where('combustivel',array('id'=>$id))->result();
        foreach ($combustivel_veiculos as $ex){
            $combustivel_veiculos = $ex->nome_combustivel;
        } 
        return $combustivel_veiculos;
    }
    public function GetSubCategoria($id){
       $subcategoria_veiculos = $this->db->get_where('sub_categoria_veiculos',array('id'=>$id))->result();
        foreach ($subcategoria_veiculos as $ex){
            $subcategoria_veiculos = $ex->nome_subcategoria;
        } 
        return $subcategoria_veiculos;
    }

}
