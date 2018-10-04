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
}
 ?>
