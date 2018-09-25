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
     public function printpdf($id){
          $this->gps->set('id',$id);
          $resultado=$this->gps->imprimir();
         echo json_encode($resultado);
     }
     public function ver_car($id){
         $this->gps->set('id',$id);
         $this->gps->set('year',isset($_GET['date']) ? substr($_GET['date'], 0, -4) : date('Y'));
         $this->gps->set('month',isset($_GET['date']) ? substr($_GET['date'], 4, -2) : date('m'));
         $this->gps->set('day',isset($_GET['date']) ? substr($_GET['date'], -2) : date('d'));
         $resultado=$this->gps->ver_vehiculo();
         $this->view->render($this,"location",$resultado);
     }
     public function ver_people($id){
         $this->gps->set('id',$id);
         $this->gps->set('year',isset($_GET['date']) ? substr($_GET['date'], 0, -4) : date('Y'));
         $this->gps->set('month',isset($_GET['date']) ? substr($_GET['date'], 4, -2) : date('m'));
         $this->gps->set('day',isset($_GET['date']) ? substr($_GET['date'], -2) : date('d'));
         $resultado=$this->gps->ver_chofer();
         $this->view->render($this,"location",$resultado);
     }
}
 ?>
