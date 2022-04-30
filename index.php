<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="resourses\utils\css\all.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php
            
            if( @$_SESSION['last_message'] ){
                echo  '

           
                    <p class="error">'.$_SESSION['last_message'].'</p>
                  
                
                ';
                $_SESSION['last_message'] = null;
            }
            
        ?>

    <div class="container">
        <form action="">
            <h1> Login </h1>
    
            <div class="campo"> 
                <label for="Email">Nombre de usuario</label>
                <input class="value" type="email" name="email" id="email" placeholder= "Example@domain.com">
            </div>
            
            <div class="campo">
                <label for="Password">Contraseña</label>
                <input class="value" type="password" name="password" id="password"  placeholder= "********"> 
            </div>

            <div class="row nuevo">
                 <input id="nuevo" type="checkbox"> <p>Soy nuevo</p>
            </div>
    
            <a type="submit" href="#" onclick="redirect()" class="buttom"> Login </a>



            

        </form>
    </div>
    <a style="text-decoration: none;font-size: 14px;margin-top: 15px;color: white;" href="#">Sign Up?</a>


</body>

<script>

function redirect(){

   let email = document.getElementById('email');
   let password = document.getElementById('password');

   let  checked = document.getElementById('nuevo').checked;
 
    window.location.href = "/ProyectoElectiva/app/controllers/LoginController.php?email="+email.value+"&password="+password.value+"&action=login&frist="+checked;
}
</script>
</html>
