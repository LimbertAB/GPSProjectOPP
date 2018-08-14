<?php
class Chofer extends Controllers{
     private $chofer;
     function __construct(){
          parent::__construct();
          $this->chofer=parent::loadClassmodels("ChoferModel");
     }
     public function index(){
         $resultado=$this->chofer->listar();
         $this->view->render($this,"index","administrador","adm_",$resultado);
     }
     public function ver($id){
         $this->chofer->set('id',$id);
         $data=$this->chofer->ver();
         echo json_encode($data);
     }
     public function crear(){
          $this->chofer->set("id_unidad",$_POST['id_unidad']);
          $this->chofer->set("nombre",$_POST['nombre']);
          $this->chofer->set("brevet",$_POST['brevet']);
          $resultado=$this->chofer->crear();
          echo $resultado;
     }
     public function editar($id){
         $this->chofer->set("id",$id);
         $this->chofer->set("id_unidad",$_POST['id_unidad']);
        $this->chofer->set("nombre",$_POST['nombre']);
        $this->chofer->set("tipo",$_POST['tipo']);
        $this->chofer->set("brevet",$_POST['brevet']);
        $this->chofer->set("ci",$_POST['ci']);
        $this->chofer->set("password",$_POST['password']);
         $resultado=$this->chofer->editar();
         echo $resultado;
     }
     public function eliminar($id){
         $this->chofer->set('id',$id);
         $this->chofer->eliminar();
     }
     public function alta($id){
         $this->chofer->set('id',$id);
         $this->chofer->alta();
     }
}
 ?>
