<?php
     class PrincipalModel extends Conexion{
          public $user_id;
          public $session;
          function __construct(){
               parent::__construct();
               $this->session=Session::getSession('Usuario');
               if (isset($this->session)){
                    $this->user_id=$this->session['id_persona'];
               }
          }
          public function set($atributo,$contenido){
               $this->$atributo=$contenido;
          }
          public function get($atributo){
               return $this->$atributo;
          }
          public function listar(){
               $profile=parent::consultaRetorno("SELECT p.*,u.ci,u.id as id_usuario FROM persona as p JOIN usuario as u ON u.id_persona=p.id WHERE p.id='{$this->user_id}' LIMIT 1");
               $chofer="SELECT nombre,brevet,id FROM persona WHERE tipo=3";
               $vehiculo="SELECT CONCAT(v.tipo,' - ',m.nombre) as nombre,v.placa,v.id FROM vehiculo as v JOIN marca as m ON m.id=v.id_marca";
               $responsable="SELECT CONCAT(nombre,' ',apellido) as nombre,ci,id FROM responsable";
               $boletas=parent::consultaRetorno("SELECT b.id,p.nombre,b.objetivo,b.fecha_de,b.fecha_hasta FROM boleta as b JOIN persona as p ON p.id=b.id_chofer WHERE b.estado=1");
               $all = array();while($row = mysql_fetch_assoc($boletas)) {$all[] = $row;}
               $result=["profile"=> mysql_fetch_assoc($profile),
                         "chofer"=> parent::consultaRetorno($chofer),
                         "vehiculo"=> parent::consultaRetorno($vehiculo),
                         "responsable"=> parent::consultaRetorno($responsable),
                         "boletas"=>$all
               ];
               return $result;
          }
          public function ver(){

          }
          public function crear(){

          }
          public function editar_profile(){
               $_SESSION["Usuario"]['nombre']=$this->nombre;
               if($this->ci==""){
                    if($this->password != ""){
                         $password_insert=password_hash($this->password, PASSWORD_BCRYPT);
                         $sql=("UPDATE usuario SET password='{$password_insert}' WHERE id='{$this->id}'");
                         parent::consultaSimple($sql);
                         $sql2=("UPDATE persona SET nombre='{$this->nombre}' WHERE id='{$this->id_persona}'");
                         parent::consultaSimple($sql2);
                         return "Perfil modificado Satisfactoriamente";
                    }else{
                         $sql=("UPDATE persona SET nombre='{$this->nombre}' WHERE id='{$this->id_persona}'");
                         parent::consultaSimple($sql);
                         return "Perfil modificado Satisfactoriamente";
                    }
               }else{
                    $ver_ci=$this->ver_ci();
                    if($ver_ci != 0){
                         return "false";
                    }else{
                         if($this->password != ""){
                              $password_insert=password_hash($this->password, PASSWORD_BCRYPT);
                              $sql2=("UPDATE usuario SET ci='{$this->ci}',password='{$password_insert}' WHERE id='{$this->id}'");
                         }else{
                              $sql2=("UPDATE usuario SET ci='{$this->ci}' WHERE id='{$this->id}'");
                         }
                         parent::consultaSimple($sql2);
                         $sql3=("UPDATE persona SET nombre='{$this->nombre}' WHERE id='{$this->id_persona}'");
                         parent::consultaSimple($sql3);
                         return "Perfil modificado Satisfactoriamente";
                    }
               }
          }
          public function ver_ci(){
               $sql="SELECT * FROM usuario WHERE ci='{$this->ci}'";
               $resultado=parent::consultaRetorno($sql);
               return mysql_num_rows($resultado);
          }

     }
 ?>
