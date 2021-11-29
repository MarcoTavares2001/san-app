let statusAudio = '';
//Leer textos de un lugar
const cargarVoces = () => {
    vocesDisponibles = window.speechSynthesis.getVoices();
    console.log({vocesDisponibles});
};

cargarVoces();

if ('onvoiceschanged' in speechSynthesis) {
  speechSynthesis.onvoiceschanged = function () {
    cargarVoces();
  };
}

let indexVoz = 4,
    btnSonido = document.querySelectorAll(".instrucciones"),
    titulo = '';
if(/Edg\/\d./i.test(navigator.userAgent)) indexVoz = 72;

function quitarSonido(){
  btnSonido.forEach(btn =>{
    btn.classList.remove("active");
  });
}

btnSonido.forEach(element => {
  element.addEventListener("click", () => {
    if(speechSynthesis.speaking || statusAudio){
      quitarSonido();
      speechSynthesis.cancel();
      return;
    }else if(!statusAudio){
      document.querySelectorAll("audio").forEach(e => {
        e.pause();
        e.currentTime = 0;
        document.querySelector(".fa-music").classList.remove("active");
      });
    }
    if(element.parentNode.previousElementSibling && element.parentNode.previousElementSibling.tagName == "H4"){
      titulo = element.parentNode.previousElementSibling.textContent;
    }else{
      titulo = '';
    }
    quitarSonido();
    element.classList.add("active");
    let mensaje = new SpeechSynthesisUtterance();
    mensaje.onend = function(){
      quitarSonido();
    }
    mensaje.voice = vocesDisponibles[indexVoz];
    mensaje.volume = 1;
    mensaje.rate = 1;
    mensaje.text = titulo+' '+element.parentNode.textContent;
    mensaje.pitch = 1;
    // ¡Parla!
    speechSynthesis.speak(mensaje);
  });
});

function soundOption(){
    document.querySelectorAll("audio").forEach(e => {
        e.pause();
        e.currentTime = 0;
        document.querySelector(".fa-music").classList.remove("active");
    });
    if(statusAudio){
      quitarSonido();
      speechSynthesis.cancel();
    }
}

document.getElementById("mute").addEventListener("click", function(){
    if(document.querySelector("#mute.active")){
        this.classList.remove("active");
        statusAudio = false;
    }else{
        this.classList.add("active");
        statusAudio = true;
    }
    soundOption();
});

window.onbeforeunload = function() {
  window.speechSynthesis.cancel();
};
