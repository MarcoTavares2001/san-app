let nombre = document.currentScript.getAttribute('name');

Array.from(document.getElementsByClassName("card")).forEach((el, ind) => {
    let index = ind+1;
    el.addEventListener("click", () => {
        window.location.href = 'actividad'+index+'_'+nombre+'.php';
    });
    el.childNodes[1].innerHTML = index;
    el.style.backgroundImage = "url('public/img/act"+index+nombre.charAt(0).toUpperCase() + nombre.slice(1)+".jpg')";
});

