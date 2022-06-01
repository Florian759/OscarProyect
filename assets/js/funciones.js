function usuarioCorrecto(nombre){
    console.log(nombre);
    if (isNaN(nombre[0])){
        return true;
    }else{
        return false;
    }
    
}

function compruebaNombre(elemento){
    Let nombreUsuario = elemeto.value;
    if (usuarioCorrecto(nombreUsuario)) {
        console.log("correcto");
    }else{
        console.log("incorrecto");
    }
}