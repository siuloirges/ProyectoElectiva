<?php
session_start();
require_once 'C:/UwAmp/www/ProyectoElectiva/app/models/Cdc.php';
require_once 'C:/UwAmp/www/ProyectoElectiva/app/Repository/StorageImage.php';

if(! @$_SESSION['userAuth.name']){
    header('Location: /ProyectoElectiva/');
    $_SESSION['last_message'] = 'su session a Terminado'; 
}

if(@$_REQUEST['action'] == 'store'){
    CDCController::store();
}

if(@$_REQUEST['action'] == 'update'){
    CDCController::update( @$_REQUEST['id'] );
}

if(@$_REQUEST['action'] == 'delete'){
    CDCController::delete( @$_REQUEST['id'] );
}

class CDCController {

    public static function index(){
      $Cdc = Cdc::all();
      $_SESSION['Cdcs'] = $Cdc;
    }

    public static function store(){ 



        $ruta = StorageImage::saveImage();
        
    
        try {

            $Cdc = new Cdc();
            $Cdc->name = $_REQUEST['name'];
            $Cdc->description =  $_REQUEST['description'];
            $Cdc->file_url = $ruta;
            $Cdc->save();

            $_SESSION['last_message'] = "El Requisito se a guardado correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/cdc/');

            return true;      

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/Cdc/');

            return false;     

        }


          
    }

    
    
    public static function update($id){
        
        $ruta = StorageImage::saveImage();
        
        try {

            $Cdc = Cdc::find($id);
            $Cdc->name =  $_REQUEST['name'];
            $Cdc->description = $_REQUEST['description'];

            if ( $ruta )
            $Cdc->file_url = $ruta;
            $Cdc->save();
            

            $_SESSION['last_message'] = "El Ensayo se a Actualizado correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/Cdc/');

            return true;      

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/cdc/');

            return false;     

        }


    }

    public static function find($id){

        try {

            $Cdc = Cdc::find($id);
            
            $_SESSION['cdc'] = $Cdc;

            return $Cdc;

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/cdc/');

            return false;     

        }

    }

    public static function delete($id){


        try {

            $Cdc = Cdc::find($id);
            $Cdc->delete();

            $_SESSION['last_message'] = "El Ensayo se elimino correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/cdc/');

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/cdc/');

            return false;     

        }


    }

    





}
