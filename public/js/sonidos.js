const cargarSonido = function (fuente) {
    const sonido = document.createElement("audio");
    sonido.src = fuente;
    sonido.setAttribute("preload", "auto");
    sonido.setAttribute("controls", "none");
    sonido.style.display = "none"; // <-- oculto
    document.body.appendChild(sonido);
    sonido.addEventListener('ended', function(){
        document.querySelector(".fa-music").classList.remove("active");
    });
    return sonido;
};
//click.muted = true;

/*let statusAudio = true;*/

/*document.querySelectorAll("audio").forEach(element => {
    element.muted = statusAudio;
});*/
