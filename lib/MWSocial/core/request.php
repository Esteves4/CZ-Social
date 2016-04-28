<?php 

namespace MWSocial\core;

class request
{

  public function data()  {
    $retorno['post'] = $this->post();
    $retorno['get'] = $this->get();

    return $retorno;
  }

  public function post(){
    $retorno=array();
    foreach($_POST as $key=>$value){
      $retorno[$key]=$this->securityVar($value);
    }
    return $retorno;
  }

  public function get(){
    $retorno['parametros']=array();
    foreach($_GET as $value){
      $retorno['parametros'][]=$this->securityVar($value);
    }
    return $retorno;
  }

  public function securityVar($var)
  {
    $var = addslashes($var);
    return $var;
  }

}