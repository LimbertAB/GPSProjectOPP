<?php
class Boleta extends Controllers{
     private $boleta;
     function __construct(){
          parent::__construct();
          $this->boleta=parent::loadClassmodels("BoletaModel");
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
}
 ?>
