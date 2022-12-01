
//Funcion que me valida el formulario de login
const validarLogin = ()=>{   
    let $email = document.getElementById("email").value;
    let $pass = document.getElementById("pass").value; 
    if ($email === "" || $pass === ""  ) return Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Los campos no pueden estar vacios!',
        })

    if(!$email.includes("@") || !$email.includes(".com")) return Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'El dato ingresado no corresponde a un correo valido!',
    })   
        
    else{
        Swal.fire(`Bienvenido ${$email}`);
        setTimeout(() => {
            location.href = "menu.html";
        }, 2000);
    }
}

//Funcion para salir de sesion

const salirSesion =()=>{
    location.href ="index.html";
}






