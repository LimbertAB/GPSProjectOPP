<?php
     class Controllers{
          public function __construct(){
               $this->view=new Views();
               $this->jspdf=new PdfJspdf();
               $this->pdf=new Createpdf();
          }
          public function loadClassmodels($model){
               $path='Models/'.$model.'.php';
               if(file_exists($path)){
                    require $path;
                    return new $model();
               }else{
                    echo 'no hay modelo';
               }
          }
     }
 ?>
