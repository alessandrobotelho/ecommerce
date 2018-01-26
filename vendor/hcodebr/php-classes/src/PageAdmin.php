<?php
namespace Hcode;

class PageAdmin extends page{
    
    public function __construct($opts = array(), $tpl_dir = "/views/admin/")
    {
        //Chamando o metodo construtor da classe que extende
        parent::__construct($opts, $tpl_dir);
    }
}
?>
