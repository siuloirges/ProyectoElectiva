<?php
session_start();
require_once 'C:/UwAmp/www/ProyectoElectiva/app/models/Essays.php';
require_once 'C:/UwAmp/www/ProyectoElectiva/app/Repository/StorageImage.php';

if(! @$_SESSION['userAuth.name']){
    header('Location: /ProyectoElectiva/');
    $_SESSION['last_message'] = 'su session a Terminado'; 
}

if(@$_REQUEST['action'] == 'store'){
    EssaysController::store();
}

if(@$_REQUEST['action'] == 'update'){
    EssaysController::update( @$_REQUEST['id'] );
}

if(@$_REQUEST['action'] == 'delete'){
    EssaysController::delete( @$_REQUEST['id'] );
}

class EssaysController {

    public static function index(){
      $Essays = Essays::all();
      $_SESSION['Essays'] = $Essays;
    }

    public static function store(){ 



        $ruta = StorageImage::saveImage();
        
    
        try {

            $Essays = new Essays();
            $Essays->name = $_REQUEST['name'];
            $Essays->description =  $_REQUEST['description'];
            $Essays->file_url = $ruta;
            $Essays->save();

            $_SESSION['last_message'] = "El Requisito se a guardado correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/Essays/');

            return true;      

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/Essays/');

            return false;     

        }


          
    }

    
    
    public static function update($id){
        
        $ruta = StorageImage::saveImage();
        
    
        try {

            $Essays = Essays::find($id);
            $Essays->name =  $_REQUEST['name'];
            $Essays->description = $_REQUEST['description'];

            if ( $ruta )
            $Essays->file_url = $ruta;
            $Essays->save();

            $_SESSION['last_message'] = "El Ensayo se a Actualizado correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/Essays/');

            return true;      

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/Essays/');

            return false;     

        }


    }

    public static function find($id){

        try {

            $Essays = Essays::find($id);
            
            $_SESSION['essay'] = $Essays;

            return $Essays;

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/Essays/');

            return false;     

        }

    }

    public static function delete($id){


        try {

            $Essays = Essays::find($id);
            $Essays->delete();

            $_SESSION['last_message'] = "El Ensayo se elimino correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/Essays/');

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/Essays/');

            return false;     

        }


    }

    





}
