<?php
session_start();
require_once 'C:/UwAmp/www/ProyectoElectiva/app/models/Lab.php';

if(! @$_SESSION['userAuth.name']){
    header('Location: /ProyectoElectiva/');
    $_SESSION['last_message'] = 'su session a Terminado'; 
}

if(@$_REQUEST['action'] == 'filter'){
    LabController::filter( @$_REQUEST['filter'] );
}

if(@$_REQUEST['action'] == 'store'){
    LabController::store();
}

if(@$_REQUEST['action'] == 'update'){
    LabController::update( @$_REQUEST['id'] );
}

if(@$_REQUEST['action'] == 'delete'){
    LabController::delete( @$_REQUEST['id'] );
}

class LabController {

    public static function index(){
      $Lab = Lab::all();
      $_SESSION['Labs'] = $Lab;
    }

    public static function store(){ 

        try {

            $Lab = new Lab();
            $Lab->name =  $_REQUEST['name'];
            $Lab->description =  $_REQUEST['description'];
            $Lab->muestra =  $_REQUEST['muestra'];
            $Lab->value =  $_REQUEST['value'];
            $Lab->fecha =  $_REQUEST['fecha'];
            $Lab->save();

            $_SESSION['last_message'] = "La Muestra se a guardado correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/lab/');

            return true;      

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/lab/');

            return false;     

        }


          
    }

    
    
    public static function update($id){
        try {

            $Lab = Lab::find($id);

            $Lab->name =  @$_REQUEST['name'];
            $Lab->last_name =  @$_REQUEST['last_name'];
            $Lab->identification_type =  @$_REQUEST['identification_type'];
            $Lab->identification_number =  @$_REQUEST['identification_number'];
            $Lab->phone_number =  @$_REQUEST['phone_number'];
            $Lab->address =  @$_REQUEST['address'];
            $Lab->email = @$_REQUEST['email'];
            $Lab->password =  @$_REQUEST['password'];

            $Lab->save();

            // $Lab = Lab::find($id);
            // var_dump($Lab);
            $_SESSION['last_message'] = "El usuario se Actualizo correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/lab/');

            return true;  
            
        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/lab/');

            return false;     

        }      
    }

    public static function find($id){

        try {

            $Lab = Lab::find($id);
            
            $_SESSION['Lab'] = $Lab;

            return $Lab;

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/lab/');

            return false;     

        }

    }

    public static function filter($filter){

        $filter = @trim($filter);
        try {

            $_SESSION['Labs'] = null;
            if(@$_REQUEST['filter_type']){
                $Lab = Lab::find('all',array('conditions' => array(@$_REQUEST['filter_type'].'=?',$filter)));
            }else{
                $Lab = Lab::find('all',array('conditions' => array('identification_number=?',$filter)));
            }

            $_SESSION['Lab'] = $Lab;
            // var_dump();
            if( @$_SESSION['Lab'][0]->id ){
                // $_SESSION['last_message'] = "Se encontro un Usuario";
                // $_SESSION['Labs'] = @unserialize($Lab);

                header('Location: /ProyectoElectiva/resourses/cruds/lab/form/view.php?id='.$_SESSION['Lab'][0]->id);
            }else{
                $_SESSION['last_message'] = "No se encontro un Usuario cuyo ".$_REQUEST['filter_type']." sea igual a: ".$filter;
                // var_dump("no se encontro nada");
                header('Location: /ProyectoElectiva/resourses/cruds/lab/');
                // $_SESSION['Labs'] = null;
            }
           
            // $_SESSION['Labs'] = $Lab;

            // var_dump($Lab);

            return $Lab;

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/lab/');

            return false;     

        }

    }

    public static function delete($id){

        try {

            $Lab = Lab::find($id);
            $Lab->delete();

            $_SESSION['last_message'] = "El Usuario se elimino correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/lab/');

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/lab/');

            return false;     

        }

    }



}