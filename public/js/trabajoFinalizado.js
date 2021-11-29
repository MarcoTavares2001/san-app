var words = document.getElementsByClassName('word');
var wordArray = [];
var currentWord = 0;

let rand = Math.floor(Math.random() * (6 - 1)) + 1;
$(".enviarFelicitaciones img").attr("src", "public/gif/"+rand+".gif");

words[currentWord].style.opacity = 1;
for (var i = 0; i < words.length; i++) {
  splitLetters(words[i]);
}

function changeWord() {
  var cw = wordArray[currentWord];
  var nw = currentWord == words.length-1 ? wordArray[0] : wordArray[currentWord+1];
  for (var i = 0; i < cw.length; i++) {
    animateLetterOut(cw, i);
  }

  for (var i = 0; i < nw.length; i++) {
    nw[i].className = 'letter behind';
    nw[0].parentElement.style.opacity = 1;
    animateLetterIn(nw, i);
  }

  currentWord = (currentWord == wordArray.length-1) ? 0 : currentWord+1;
}

function animateLetterOut(cw, i) {
  setTimeout(function() {
    cw[i].className = 'letter out';
  }, i*80);
}

function animateLetterIn(nw, i) {
  setTimeout(function() {
    nw[i].className = 'letter in';
  }, 340+(i*80));
}

function splitLetters(word) {
  var content = word.innerHTML;
  word.innerHTML = '';
  var letters = [];
  for (var i = 0; i < content.length; i++) {
    var letter = document.createElement('span');
    letter.className = 'letter';
    letter.innerHTML = content.charAt(i);
    word.appendChild(letter);
    letters.push(letter);
  }

  wordArray.push(letters);
}

changeWord();
setInterval(changeWord, 1000);

//Descargar canvas con imagen
function descargar($materia, $act, $nombre){
    if (canvas.msToBlob){ //para internet explorer
        var blob = canvas.msToBlob();
        window.navigator.msSaveBlob(blob, filename + ".png" );// la extensión de preferencia pon jpg o png
    } else {
        link = document.getElementById("download");
        //Otros navegadores: Google chrome, Firefox etc...
        link.href = canvas.toDataURL("image/jpeg");// Extensión .png ("image/png") --- Extension .jpg ("image/jpeg")
        link.download = $act+"_"+$materia+"_"+$nombre.split(" ")[0];
    }
}

const ninos = cargarSonido("public/sound/ninosGritando.mp3");

function enviar($id, $materia, $act, $nombre){
  document.getElementById("download").addEventListener("click", function(){
    $("#download").css("display", "none");
    $.ajax({
        type: "POST",
        url: "include/actualizarActividad.php",
        data: {id: $id, materia: $materia, act: $act},
        dataType: "json",
        success: function(e) {
            if (e) {
              $( ".enviarFelicitaciones" ).show( "slow", function(){
                  $(this).css("display", "flex");
                  ninos.play();
                  setInterval(function(){
                    $( ".enviarFelicitaciones" ).hide("slow");
                  }, 3500);
                  setInterval(function(){
                    window.location.href = $materia+".php";
                  }, 4500);
              });
            }
        }
    });
    descargar($materia, $act, $nombre);
  });
}
