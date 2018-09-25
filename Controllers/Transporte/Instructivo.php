<?php
class Instructivo extends Controllers{
     private $instructivo;
     function __construct(){
          parent::__construct();
          $this->instructivo=parent::loadClassmodels("InstructivoModel");
     }
     public function index(){
          $this->instructivo->set('year',isset($_GET['date'])? substr($_GET['date'], 0, -2):date('Y'));
          $this->instructivo->set('month',isset($_GET['date'])? substr($_GET['date'], -2):date('m'));
          $resultado=$this->instructivo->listar();
          $this->view->render($this,"index",$resultado);
     }
     public function printpdf($id){
          $this->instructivo->set('id',$id);
          $data=$this->instructivo->ver();
          $this->pdf->loadPDF($this,"print","portrait",$data);
     }
     public function ver($id){
         $this->instructivo->set('id',$id);
         $data=$this->instructivo->ver();
         echo json_encode($data);
     }
     public function crear(){
          $this->instructivo->set("id_chofer",$_POST['id_chofer']);
          $this->instructivo->set("descripcion",$_POST['descripcion']);
          $this->instructivo->set("fecha",$_POST['fecha']);
          $resultado=$this->instructivo->crear();
          echo $resultado;
     }
     public function editar($id){
          $this->instructivo->set('id',$id);
          $this->instructivo->set("id_chofer",$_POST['id_chofer']);
          $this->instructivo->set("descripcion",$_POST['descripcion']);
          $this->instructivo->set("fecha",$_POST['fecha']);
          $resultado=$this->instructivo->editar();
          echo $resultado;
     }
     public function eliminar($id){
         $this->instructivo->set('id',$id);
         $this->instructivo->eliminar();
     }
     public function alta($id){
         $this->instructivo->set('id',$id);
         $this->instructivo->alta();
     }
}
 ?>
