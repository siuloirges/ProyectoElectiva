window.setInterval(validate, 500);

function validate() {
    let btn_send = document.getElementById('send-btn');

    let password = document.getElementById('password');
    
    let password_repet = document.getElementById('password-repet');

    if(password.value != password_repet.value){
        btn_send.disabled = true;
        btn_send.style = 'cursor: no-drop;'
    }else{
        btn_send.disabled = false;
        btn_send.style = 'cursor: pointer;'
    }

  

}
