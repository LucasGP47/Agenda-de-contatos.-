<?php
    include 'mockapi.php';
?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1.0">
        <title>Lista de contatos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <script type="text/javascript" src="date.js"></script>
    </head>

    <body>
        <h1>Foto:</h1>
        <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" face="Times New Roman "></p>
<p><label for="file" ></label></p>
<p><img id="output" width="100" class="rounded float-start" /></p>

<br>

<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>

       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <form action="acao.php" method="post" enctype="multipart/form-data">
        <h1>Dados:</h1>
        <div>
        <ul>

        <div class="inputbox">

                                <label class="col-sm-2 col-form-label" for="nome">Id:</label>

                                <input readonly class="form-control-plaintext" type="text" id="id" name="id" value=<?=isset($contato)?$contato['id']:''?> >

            <li>Nome: <input type="text" name="nome" id="nome" placeholder="Digite aqui seu nome..." value=<?=isset($contato)?$contato['nome']:''?>> <input type="button" class="btn btn-outline-success" onblur="showAlert()" id="submit" value="Enviar"> <span id="idpoint"></span> </li> 

            <br>

            <li>Email: <input type="email" name="email"> <input type="button" class="btn btn-outline-success" id="email" value="Enviar"> </li>

            <br>

            <li>Telefone: <input type="tel" name="telefone"> <input type="button" class="btn btn-outline-success" id="nome" value="Enviar"> </li>

            <br>

            <li>Ano de Nascimento: <input type="text" name="ano" id="ano"> <input type="button" class="btn btn-outline-success"  onclick="data()" value="Enviar"> </li>

            <br>

            <li>Idade: <span id="datep" name="idade"></span> </li>

            <br>

            <li>Genero:  <br>
                <input type="radio" id="sexo" name="sexo" value="1" checked>Masculino<br>
                <input type="radio" id="sexo" name="sexo" value="2" checked>Feminino<br>
                <input type="radio" id="sexo" name="sexo" value="3" checked>Outros<br>
             </li>

            <br>
            
            <div>
            <li>Parente?  <br>
                <input type="radio" id="parente" name="parente" value="1" checked> Sim<br>
                <input type="radio" id="parente" name="parente" value="2" checked> Não<br>
            </li>
            </div>    
            
            <br>

            <li>Onde o conhece?: <input type="text"> <input type="button" class="btn btn-outline-success" value="Enviar"> </li> 
            
            <br>
            
            <div>
            <li>Rede Social: <select value="genero" class="btn btn-outline-success" name="rede">
                <option value="1">Instagram</option>
                <option value="2">Linkedin</option>
                <option value="3">Facebook</option>
            </select><br>
            <br>
            Link: <input type="text">
            </li>
            </div>  
        
        </ul>
       
    </div>
   Cadastrar:  <input type="submit" class="btn btn-outline-success" id="submit" value="Enviar">
</form>
   

    </body>
</html>
<?php 
if (isset($_POST['nome'])){

    header('location: puxadados.php');

}
?>