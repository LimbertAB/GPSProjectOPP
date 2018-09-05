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
     public function crear(){
          $this->reporte->set("id_chofer",$_POST['id_chofer']);
          $this->reporte->set("id_vehiculo",$_POST['id_vehiculo']);
          $this->reporte->set("unidad",$_POST['unidad']);
          $this->reporte->set("objetivo", $_POST['objetivo']);
          $this->reporte->set("uso",$_POST['uso']);
          $this->reporte->set("lugar",$_POST['lugar']);
          $this->reporte->set("fecha_de",$_POST['fecha_de']);
          $this->reporte->set("fecha_hasta",$_POST['fecha_hasta']);
          $this->reporte->set("id_responsable",$_POST['id_responsable']);
          $resultado=$this->reporte->crear();
          echo $resultado;
     }
     public function editar($id){
          $this->reporte->set("id",$id);
          $this->reporte->set("id_chofer",$_POST['id_chofer']);
          $this->reporte->set("id_vehiculo",$_POST['id_vehiculo']);
          $this->reporte->set("unidad",$_POST['unidad']);
          $this->reporte->set("objetivo", $_POST['objetivo']);
          $this->reporte->set("uso",$_POST['uso']);
          $this->reporte->set("lugar",$_POST['lugar']);
          $this->reporte->set("fecha_de",$_POST['fecha_de']);
          $this->reporte->set("fecha_hasta",$_POST['fecha_hasta']);
          $this->reporte->set("id_responsable",$_POST['id_responsable']);
          $this->reporte->set("responsable_estado",$_POST['responsable_estado']);
          $this->reporte->set("id_reporte_responsable",$_POST['id_reporte_responsable']);
         $resultado=$this->reporte->editar();
         echo $resultado;
     }
     public function eliminar($id){
         $this->reporte->set('id',$id);
         $this->reporte->eliminar();
     }
     public function alta($id){
         $this->reporte->set('id',$id);
         $this->reporte->alta();
     }
}
 ?>
