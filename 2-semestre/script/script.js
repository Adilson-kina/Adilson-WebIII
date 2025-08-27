function getDate() {
  let date = new Date();
  let day = date.getDate();
  let month = date.getMonth();
  let year = date.getFullYear();
  let dateArray = [day, month, year];
  let dateFormated = dateArray.join("/");
  document.getElementById('date').innerHTML = dateFormated;
}

window.onload = getDate;
