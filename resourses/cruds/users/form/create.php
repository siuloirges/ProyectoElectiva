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
            <ion-icon  class= "prymary-icon" name="person-circle-outline"></ion-icon>
            <h1 class="text">  Crea un Usuario </h1>
        </div>
        <br>

        <!-- <div class="mesaje">
            <ion-icon class='icon-info' name="information-circle-outline"></ion-icon>
            <p>El Usuario se a guardado correctamente.</p>
        </div>  -->

        <div class="form-contain">

            <div class="row back">
                 <ion-icon  onclick="history.back()" class= "prymary-icon" name="arrow-back-outline"></ion-icon>
                <h2>Informacion del usuario</h2>
            </div>
            <hr>
            <form action="/ProyectoElectiva/app/controllers/UsersController.php" method="get">
                
                    <div class="campos">
                        <div class="campo">
                            <span> Nombre</span>
                            <input type="text" name="name" id="name" required> 
                        </div>
        
                        <div class="campo">
                            <span> Apellido </span>
                            <input type="text" name="last_name" id="last_name" required> 
                        </div>
        
                        <div class="campo">
                            <span> Tipo de identificacion </span>
                            <select name="identification_type" required>
                                <option value="null" selected>seleccione..</option>
                                <option value="Cedula">Cedula</option>
                                <option value="Targeta de identidad"> Targeta de identidad</option>
                                <option value="Registro civil">Registro civil</option>
                            </select>
                        </div>
        
                        <div class="campo">
                            <span> N° identificacion </span>
                            <input required type="text" name="identification_number" id="identification_number"> 
                        </div>
        
                        <div class="campo">
                            <span>  N° Telefono </span>
                            <input type="text" name="phone_number" id="phone_number" required> 
                        </div>
        
                        <div class="campo">
                            <span> Direccion</span>
                            <input type="text" name="address" id="address" required> 
                        </div>
        
                        <div class="campo">
                            <span> Email</span>
                            <input type="text" name="email" id="email" required> 
                        </div>
        
                        <div class="campo">
                            <span> Contraseña </span>
                            <input type="password" name="password" id="password" required> 
                        </div>

                        <div class="campo"  >
                            <span> confirmar Contraseña </span>
                            <input type="password" name="password-repet" id="password-repet" required> 
                        </div>

                        <input type="hidden" name="action" value="store">
                        <!-- <p>Asegurate que las contraseñas sean iguales</p> -->
        
                    </div>


                
                    <div class="botons">
                        <input class="btn-dan" type="reset" value="Borrar formulario">
                        <input id="send-btn" class="btn-succ" type="submit"  value="Guardar Usuario">
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
            text: "Asegurate de diligenciar todos los campos y que las contraseñas sean inguales.",
            icon: 'warning',
            confirmButtonText: 'Ok',
            });
        }
    </script>
    
</body>

</html>