<?php

    require_once 'C:/UwAmp/www/ProyectoElectiva/app/controllers/LabController.php';
    require_once 'C:/UwAmp/www/ProyectoElectiva/app/models/Lab.php';

    LabController::index();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title> 
    <link rel="stylesheet" href="../../utils/css/all.css">
    <link rel="stylesheet" href="../../utils/css/cruds/crud.css">
    

</head>
<body>
    
    <side-bar> </side-bar>

    <section class="home">

    <div class="row">
            <ion-icon  class= "prymary-icon" name="flask-outline"></ion-icon>
            <h1 class="text">  Laboratorio </h1>
        </div>
        <br>

        <div class="contain">



        <marquee direction="right"> 

        <?php
              
              foreach ( $_SESSION['Labs'] as $item ){
                  // var_dump($_SESSION['users'][0]->name);
                  echo '| '.$item->name.' ';
              }

          ?>

        </marquee>

        <?php
            
            if( @$_SESSION['last_message'] ){
                echo  '

                    <div class="mesaje">
                    <ion-icon class="icon-info" name="information-circle-outline"></ion-icon>
                    <p>'.$_SESSION['last_message'].'</p>
                    </div>
                
                ';
                $_SESSION['last_message'] = null;
            }
            
        ?>


            <div class="actions">

<div  onclick="window.location.href = './form/create.php'" class="buttom add" style="background: #00a65a; "> 
    <ion-icon name="add-circle-outline"></ion-icon>
     <a >Añadir</a>
</div>

<div class="buttom import" style="background: #3c8dbc;"> 
    <ion-icon name="cloud-upload-outline"></ion-icon>
    <a href="#">Importar</a>
</div>

<div class="buttom export" style="background:  #3c8dbc;"> 
    <ion-icon name="cloud-download-outline"></ion-icon>
    <a href="#">Exportar</a>
</div>



<form action="/ProyectoElectiva/app/controllers/LabController.php" method="get">
    <li class="filter">
    <ion-icon class ='icon' name="search-outline"></ion-icon>

        <select name="filter_type" id="filter_type">
            <option value="id">ID</option>
            <option value="name">Nombre</option>
            <option value="last_name">Descripcion</option>
            <option value="identification_type">Categoria</option>
            <option value="identification_number">valor</option>
            <option value="phone_number">Fecha</option>
        </select>

        <input type="text" placeholder="Search" id="filter" name="filter">
        <input type="hidden" name="action" value="filter">

    </li>
</form>


</div>
            <table class="table scroll-box" >


                <tr class='cols scroll-box'>
                    <td class="col" class="scroll-box" > # </td>
                    <td class="col" class="scroll-box" >Nombre </td>
                    <td class="col" class="scroll-box" >Descripcion del la Muestra</td>
                    <td class="col" class="scroll-box" >Categoria</td>
                    <td class="col" class="scroll-box" >valor de la muestra</td>
                    <td class="col" class="scroll-box" >Fecha</td>
                </tr>

               

                
                <?php
              
                    foreach ( $_SESSION['Labs'] as $item ){
                        // var_dump($_SESSION['users'][0]->name);
                        echo '
                        <tr>
                            <td scope="row" class="scroll-box">  '.$item->id.' </td>
                            <td class="scroll-box"> '.$item->name.'  </td>
                            <td class="scroll-box"> '.$item->description.' </td>
                            <td class="scroll-box"> '.$item->muestra.' </td>
                            <td class="scroll-box"> '.$item->value.' </td>
                            <td class="scroll-box">'.$item->fecha.' </td>
        
                            <td class="scroll-box row-ations"> 
                         
    
                            <a href="#">
                                <ion-icon onclick="window.location.href = `form/view.php?id='.@$item->id.'` " name="eye-outline"></ion-icon>
                            </a>
                           
                            <a href="#" onclick="deleteById('.$item->id.')">
                                <ion-icon name="trash-outline"></ion-icon>
                            </a>
                            
                        </td>
                            
                        </td>
                       </tr>';
                    }

                ?>
                



        </table>     

        



    

        </div>
        
    </section>

    <script src="../../utils/js/sidebar/SidebarScrtipt.js" type="module"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function deleteById(id){
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: '¿Estas seguro?',
            text: "Esta accion no se puede deshacer",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'No, conservar',
            reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {

                window.location.href = "http://localhost/ProyectoElectiva/app/controllers/LabController.php?action=delete&id="+id;

            
              
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelado',
                'Tu registro esta seguro :)',
                'error'
                )
            }
            })
        }
</script>
</body>



</html>