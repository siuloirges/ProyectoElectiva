<?php

    require_once 'C:/UwAmp/www/ProyectoElectiva/app/controllers/EssaysController.php';

    EssaysController::index();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Home</title> 
    <link rel="stylesheet" href="../../utils/css/all.css">
    <!-- <link rel="stylesheet" href="./css/rules.css"> -->
    <link rel="stylesheet" href="../../utils/css/cruds/crud.css">
    <!-- <link rel="stylesheet" href="resourses/utils/css/cruds/crud.css"> -->

</head>
<body>
    
    <side-bar> </side-bar>

    <section class="home">

 
        <div class="row">
            <ion-icon  class= "prymary-icon" name="newspaper-outline"></ion-icon>
            <h1 class="text">  Esayos </h1>
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


                
                <li class="filter">
                  <ion-icon class ='icon' name="search-outline"></ion-icon>
                  <input type="text" placeholder="Search" id="search">
              </li>


        </div>


        

        <table class="table scroll-box" >
           

                <tr class='cols scroll-box'>
                    <td class="col" class="scroll-box" > # </td>
                    <td class="col" class="scroll-box" >Nombre </td>
                    <td class="col" class="scroll-box" >Descripcion del ensayo </td>
                    <td class="col" class="scroll-box" >Archivo adjunto</td>

                    <!-- <td class="col" class="scroll-box" >Acciones</td> -->
                </tr>


                <?php
              
                    foreach ( $_SESSION['Essays'] as $item ){
                        // var_dump($_SESSION['users'][0]->name);
                        echo '
                        <tr class="tr-row">
                            <td scope="row" class="scroll-box">  1 </td>
                            <td class="scroll-box"> '.$item->name.' </td>
                            <td class="scroll-box"> '.$item->description.' </td>
                            <td class="scroll-box">  <a id="download" href="'.'/ProyectoElectiva/app/'.str_ireplace('../','',$item->file_url).'"><ion-icon  name="download-outline"></ion-icon> </ion-icon> Descargar Documento</a>
                             </td>
        
                            
                            <td class="scroll-box row-ations"> 
                               
                                <a href="#" onclick="window.location.href = `form/edit.php?id='.@$item->id.'`">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
        
                                <a href="#">
                                    <ion-icon onclick="window.location.href = `form/view.php?id='.@$item->id.'` " name="eye-outline"></ion-icon>
                                </a>
                               
                                <a href="#" onclick="deleteById('.$item->id.')">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                                
                            </td>
        
                        </tr>';
                    }

                ?>


                
                <!-- <tr class="tr-row">
                    <td scope="row" class="scroll-box">  1 </td>
                    <td class="scroll-box"> Sangria </td>
                    <td class="scroll-box"> El requisito deve cumplir con una sangria del 10% de cada lado sin caracteres, guiones, espacios, puntos ni comas que sobresalgan atravez de el. </td>
                    <td class="scroll-box"> google.com </td>

                    
                    <td class="scroll-box row-ations"> 
                       
                        <a href="">
                            <ion-icon name="create-outline"></ion-icon>
                        </a>

                        <a href="">
                            <ion-icon name="eye-outline"></ion-icon>
                        </a>
                       
                       <a href="#" onclick="alert_sw()">
                            <ion-icon name="trash-outline"></ion-icon>
                       </a>
                        
                    </td>

                </tr> -->


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

                window.location.href = "http://localhost/ProyectoElectiva/app/controllers/EssaysController.php?action=delete&id="+id;

            
              
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