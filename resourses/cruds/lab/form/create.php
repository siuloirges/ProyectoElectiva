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
            <h1 class="text">  Crea una muestra </h1>
        </div>
        <br>

        <!-- <div class="mesaje">
            <ion-icon class='icon-info' name="information-circle-outline"></ion-icon>
            <p>El Usuario se a guardado correctamente.</p>
        </div>  -->

        <div class="form-contain">

            <div class="row back">
                 <ion-icon  onclick="history.back()" class= "prymary-icon" name="arrow-back-outline"></ion-icon>
                <h2>Informacion del la Muestra</h2>
            </div>
            <hr>
            <form action="/ProyectoElectiva/app/controllers/LabController.php" method="get">
                
                    <div class="campos">
                        <div class="campo">
                            <span> Nombre</span>
                            <input type="text" name="name" id="name" required> 
                        </div>
        
                        <div class="campo">
                            <span> Descripcion </span>
                            <input type="text" name="description" id="description" required> 
                        </div>
        
                        <div class="campo">
                            <span> Categoria </span>
                            <input required type="text" name="muestra" id="muestra"> 
                        </div>
        
                        <div class="campo">
                            <span>  Valor </span>
                            <input type="text" name="value" id="value" required> 
                        </div>
        
                        <div class="campo">
                            <span> Fecha </span>
                            <input type="date" name="fecha" id="fecha" required> 
                        </div>


                        <input type="hidden" name="action" value="store">
                        <!-- <p>Asegurate que las contraseñas sean iguales</p> -->
        
                    </div>


                
                    <div class="botons">
                        <input class="btn-dan" type="reset" value="Borrar formulario">
                        <input id="send-btn" class="btn-succ" type="submit"  value="Guardar Muestra">
                    </div>
            </form>

        </div>
        <span class='help' onclick="alert_sw()" href="#">¿Necesitas ayuna?</a>
        

    



        

  
    </section>
    

    <script src="../js/validateForm.js"></script>

    <script src="../../../utils/js/sidebar/SidebarScrtipt.js" type="module"></script>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function alert_sw(){
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: '¿Necesitas ayuda?',
            text: "Asegurate de diligenciar todos los campos.",
            icon: 'warning',
            confirmButtonText: 'Ok',
            });
        }
    </script>
    
</body>

</html>