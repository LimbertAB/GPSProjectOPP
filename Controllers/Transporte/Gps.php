<?php
class Gps extends Controllers{
     private $gps;
     function __construct(){
          parent::__construct();
          $this->gps=parent::loadClassmodels("GpsModel");
     }
     public function index(){
          $this->gps->set('year',isset($_GET['date']) ? substr($_GET['date'], 0, -4) : date('Y'));
          $this->gps->set('month',isset($_GET['date']) ? substr($_GET['date'], 4, -2) : date('m'));
          $this->gps->set('day',isset($_GET['date']) ? substr($_GET['date'], -2) : date('d'));
          $resultado=$this->gps->listar();
          $this->view->render($this,"index",$resultado);
     }
     public function printonepdf($id){
          $this->gps->set('id',$id);
          $this->gps->set('year',isset($_GET['year']) ? $_GET['year'] :date('Y'));
          $this->gps->set('month',isset($_GET['month']) ? $_GET['month'] :date('m'));
          $data=$this->gps->imprimir_uno();
          $this->pdf->loadPDF($this,"printone","landscape",$data);
     }
     public function ver($id){
         $this->gps->set('id',$id);
         $data=$this->gps->ver();
         echo json_encode($data);
     }
     public function crear(){
          $this->gps->set("id_chofer",$_POST['id_chofer']);
          $this->gps->set("id_vehiculo",$_POST['id_vehiculo']);
          $this->gps->set("unidad",$_POST['unidad']);
          $this->gps->set("objetivo", $_POST['objetivo']);
          $this->gps->set("uso",$_POST['uso']);
          $this->gps->set("lugar",$_POST['lugar']);
          $this->gps->set("fecha_de",$_POST['fecha_de']);
          $this->gps->set("fecha_hasta",$_POST['fecha_hasta']);
          $this->gps->set("id_responsable",$_POST['id_responsable']);
          $resultado=$this->gps->crear();
          echo $resultado;
     }
}
 ?>
