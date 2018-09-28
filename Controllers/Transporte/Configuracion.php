<?php
class Configuracion extends Controllers{
     private $configuracion;
     function __construct(){
          parent::__construct();
          $this->configuracion=parent::loadClassmodels("ConfiguracionModel");
     }
     public function marca(){
         $resultado=$this->configuracion->listar_marca();
         $this->view->render($this,"marca",$resultado);
     }
     public function crear_marca(){
          $this->configuracion->set("nombre",$_POST['nombre']);
          $resultado=$this->configuracion->crear_marca();
     }
     public function editar_marca($id){
          $this->configuracion->set("id",$id);
          $this->configuracion->set("nombre",$_POST['nombre']);
          $resultado=$this->configuracion->editar_marca();
     }
     public function baja_marca($id){
          $this->configuracion->set('id',$id);
          $resultado=$this->configuracion->baja_marca();
     }
     public function alta_marca($id){
         $this->configuracion->set('id',$id);
         $this->configuracion->alta_marca();
     }
}
 ?>
