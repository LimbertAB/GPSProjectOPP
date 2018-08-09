<?php
class Vehiculo extends Controllers{
     private $vehiculo;
     function __construct(){
          parent::__construct();
          $this->vehiculo=parent::loadClassmodels("VehiculoModel");
     }
     public function index(){
         $resultado=$this->vehiculo->listar();
         $this->view->render($this,"index","administrador","adm_",$resultado);
     }
     public function ver($id){
         $this->vehiculo->set('id',$id);
         $data=$this->vehiculo->ver();
         echo json_encode($data);
     }
     public function crear(){
          $this->vehiculo->set("id_marca",$_POST['id_marca']);
          $this->vehiculo->set("tipo",$_POST['tipo']);
          $this->vehiculo->set("color",$_POST['color']);
          $this->vehiculo->set("placa", $_POST['placa']);
          $this->vehiculo->set("age",$_POST['age']);
          $resultado=$this->vehiculo->crear();
          echo $resultado;
     }
     public function editar($id){
          $this->vehiculo->set('id',$id);
          $this->vehiculo->set("id_marca",$_POST['id_marca']);
         $this->vehiculo->set("tipo",$_POST['tipo']);
         $this->vehiculo->set("color",$_POST['color']);
         $this->vehiculo->set("placa", $_POST['placa']);
         $this->vehiculo->set("placa_original", $_POST['placa_original']);
         $this->vehiculo->set("age",$_POST['age']);
         $resultado=$this->vehiculo->editar();
         echo $resultado;
     }
     public function eliminar($id){
         $this->vehiculo->set('id',$id);
         $this->vehiculo->eliminar();
     }
     public function alta($id){
         $this->vehiculo->set('id',$id);
         $this->vehiculo->alta();
     }
     public function userLogin(){
          if (isset($_POST['ci']) && isset($_POST['password'])) {
               $this->vehiculo->set("ci",$_POST['ci']);
               $this->vehiculo->set("password",$_POST['password']);
               $data=$this->vehiculo->login();
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
