<?php
class Responsable extends Controllers{
     private $responsable;
     function __construct(){
          parent::__construct();
          $this->responsable=parent::loadClassmodels("ResponsableModel");
     }
     public function index(){
         $resultado=$this->responsable->listar();
         $this->view->render($this,"index",$resultado);
     }
     public function ver($id){
         $this->responsable->set('id',$id);
         $data=$this->responsable->ver();
         echo json_encode($data);
     }
     public function crear(){
          $this->responsable->set("id_unidad",$_POST['id_unidad']);
          $this->responsable->set("ci",$_POST['ci']);
          $this->responsable->set("nombre",$_POST['nombre']);
          $this->responsable->set("apellido",$_POST['apellido']);
          $resultado=$this->responsable->crear();
          echo $resultado;
     }
     public function editar($id){
         $this->responsable->set("id",$id);
         $this->responsable->set("id_unidad",$_POST['id_unidad']);
        $this->responsable->set("ci",$_POST['ci']);
        $this->responsable->set("nombre",$_POST['nombre']);
        $this->responsable->set("apellido",$_POST['apellido']);
         $resultado=$this->responsable->editar();
         echo $resultado;
     }
     public function eliminar($id){
         $this->responsable->set('id',$id);
         $this->responsable->eliminar();
     }
     public function alta($id){
         $this->responsable->set('id',$id);
         $this->responsable->alta();
     }
}
 ?>
