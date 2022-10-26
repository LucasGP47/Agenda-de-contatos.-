<?php
   include_once "mockapi.php";
?>

<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

</head>

<body>
    <h9> Olá! Seu contato esta no arquivo json na pasta do projeto! </h9>
    <h1>Lista de contatos</h1>
    <nav>
        <ul class="MainMenu">
            <li id="cadastrar" class="itemenu"><a href="PaginaInicial.php">Cadastrar</a></li>
        </ul>
    </nav>

    <form method="post">
        <script src="script.js"></script>
            <thead>
                <tr>
                    <label for="pesquisa"></label>
                    <input type="search" id="busca" name="busca" value="">
                    <input type="submit" class="btn btn-outline-success" id="pesquisar" name="pesquisa" value="procurar">
                </tr>
            </thead>
    </form>


    <selection>
        <table class="table lista-contatos">
            <thead>
                <tr>
                    <th>Id</th><th>nome</th><th>Alterar</th><th>Deletar</th>
                </tr>
            </thead>
            <?php

                $dados = Dados();
                foreach($dados as $contato){
                    $alterar = "<a href='puxadados.php?acao=editar&id=".$contato['id']."'>Alt</a>";
                    $excluir = "<a href='#' onclick=excluir('puxadados.php?acao=excluir&Id=".$contato['id']."')>Del</a>";
                    echo "<tr><td>".$contato['id']."</td><td>".$contato['nome']."</td><td>".$alterar."</td><td>".$excluir."</td></tr>";
                }
            ?>
        </table>
    </selection>
</body>
