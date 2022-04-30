<?php

    require_once 'C:/UwAmp/www/ProyectoElectiva/app/controllers/EssaysController.php';

    EssaysController::find( @$_REQUEST['id'] );
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
    <link rel="stylesheet" href = "../../../utils/css/all.css">
    <link rel="stylesheet" href = "../css/rules.css">
</head>
<body>
    
    <side-bar> </side-bar>

    <section class="home">

 
        <div class="row">
            <ion-icon  class= "prymary-icon" name="newspaper-outline"></ion-icon>
            <h1 class="text">  Mira un Ensayo </h1>
        </div>
        <br>

        <!-- <div class="mesaje">
            <ion-icon class='icon-info' name="information-circle-outline"></ion-icon>
            <p>El Usuario se a guardado correctamente.</p>
        </div>  -->

        <div class="form-contain">

            <div class="row back">
                 <ion-icon  onclick="history.back()" class= "prymary-icon" name="arrow-back-outline"></ion-icon>
                <h2>Informacion del Ensayo</h2>
            </div>
            <hr>
            <form action="#" method="post" enctype="multipart/form-data">
                
                    <div class="campos">

                        <div class="campo">
                            <span> Nombre</span>
                            <input value="<?php echo  @$_SESSION['essay']->name ?>" type="text" name="name" id="name" readonly> 
                        </div>
        
                        <div class="campo">
                            <span>  Descripcion del Ensayo </span>
                            <input type="text" value="<?php echo  @$_SESSION['essay']->description ?>" name="description" id="description" readonly> 
                        </div>

                        <div class="campo">
                        
                            <a id="download" href="<?= '/ProyectoElectiva/app/'.str_ireplace('../','',@$_SESSION['rule']->file_url) ?>"><ion-icon  name="download-outline"></ion-icon> </ion-icon> Documento</a>
                        </div>

                        <!-- <p>Asegurate que las contraseñas sean iguales</p> -->
        
                    </div>

            </form>

        </div>

        

    



        

  
    </section>
    

    <script src="../js/validateForm.js"></script>

    <script src="../../../utils/js/sidebar/SidebarScrtipt.js" type="module"></script>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>