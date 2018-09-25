<?php
class Principal extends Controllers{
     private $principal;
     public function __construct(){
          parent::__construct();
          $this->principal=parent::loadClassmodels("PrincipalModel");
     }
     public function index(){
          $resultado=$this->principal->listar();
          $this->view->render($this,"index",$resultado);
     }
     public function editar($id){
          $this->principal->set("id",$id);
          $this->principal->set("nombre",$_POST['nombre']);
          $this->principal->set("ci",$_POST['ci']);
          $this->principal->set("password",$_POST['password']);
          $this->principal->set("id_persona",$_POST['id_persona']);
          $resultado=$this->principal->editar_profile();
          echo $resultado;
     }
}
