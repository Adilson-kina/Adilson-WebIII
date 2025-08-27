function chooseAccentColor(){
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

window.onload = chooseAccentColor;
