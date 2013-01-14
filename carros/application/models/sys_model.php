<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class sys_model extends CI_Model {
    var $dados_de_retorno;
    public function __construct() {
        parent::__construct();
    }
    public function getDadosSite(){
        $query = $this->db->query('SELECT * FROM dados_site')->result();
        foreach ($query as $dados):
            $this->dados_de_retorno = array(
                'nome'          =>$dados->nome,    
                'endereco'      =>$dados->endereco,
                'numero'        =>$dados->numero,
                'complemento'   =>$dados->complemento,
                'bairro'        =>$dados->bairro,
                'cidade'        =>$dados->cidade,
                'estado'        =>$dados->estado,
                //EXEMPLO TELEFONES: |TIPO|(00)000.0000,|TIPO|(00)000.0000,
                'telefones'     =>"",
                'emails'        =>explode(",", $dados->emails),
                'titulo_site'   =>$dados->titulo_site,
                'descricao_site'=>$dados->descricao_site,
                'keywords'      =>$dados->keywords,
                'status_site'   =>$dados->status_site,
                'endereco_site' =>$dados->endereco_site,
                'google_analitycs' =>$dados->google_analitycs
            );
        //$this->dados_de_retorno['emails'] = explode(',', $this->dados_de_retorno['emails']);
        endforeach;
        
        $telefones = explode(",", $dados->telefones);
        
        foreach ($telefones as $x => $telefone){
            $dados_telefone = explode("|", $telefone);
            $this->dados_de_retorno['telefones'][$x]['tipo'] = $dados_telefone[1];
            $this->dados_de_retorno['telefones'][$x]['telefone'] = $dados_telefone[2];
        }
        
        
        //OBTENDO O TEMPLATE DO SITE
        $templates = $this->db->get_where('templates',array('status'=>'1'))->result();
        foreach ( $templates as $template):
            $this->dados_de_retorno['template'] = array(
                'template'=>'templates/' . $template->diretorio . '/',
                'css_directory'     => base_url().'application/views/templates/'.$template->diretorio.'/css/',
                'js_directory'      => base_url().'application/views/templates/'.$template->diretorio.'/js/',
                'template_imgens'   => base_url().'application/views/templates/'.$template->diretorio.'/imagens/',
                'imagens_full'      => base_url().'imagens/full/',
                'imagens_simple'    => base_url().'imagens/simple/',
                'imagens_thumb'     => base_url().'imagens/thumb/',
                'imagens_mini'      => base_url().'imagens/mini/',
                'flash_banner'      => base_url().'swf/',
                'imagens_banner'    => base_url().'banners/'
            );
        endforeach;
        
        $banners = $this->db->get_where('banners_publicidades',array('status'=>'1'))->result();
        $banner_300x100 = 0;
        $banner_468x60  = 0;
        $banner_300x250 = 0;
        
        foreach ($banners as $banner){
            switch ($banner->tamanho){
                case "468x60":
                    $this->dados_de_retorno['banners']['468x60'][$banner_468x60] = $banner;
                    $this->dados_de_retorno['banners']['468x60'][$banner_468x60] = get_object_vars($this->dados_de_retorno['banners']['468x60'][$banner_468x60]);
                    $banner_468x60 ++;
                    
                break;
                case "300x100":
                    $this->dados_de_retorno['banners']['300x100'][$banner_300x100] = $banner;
                    $this->dados_de_retorno['banners']['300x100'][$banner_300x100] = get_object_vars($this->dados_de_retorno['banners']['300x100'][$banner_300x100]);
                    $banner_300x100 ++;
                    
                break;
                case "300x250":
                    $this->dados_de_retorno['banners']['300x250'][$banner_300x250] = $banner;
                    $this->dados_de_retorno['banners']['300x250'][$banner_300x250] = get_object_vars($this->dados_de_retorno['banners']['300x250'][$banner_300x250]);
                    $banner_300x250 ++;
                    
                break;
            }
            
        }
        return $this->dados_de_retorno;
        
        
    }
}