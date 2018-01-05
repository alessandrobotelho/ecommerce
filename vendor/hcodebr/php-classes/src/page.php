<?php
namespace Hcode;
use Rain\Tpl;

class page{
    //declarando as variaveis
    private $tpl;
    //declarando um array como variavel
    private $options =[];
    private $defaults = [
        "data"=>[]
    ];
    //Criando metodos construtor e destrutor
    public function __construct($opts = array()) {
        //Mesclando os arrays
        $this->options = array_merge($this->defaults,$opts);
        
        //configurando o rem tpl
       	$config = array(
                           //aponta a pasta root do projeto
	 "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/",
	 "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
	"debug"         => false // set to false to improve the speed
	);

	Tpl::configure( $config );
        
        $this->tpl = new Tpl;
        
        $this->setData($this->options["data"]);
        
        //desenhando o teplate na tela
        //adicionando o cabeçalho
        $this->tpl->draw("header");
        
    }
    private function setData($data = array())
    {
       foreach ($data as $key => $value)
        {
          $this->tpl->assign($key,$value);
        }
    }
    public function setTpl($name, $data = array(), $returnHTML = false)
    {
        $this->setData($data);
        return $this->tpl->draw($name,$returnHTML);
    }

    public function __destruct() {
        //chando o rodape
        $this->tpl->draw("footer");
    }
}
?>

