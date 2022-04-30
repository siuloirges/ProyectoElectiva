
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title> 
    <link rel="stylesheet" href="../utils/css/all.css">
    <link rel="stylesheet" href="css/home.css">


</head>
<body>
    
    <side-bar> </side-bar>

    <section class="home">

    
        <div class="clock" >
            <div class="hour">
                <div class="hr" id="hr"></div>
            </div>
            <div class="min">
                <div class="mn" id="mn"></div>
            </div>
            <div class="sec">
                <div class="sc" id="sc"></div>
            </div>
        </div>



        <div class="content">

            <img src="../assets/hi.jpg" alt="">
            <h1 id="saludo" class="text">  Bienvenido Sergio </h1>
            <p>Navega por el menu de inicio para empezar.</p>
        
        </div>
        
    </section>

    <script src="../utils/js/sidebar/SidebarScrtipt.js" type="module"></script>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script>

        let name = 'Sergio';
        

            let day = new Date()

            let hh = day.getHours();
            console.log(hh)


            if(hh <= 12){
                document.getElementById('saludo').innerHTML = 'Buenos Dias '+name;
            }


            if(hh >= 12){
                document.getElementById('saludo').innerHTML = 'Buenas Tardes '+name;
            }

            if(hh >= 19){
                document.getElementById('saludo').innerHTML = 'Buenas Noches '+name;
            }


   
    </script>



</body>

</html>