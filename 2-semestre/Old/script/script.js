function getDate() {
  let date = new Date();
  let day = date.getDate();
  let month = date.getMonth() + 1;
  let year = date.getFullYear();
  let dateArray = [day, month, year];
  let dateFormated = dateArray.join("/");
  document.getElementById('date').innerHTML = dateFormated;
}

window.onload = getDate;
window.onload = change;

function change(){
  document.getElementById('register-container').style.backgroundColor = getCookie('bg');
  document.getElementById('register-container').style.color = getCookie('font');
  document.getElementById('index-container').style.backgroundColor = getCookie('bg');
  document.getElementById('index-container').style.color = getCookie('font');
}

function changeBg(){
  getColor();
  document.getElementById('index-container').style.backgroundColor = getCookie('bg');
  document.getElementById('register-container').style.backgroundColor = getCookie('bg');
}

function changeTxt(){
  getColor();
  document.getElementById('index-container').style.color = getCookie('font');
  document.getElementById('register-container').style.color = getCookie('font');
}

function getColor(){
  let bgColor = document.getElementById('bgColor').value;
  let fontColor = document.getElementById('fontColor').value;
  setCookie('bg', bgColor);
  setCookie('font', fontColor);
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
}
