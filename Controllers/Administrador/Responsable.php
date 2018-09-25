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
}
 ?>
