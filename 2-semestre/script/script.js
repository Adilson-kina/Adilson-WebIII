let list =  ['./entrar.html','./cadastro.html', './relatorio.php', './alteracao.html'];
let date;

let year = document.getElementById('year');
let price = document.getElementById('price');
let documento = document.getElementById('documento');

function start(){
        date = dateNow();
        document.getElementById('date').innerHTML = date;
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
