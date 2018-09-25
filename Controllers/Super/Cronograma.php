<?php
class Cronograma extends Controllers{
     private $cronograma;
     function __construct(){
          parent::__construct();
          $this->cronograma=parent::loadClassmodels("CronogramaModel");
     }
     public function index(){
          $this->cronograma->set('year',isset($_GET['date'])? substr($_GET['date'], 0, -2):date('Y'));
          $this->cronograma->set('month',isset($_GET['date'])? substr($_GET['date'], -2):date('m'));
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
