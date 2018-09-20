<?php
class PdfJspdf{
     public $users= array('Super','Administrador','Transporte');
     function loadPDF($controller,$view,$resultado){
          $tipo_user="";
          $session=Session::getSession('Usuario');
          if ($session!=null) {
               $tipo_user=$this->users[$session['tipo']];
          }
          $controllers =get_class($controller);
          require VIEWS.$tipo_user.'/'.$controllers.'/'.$view.'.php';
     }
}
?>
