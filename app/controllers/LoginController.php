

<?php
require_once 'C:/UwAmp/www/ProyectoElectiva/app/controllers/UsersController.php';

if(! @$_SESSION['userAuth.name']){
    header('Location: /ProyectoElectiva/');
    $_SESSION['last_message'] = 'su session a Terminado'; 
}

if(  $_REQUEST["action"] == 'login' ){

    if( $_REQUEST["frist"] == 'true'){

        UserController::index();

        foreach ($_SESSION["users"] as $item){
            
            if($item->email ==  $_REQUEST["email"]){
                header('Location: /ProyectoElectiva/');
                $_SESSION['last_message'] = 'El nombre de usuario '.$_REQUEST["email"].' Ya existe'; 
                exit;
            }

        
        }
       
        $user = new User();
        $user->name =  $_REQUEST["email"];
        $user->last_name = " ";
        $user->identification_type = "0";
        $user->identification_number =  "0";
        $user->phone_number = "0";
        $user->address = "0";
        $user->email =  $_REQUEST["email"];
        $user->password = $_REQUEST["password"];
        $user->save();
    }


    UserController::index();

    foreach ($_SESSION["users"] as $item){
        
        if($item->email == $_REQUEST["email"] && $item->password ==  $_REQUEST["password"]){

            header('Location: /ProyectoElectiva/resourses/home/');
            $_SESSION['userAuth.name'] = $item->name;
            $_SESSION['userAuth.last_name'] = $item->last_name;
            
        }else{
            header('Location: /ProyectoElectiva/');
            $_SESSION['last_message'] = 'Nombre de Usuario y/o Contraseña incorrectos.'; 
        }

        

    }



}else{

    if( @$_SESSION['userAuth.name'] == null ){

    }else{
        header('Location: /ProyectoElectiva/');
        $_SESSION['last_message'] = 'su session a Terminado'; 
    }

   
 
}

