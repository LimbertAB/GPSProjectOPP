<?php
class Views{
     public $users= array('Super','Administrador','Transporte');
     public $headers= array('sup_','adm_','tra_');
     function render($controller,$view,$resultado){ //Controlador,Vista, data
          $tipo_user="";$head="";
          $session=Session::getSession('Usuario');
          if ($session!=null) {
               $tipo_user=$this->users[$session['tipo']];
               $head=$this->headers[$session['tipo']];
          }
          $controllers =get_class($controller);
          $foo= $controllers==='Index' ? '' : "all_";
          require VIEWS.DFT.$head.'head.php';
          require VIEWS.$tipo_user.'/'.$controllers.'/'.$view.'.php';
          require VIEWS.DFT.$foo.'footer.php';
     }
}
 ?>
