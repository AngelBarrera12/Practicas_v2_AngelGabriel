var elemh4_1 = document.getElementById('contenido');
var elemh4_2 = document.getElementById('contenido2');

//añadir un escuchador al elemento
document.addEventListener('DOMContentLoaded', function(){
    //implementar el Api XMLHttpRequest
    implementAjax();
    //implementar el Api DOM
    implementFetch();
});

function implementAjax(){
    var object_ajax = new XMLHttpRequest();
    object_ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            elemh4_1.innerHTML = this.responseText;
        }
    }
    //Ruta absoluta
    object_ajax.open('GET', 'http://localhost:8080/Practicas_v2_AngelGabriel/files/texto_1.txt', true);
    object_ajax.send();
    
}

function implementFetch(){
    fetch("http://localhost:8080/Practicas_v2_AngelGabriel/files/texto_2.txt")
    .then(function(respuesta){
        return respuesta.text();
    }).then(function(texto){
        elemh4_2.innerHTML = texto;
    }).catch(function(error){
        console.log('Error: ', error);
    })
}
