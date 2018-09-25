<?php
class Vehiculo extends Controllers{
     private $vehiculo;
     function __construct(){
          parent::__construct();
          $this->vehiculo=parent::loadClassmodels("VehiculoModel");
     }
     public function index(){
         $resultado=$this->vehiculo->listar();
         $this->view->render($this,"index",$resultado);
     }
     public function ver($id){
         $this->vehiculo->set('id',$id);
         $data=$this->vehiculo->ver();
         echo json_encode($data);
     }
}
 ?>
