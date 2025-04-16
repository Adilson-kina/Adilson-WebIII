let x = 0;

function send(){
  event.preventDefault();
  if(x <= 0){
    let email = document.getElementById("email").value;
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      if(getCookie("isSuccess") == true){
        let input = document.getElementsByClassName('code');
        document.getElementById('sub').innerHTML = "Enviar código";
        input[0].style.display = 'inline';
        input[1].style.display = 'inline';
      }
      else{
        alert("pretty bad this email isn't in the database");
      }
    }

    xhttp.open("POST", "reset_pwd.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + encodeURIComponent(email));
    x++;
  }
  else{
    let code = document.getElementById("code").value.trim();
    let email = document.getElementById("email").value;
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      if(code == getCookie('recoveryCode').trim()){
        document.cookie = "canChangePwd=true; path=/";
        window.location.href = "newpwd.php";
      }
      else{
        alert("what a pity it doesnt match");
      }
    }

    xhttp.open("POST", "reset_pwd.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + encodeURIComponent(email) + "&inputCode=" + encodeURIComponent(code));
  }
}


// LLM made function
function getCookie(name) {
  const cookieString = document.cookie;
  if (!cookieString) {
    return null;
  }

  const cookies = cookieString.split(';');
  for (let i = 0; i < cookies.length; i++) {
    let cookie = cookies[i].trim(); // Remove leading/trailing spaces
    if (cookie.startsWith(name + '=')) {
      let cookieValue = cookie.substring(name.length + 1);
      try {
        //attempt to decode the cookie value.
        cookieValue = decodeURIComponent(cookieValue);
      } catch (e) {
        //if decoding fails, leave the value as is.
      }
      return cookieValue;
    }
  }
  return null;
}
