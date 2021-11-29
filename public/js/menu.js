let nombres = ["Lenguaje y Comunicacion", "Pensamiento Matematico", "Exploracion y comprension del mundo natural"];
let botones = document.querySelectorAll('#cuerpoMaterias a');
for (var i = 0; i < botones.length; i++) {
    let number = i;
    botones[i].addEventListener('click', function(){
        try {
            document.getElementsByClassName("active")[0].classList.remove("active"); 
        } catch (error) {
            
        }
        click.play();
        this.style.cssText = "display: flex;";
        this.classList.add("active");
        let actividades = document.querySelectorAll('#actividades iframe');
        for (var j = 0; j < actividades.length; j++){
            actividades[j].style.cssText = "display: none;";
        }
        document.getElementById(this.getAttribute('value')).style.cssText = "display: block;";
        document.getElementById("nombreFrame").innerHTML = nombres[number];
    });
}

document.querySelector(".fa-sign-out-alt").addEventListener("click", function(){
    window.location.href = "controllers/cerrarSesion.php";
});