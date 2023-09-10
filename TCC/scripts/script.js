function mostrarSenha() {
    var x = document.getElementById("s");
    var imagem = document.getElementById("img1");
    var img1 = "./img/olho2.svg";
    var img2 = "./img/olho1.svg";

    if (x.type === "password") {
        x.type = "text";
        imagem.src =  img1;

    } else {
        x.type = "password";
        imagem.src =  img2;
    }
}



function enviar(event) {
    if (event.keyCode === 13) { 
        document.getElementById("bt1").click();
        return false;
    }
}