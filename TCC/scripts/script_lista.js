var pesq = document.getElementById('pesq');

pesq.addEventListener("keydown", function(event) {
    if (event.key === "Enter")
    {
        pesquisar();
    }

});


function pesquisar(){
    window.location = "lista.php?search="+ pesq.value;
}