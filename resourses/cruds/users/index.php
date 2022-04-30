<?php

    require_once 'C:/UwAmp/www/ProyectoElectiva/app/controllers/UsersController.php';
    UserController::index();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Home</title> 
    <link rel="stylesheet" href="../../utils/css/all.css">
    <!-- <link rel="stylesheet" href="./css/usuarios.css"> -->
    <link rel="stylesheet" href="../../utils/css/cruds/crud.css">

</head>
<body>
    
    <side-bar> </side-bar>  

    <section class="home">

 
        <div class="row">
            <ion-icon  class= "prymary-icon" name="person-circle-outline"></ion-icon>
            <h1 class="text">  Usuarios </h1>
        </div>
        <br>

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


                
                <form action="/ProyectoElectiva/app/controllers/UsersController.php" method="get">
                    <li class="filter">
                    <ion-icon class ='icon' name="search-outline"></ion-icon>

                        <select name="filter_type" id="filter_type">
                            <option value="id">ID</option>
                            <option value="name">Nombre</option>
                            <option value="last_name">Apellido</option>
                            <option value="identification_type">Tipo de documento</option>
                            <option value="identification_number">N° de documento </option>
                            <option value="phone_number">Telefono</option>
                            <option value="address">Direccion</option>
                            <option value="email">Email</option>
                        </select>

                        <input type="text" placeholder="Search" id="filter" name="filter">
                        <input type="hidden" name="action" value="filter">

                    </li>
                </form>


        </div>


        

        <table class="table scroll-box" >
           

                <tr class='cols scroll-box'>
                    <td class="col" class="scroll-box" > # </td>
                    <td class="col" class="scroll-box" > Nombre </td>
                    <td class="col" class="scroll-box" > Apellido </td>
                    <td class="col" class="scroll-box" > Email </td>
                    <td class="col" class="scroll-box" > Telefono </td>
                    <td class="col" class="scroll-box" > Direccion </td>
                    <td class="col" class="scroll-box" > Tipo de documento </td>
                    <td class="col" class="scroll-box" > N° de documento </td>
                </tr>



                <?php
              
                    foreach ( $_SESSION['users'] as $item ){
                        // var_dump($_SESSION['users'][0]->name);
                        echo ' <tr>
                                    <td scope="row">  '.@$item->id.'</td>
                                    <td class="scroll-box"> '.@$item->name.' </td>
                                    <td class="scroll-box"> '.@$item->last_name.'</td>
                                    <td class="scroll-box"> '.@$item->email.' </td>
                                    <td class="scroll-box"> '.@$item->phone_number.' </td>
                                    <td class="scroll-box"> '.@$item->address.' </td>
                                    <td class="scroll-box"> '.@$item->identification_type.' </td>
                                    <td class="scroll-box"> '.@$item->identification_number.' </td>
                
                                    <td class="scroll-box row-ations"> 
                                    
                                        <a href="#" onclick="window.location.href = `form/edit.php?id='.@$item->id.'` " >
                                            <ion-icon name="create-outline" ></ion-icon>
                                        </a>
                                        
                                        <a href="#" onclick="window.location.href = `form/view.php?id='.@$item->id.'` " >
                                            <ion-icon name="eye-outline"></ion-icon>
                                        </a>

                                        
                    
                                        <a href="#" onclick="deleteById('.$item->id.')">
                                                <ion-icon name="trash-outline"></ion-icon>
                                        </a>
                                    
                                    </td>
                            </tr>';
                    }

                ?>

                    

        </table>
  
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

                window.location.href = "http://localhost/ProyectoElectiva/app/controllers/UsersController.php?action=delete&id="+id;

            
              
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