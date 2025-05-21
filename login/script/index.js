async function post(data){
  const server = "index.php";
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

function doQuery(){
  let selectedValue = document.getElementById('typeOfQuery').value;
  if (selectedValue == "Create") {
    console.log("hello");
  }
  else if (selectedValue == "Read") {
    console.log("bye");
  }
  else if (selectedValue == "Update") {
    console.log("bye1");
  }
  else if (selectedValue == "Delete") {
    console.log("bye2");
  }
}

function chooseRender(){

}
