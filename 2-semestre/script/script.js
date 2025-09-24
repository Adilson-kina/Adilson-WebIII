let list =  ['./entrar.html','./cadastro.html', './relatorio.php', './alteracao.html'];
let date;

let year = document.getElementById('year');
let price = document.getElementById('price');
let documento = document.getElementById('documento');

color.onchange = change;

function change(){
  let body = document.getElementById('body');
  body.style.backgroundColor = getCookie('bg');
}

function changeBG(){
  let color = document.getElementById('color');
  setCookie('bg', color.value);
}

function start(){
        date = dateNow();
        document.getElementById('date').innerHTML = date;
        change();
        changeBG();
}

window.onload = start;

function redirect(page){
        window.location.href = list[page];
}

function dateNow(){
        let date = new Date();
        return date.toLocaleDateString("en-GB");
}

year.oninput = function(){
  if (year.value.length > 4) {
    year.value = year.value.slice(0, 4);
  }
}

documento.oninput = function(){
  if (documento.value.length > 2) {
    documento.value = documento.value.slice(0, 2);
  }
}

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
} 

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";

