<?php
session_start();
require_once 'C:/UwAmp/www/ProyectoElectiva/app/models/User.php';

if(! @$_SESSION['userAuth.name']){
    header('Location: /ProyectoElectiva/');
    $_SESSION['last_message'] = 'su session a Terminado'; 
}

if(@$_REQUEST['action'] == 'filter'){
    UserController::filter( @$_REQUEST['filter'] );
}

if(@$_REQUEST['action'] == 'store'){
    UserController::store();
}

if(@$_REQUEST['action'] == 'update'){
    UserController::update( @$_REQUEST['id'] );
}

if(@$_REQUEST['action'] == 'delete'){
    UserController::delete( @$_REQUEST['id'] );
}

class UserController {

    public static function index(){
      $user = User::all();
      $_SESSION['users'] = $user;
    }

    public static function store(){ 

        try {

            $user = new User();
            $user->name =  $_REQUEST['name'];
            $user->last_name =  $_REQUEST['last_name'];
            $user->identification_type =  $_REQUEST['identification_type'];
            $user->identification_number =  $_REQUEST['identification_number'];
            $user->phone_number =  $_REQUEST['phone_number'];
            $user->address =  $_REQUEST['address'];
            $user->email =  $_REQUEST['email'];
            $user->password =  $_REQUEST['password'];
            $user->save();

            $_SESSION['last_message'] = "El usuario se a guardado correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/users/');

            return true;      

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/users/');

            return false;     

        }


          
    }

    
    
    public static function update($id){
        try {

            $user = User::find($id);

            $user->name =  @$_REQUEST['name'];
            $user->last_name =  @$_REQUEST['last_name'];
            $user->identification_type =  @$_REQUEST['identification_type'];
            $user->identification_number =  @$_REQUEST['identification_number'];
            $user->phone_number =  @$_REQUEST['phone_number'];
            $user->address =  @$_REQUEST['address'];
            $user->email = @$_REQUEST['email'];
            $user->password =  @$_REQUEST['password'];

            $user->save();

            // $user = User::find($id);
            // var_dump($user);
            $_SESSION['last_message'] = "El usuario se Actualizo correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/users/');

            return true;  
            
        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/users/');

            return false;     

        }      
    }

    public static function find($id){

        try {

            $user = User::find($id);
            
            $_SESSION['user'] = $user;

            return $user;

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/users/');

            return false;     

        }

    }

    public static function filter($filter){

        $filter = @trim($filter);
        try {

            $_SESSION['users'] = null;
            if(@$_REQUEST['filter_type']){
                $user = User::find('all',array('conditions' => array(@$_REQUEST['filter_type'].'=?',$filter)));
            }else{
                $user = User::find('all',array('conditions' => array('identification_number=?',$filter)));
            }

            $_SESSION['user'] = $user;
            // var_dump();
            if( @$_SESSION['user'][0]->id ){
                // $_SESSION['last_message'] = "Se encontro un Usuario";
                // $_SESSION['users'] = @unserialize($user);

                header('Location: /ProyectoElectiva/resourses/cruds/users/form/view.php?id='.$_SESSION['user'][0]->id);
            }else{
                $_SESSION['last_message'] = "No se encontro un Usuario cuyo ".$_REQUEST['filter_type']." sea igual a: ".$filter;
                // var_dump("no se encontro nada");
                header('Location: /ProyectoElectiva/resourses/cruds/users/');
                // $_SESSION['users'] = null;
            }
           
            // $_SESSION['users'] = $user;

         

          
          


            // var_dump($user);

            return $user;

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/users/');

            return false;     

        }

    }

    public static function delete($id){

        try {

            $user = User::find($id);
            $user->delete();

            $_SESSION['last_message'] = "El Usuario se elimino correctamente.";

            header('Location: /ProyectoElectiva/resourses/cruds/users/');

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /ProyectoElectiva/resourses/cruds/users/');

            return false;     

        }

    }



}