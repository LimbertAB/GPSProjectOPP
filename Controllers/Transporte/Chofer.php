<?php
class Chofer extends Controllers{
     private $chofer;
     function __construct(){
          parent::__construct();
          $this->chofer=parent::loadClassmodels("ChoferModel");
     }
     public function index(){
         $resultado=$this->chofer->listar();
         $this->view->render($this,"index",$resultado);
     }
     public function ver($id){
         $this->chofer->set('id',$id);
         $data=$this->chofer->ver();
         echo json_encode($data);
     }
}
 ?>
