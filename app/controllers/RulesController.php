<?php
session_start();

require_once 'C:/UwAmp/www/ProyectoElectiva/app/models/Rule.php';
require_once 'C:/UwAmp/www/ProyectoElectiva/app/Repository/StorageImage.php';


if(! @$_SESSION['userAuth.name']){
    header('Location: /ProyectoElectiva/');
    $_SESSION['last_message'] = 'su session a Terminado'; 
}

if(@$_REQUEST['action'] == 'store'){
    RulesController::store();
}

if(@$_REQUEST['action'] == 'update'){
    RulesController::update( @$_REQUEST['id'] );
}

if(@$_REQUEST['action'] == 'delete'){
    RulesController::delete( @$_REQUEST['id'] );
}

class RulesController {

    public static function index(){
      $Rules = Rule::all();
      $_SESSION['Rules'] = $Rules;
    }

    public static function store(){ 



        $ruta = StorageImage::saveImage();
        
    
        try {

            $Rules = new Rule();
            $Rules->name =  $_REQUEST['name'];
            $Rules->requirement_description =  $_REQUEST['requirement_description'];
            $Rules->file_url = $ruta;
            $Rules->save();

            $_SESSION['last_message'] = "El Requisito se a guardado correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/rules/');

            return true;      

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/rules/');

            return false;     

        }


          
    }

    
    
    public static function update($id){
        
        $ruta = StorageImage::saveImage();
        
    
        try {

            $rule = Rule::find($id);
            $rule->name =  $_REQUEST['name'];
            $rule->requirement_description = $_REQUEST['requirement_description'];

            if ( $ruta )
            $rule->file_url = $ruta;
            $rule->save();

            $_SESSION['last_message'] = "El Requisito se a Actualizado correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/rules/');

            return true;      

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/rules/');

            return false;     

        }


    }

    public static function find($id){

        try {

            $rule = Rule::find($id);
            
            $_SESSION['rule'] = $rule;

            return $rule;

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/rules/');

            return false;     

        }

    }

    public static function delete($id){


        try {

            $rule = Rule::find($id);
            $rule->delete();

            $_SESSION['last_message'] = "El Requisito se elimino correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/rules/');

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/rules/');

            return false;     

        }


    }

    





}
