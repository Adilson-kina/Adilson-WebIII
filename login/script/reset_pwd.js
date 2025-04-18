import { isPwdWeak } from "./script.js";

let showCode = false;

async function send(){
  event.preventDefault();
  if(!isPwdWeak()){
    if(showCode == false){
      let email = document.getElementById("email").value;
      console.log("Email value:", email);
      let status = await post(`email=${encodeURIComponent(email)}`);
      let inputCode = document.getElementsByClassName('code');
      let inputEmail = document.getElementsByClassName('email');
      if(status == "ok"){
        for(let i = 0; i < 2; i++){
          inputEmail[i].style.display = 'none';
          inputCode[i].style.display = 'inline';
        }
        document.getElementById('sub').value = "Enviar código";
        showCode = true;
      }
      else{
        inputEmail[1].style.outline = "1px solid #ed8796";
      }
    } 
    else{
      let code = document.getElementById("code").value.trim();
      let status = await post(`inputCode=${code}`);
      if(status == "verified"){
        window.location.href = "newpwd.php";
      }
    }
  }
  else{
    alert("pwd weak");
  }
}

/*
#####################
### POST FUNCTION ###
#####################
*/ 

async function post(data){
  const server = "reset_pwd.php";
  try{
    const res = await fetch(server, {
      method: 'POST',
      headers: {
        "Content-type": "application/x-www-form-urlencoded"
      },
      body: data
    });
    if(res.ok){
      const result = await res.json();
      console.log("Server response:", result);
      return result.status;
    }
    else{
      console.log(`Server error`);
      return false;
    }
  } catch(err){
    console.log(`Fetch error: ${err}`);
    return false;
  }
}
