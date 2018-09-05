<?php
class Cronograma extends Controllers{
     private $cronograma;
     function __construct(){
          parent::__construct();
          $this->cronograma=parent::loadClassmodels("CronogramaModel");
     }
     public function index(){
         $resultado=$this->cronograma->listar();
         $this->view->render($this,"index",$resultado);
     }
     public function ver($id){
         $this->cronograma->set('id',$id);
         $data=$this->cronograma->ver();
         echo json_encode($data);
     }
     public function crear(){
          $this->cronograma->set("id_marca",$_POST['id_marca']);
          $this->cronograma->set("tipo",$_POST['tipo']);
          $this->cronograma->set("color",$_POST['color']);
          $this->cronograma->set("placa", $_POST['placa']);
          $this->cronograma->set("age",$_POST['age']);
          $resultado=$this->cronograma->crear();
          echo $resultado;
     }
     public function editar($id){
          $this->cronograma->set('id',$id);
          $this->cronograma->set("id_marca",$_POST['id_marca']);
         $this->cronograma->set("tipo",$_POST['tipo']);
         $this->cronograma->set("color",$_POST['color']);
         $this->cronograma->set("placa", $_POST['placa']);
         $this->cronograma->set("placa_original", $_POST['placa_original']);
         $this->cronograma->set("age",$_POST['age']);
         $resultado=$this->cronograma->editar();
         echo $resultado;
     }
     public function eliminar($id){
         $this->cronograma->set('id',$id);
         $this->cronograma->eliminar();
     }
     public function alta($id){
         $this->cronograma->set('id',$id);
         $this->cronograma->alta();
     }
     public function userLogin(){
          if (isset($_POST['ci']) && isset($_POST['password'])) {
               $this->cronograma->set("ci",$_POST['ci']);
               $this->cronograma->set("password",$_POST['password']);
               $data=$this->cronograma->login();
               if ($data!="false") {
                    $this->createSession($data);
                    $rows= json_encode($data);
                    echo $rows;
               }else{echo false;}
         }
     }
     function createSession($user){
          Session::setSession('User',$user);
     }
     function destroySession(){
          Session::destroy();
          header('Location:'.URL);
     }
}
 ?>
