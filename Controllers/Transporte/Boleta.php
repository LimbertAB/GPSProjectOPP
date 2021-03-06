<?php
class Boleta extends Controllers{
     private $boleta;
     function __construct(){
          parent::__construct();
          $this->boleta=parent::loadClassmodels("BoletaModel");
     }
     public function index(){
          $this->boleta->set('desde',isset($_GET['desde'])? $_GET['desde'] : date('Y-m-').'01');
          $this->boleta->set('hasta',isset($_GET['desde'])?$_GET['hasta'] : date('Y-m-t'));
          $resultado=$this->boleta->listar();
          $this->view->render($this,"index",$resultado);
     }
     public function ver($id){
         $this->boleta->set('id',$id);
         $data=$this->boleta->ver();
         echo json_encode($data);
     }
     public function printpdf($id){
          $this->boleta->set('id',$id);
          $data=$this->boleta->ver();
          $this->pdf->loadPDF($this,"print","portrait",$data);
     }
     public function crear(){
          $this->boleta->set("id_chofer",$_POST['id_chofer']);
          $this->boleta->set("id_vehiculo",$_POST['id_vehiculo']);
          $this->boleta->set("id_unidad",$_POST['id_unidad']);
          $this->boleta->set("objetivo", $_POST['objetivo']);
          $this->boleta->set("uso",$_POST['uso']);
          $this->boleta->set("fecha_de",$_POST['fecha_de']);
          $this->boleta->set("fecha_hasta",$_POST['fecha_hasta']);
          $this->boleta->set("id_responsable",$_POST['id_responsable']);
          $this->boleta->set("id_establecimiento",$_POST['id_establecimiento']);
          $this->boleta->set("id_municipio",$_POST['id_municipio']);
          $this->boleta->set("id_redsalud",$_POST['id_redsalud']);
          $this->boleta->set("tipo_lugar",$_POST['tipo_lugar']);
          $this->boleta->set("ciudad",$_POST['ciudad']);
          $this->boleta->set("lugar",$_POST['lugar']);
          $resultado=$this->boleta->crear();
          echo $resultado;
     }
     public function editar($id){
          $this->boleta->set("id",$id);
          $this->boleta->set("id_chofer",$_POST['id_chofer']);
          $this->boleta->set("id_vehiculo",$_POST['id_vehiculo']);
          $this->boleta->set("id_unidad",$_POST['id_unidad']);
          $this->boleta->set("objetivo", $_POST['objetivo']);
          $this->boleta->set("uso",$_POST['uso']);
          $this->boleta->set("fecha_de",$_POST['fecha_de']);
          $this->boleta->set("fecha_hasta",$_POST['fecha_hasta']);
          $this->boleta->set("id_responsable",isset($_POST['id_responsable']) ?$_POST['id_responsable']:[]);
          $this->boleta->set("responsable_estado",isset($_POST['responsable_estado']) ? $_POST['responsable_estado']:[]);
          $this->boleta->set("id_boleta_responsable",isset($_POST['id_boleta_responsable']) ? $_POST['id_boleta_responsable']:[]);
          $this->boleta->set("id_establecimiento",$_POST['id_establecimiento']);
          $this->boleta->set("id_municipio",$_POST['id_municipio']);
          $this->boleta->set("id_redsalud",$_POST['id_redsalud']);
          $this->boleta->set("tipo_lugar",$_POST['tipo_lugar']);
          $this->boleta->set("ciudad",$_POST['ciudad']);
          $this->boleta->set("lugar",$_POST['lugar']);
         $resultado=$this->boleta->editar();
         echo $resultado;
     }
     public function eliminar($id){
         $this->boleta->set('id',$id);
         $this->boleta->eliminar();
     }
     public function alta($id){
         $this->boleta->set('id',$id);
         $this->boleta->alta();
     }
}
 ?>
