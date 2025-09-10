let list =  ['./cadastro.html', './relatorio.html', './alteracao.html'];
let date;

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

