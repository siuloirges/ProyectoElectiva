<?php

    require_once 'C:/UwAmp/www/ProyectoElectiva/app/controllers/LabController.php';
    require_once 'C:/UwAmp/www/ProyectoElectiva/app/models/Lab.php';

    LabController::find($_REQUEST['id']);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Home</title> 
    <!-- <link rel="stylesheet" href="../../../utils/css/all.css"> -->

    <!-- <link rel="stylesheet" href="./css/usuarios.css"> -->
    <link rel="stylesheet" href="../../../utils/css/forms/form.css">
    <!-- <link rel="stylesheet" href="../../utils/css/cruds/crud.css"> -->
    <link rel="stylesheet" href="../../../utils/css/all.css">

</head>
<body>
    
    <side-bar> </side-bar>

    <section class="home">

 
        <div class="row">
            <ion-icon  class= "prymary-icon" name="flask-outline"></ion-icon>
            <h1 class="text">  Detalle de la Muestra </h1>
        </div>
        <br>

        <!-- <div class="mesaje">
            <ion-icon class='icon-info' name="information-circle-outline"></ion-icon>
            <p>El Usuario se a guardado correctamente.</p>
        </div>  -->

        <div class="form-contain">

                
            <div class="row back">
                 <ion-icon  onclick="history.back()" class= "prymary-icon" name="arrow-back-outline"></ion-icon>
                <h2> Informacion de la Muestra </h2>
            </div>
            
            <hr>

                    <div class="campos">
                     

                     <div class="campos">
                        <div class="campo">
                            <span> Nombre</span>
                            <input value="<?php echo  @$_SESSION['Lab']->name ?>" type="text" name="name" id="name" readonly> 
                        </div>
        
                        <div class="campo">
                            <span> Descripcion </span>
                            <input value="<?php echo  @$_SESSION['Lab']->description ?>" type="text" name="description" id="description" readonly> 
                        </div>
        
                        <div class="campo">
                            <span> Categoria </span>
                            <input value="<?php echo  @$_SESSION['Lab']->muestra ?>" type="text" name="muestra" id="muestra" readonly> 
                        </div>
        
                        <div class="campo">
                            <span>  Valor </span>
                            <input value="<?php echo  @$_SESSION['Lab']->value ?>" type="text" name="value" id="value" readonly> 
                        </div>
        
                        <div class="campo">
                            <span> Fecha </span>
                            <input  value="<?php echo  @$_SESSION['Lab']->fecha ?>" type="date" name="fecha" id="fecha" readonly> 
                        </div>


                        <input type="hidden" name="action" value="store">
                        <!-- <p>Asegurate que las contraseñas sean iguales</p> -->
        
                    </div>
        
                    </div>




        </div>

        

    



        

  
    </section>
    

    <script src="../../../utils/js/sidebar/SidebarScrtipt.js" type="module"></script>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>


    
</body>

</html>