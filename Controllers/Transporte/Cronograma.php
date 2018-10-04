<?php
class Cronograma extends Controllers{
     private $cronograma;
     function __construct(){
          parent::__construct();
          $this->cronograma=parent::loadClassmodels("CronogramaModel");
     }
     public function index(){
          $this->cronograma->set('desde',isset($_GET['desde'])? $_GET['desde'] : date('Y-m-').'01');
          $this->cronograma->set('hasta',isset($_GET['desde'])?$_GET['hasta'] : date('Y-m-t'));
          $resultado=$this->cronograma->listar();
          $this->view->render($this,"index",$resultado);
     }
     public function calendar(){
         $resultado=$this->cronograma->listar_calendar();
         $this->view->render($this,"calendar",$resultado);
     }
     public function ver($id){
         $this->cronograma->set('id',$id);
         $data=$this->cronograma->ver();
         $this->view->render($this,"ver",$data);
         //echo json_encode($data);
     }
     public function printpdf($id){//imprime mi informe
          $this->cronograma->set('id',$id);
          $data=$this->cronograma->imprimir();
          $this->pdf->loadPDF($this,'print','landscape',$data);
     }
     public function crear(){
          $this->cronograma->set("fecha_de",$_POST['fecha_de']);
          $this->cronograma->set("fecha_hasta",$_POST['fecha_hasta']);
          $this->cronograma->set("id_boleta",$_POST['id_boleta']);
          $resultado=$this->cronograma->crear();
          echo $resultado;
     }
     public function editar($id){
          $this->cronograma->set('id',$id);
          $this->cronograma->set("fecha_de",$_POST['fecha_de']);
          $this->cronograma->set("fecha_hasta",$_POST['fecha_hasta']);
          $this->cronograma->set("id_boleta",isset($_POST['id_boleta'])?$_POST['id_boleta']:[]);
          $resultado=$this->cronograma->editar();
          echo $resultado;
     }
     public function eliminar($id){
         $this->cronograma->set('id',$id);
         $this->cronograma->eliminar();
     }
     public function alta($id){
         $this->cronograma->set('id',$id);
         $this->cronograma->alta();
     }

     function createSession($user){
          Session::setSession('User',$user);
     }
     function destroySession(){
          Session::destroy();
          header('Location:'.URL);
     }
}
 ?>
