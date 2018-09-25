<?php
class Reporte extends Controllers{
     private $reporte;
     function __construct(){
          parent::__construct();
          $this->reporte=parent::loadClassmodels("ReporteModel");
     }
     public function index(){
         $resultado=$this->reporte->listar();
         $this->view->render($this,"index",$resultado);
     }
     public function viaje(){
          $this->reporte->set('year',isset($_GET['year']) ? $_GET['year'] :date('Y'));
          $this->reporte->set('month',isset($_GET['month']) ? $_GET['month'] :date('m'));
         $resultado=$this->reporte->viaje();
         $this->view->render($this,"viaje",$resultado);
     }
     public function printonepdf($id){
          $this->reporte->set('id',$id);
          $this->reporte->set('year',isset($_GET['year']) ? $_GET['year'] :date('Y'));
          $this->reporte->set('month',isset($_GET['month']) ? $_GET['month'] :date('m'));
          $data=$this->reporte->imprimir_uno();
          $this->pdf->loadPDF($this,"printone","landscape",$data);
     }
     public function printallpdf(){
          $this->reporte->set('year',isset($_GET['year']) ? $_GET['year'] :date('Y'));
          $this->reporte->set('month',isset($_GET['month']) ? $_GET['month'] :date('m'));
          $data=$this->reporte->inprimir_todos();
          $this->pdf->loadPDF($this,"printall","landscape",$data);
     }
     public function ver($id){
         $this->reporte->set('id',$id);
         $data=$this->reporte->ver();
         echo json_encode($data);
     }
}
 ?>
