
function showAlert() {
  var name = document.getElementById("botton").value;
  if (name ===""){
    document.getElementById("idpoint").innerHTML = "- Voce não digitou nada!";
  }
  else{
    document.getElementById("idpoint").innerHTML = "- Bem vindo " + name;

  }
}


function data() {
  var data = document.getElementById("ano").value;

  var ano = 2022 - data;

  if (data ==="" || ano < 0  || data < 0){
    document.getElementById("datep").innerHTML = "Invalido";
  }
  else {
    document.getElementById("datep").innerHTML = ano ;
  }

}
