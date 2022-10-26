<?php

define ('DB_HOST', 'localhost');
define ('DB_USER', 'root');
define ('DB_PASSWORD', '');
define ('DB_DB', 'agenda');
define ('DB_PORT', '3306');
define ('MYSQL_DSN', "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_DB.";charset=UTF8");

try{
    $conexao = new PDO(MYSQL_DSN, DB_USER, DB_PASSWORD);


$consulta = 'SELECT * FROM contato';

$comando = $conexao->prepare($consulta);

$comando->execute();

$listacontatos = $comando->fetchAll();

echo "<table>";

foreach($listacontatos as $contato){
    echo "<tr>";
    echo "<td>".$contato['id']."</td><td>".$contato['nome']."</td><td>"."</td>";
    echo "</tr>";
}
echo "</table>";
}
catch(PDOException $e) {
    print("Erro ao se conectar com o banco de dados....<br>".$e->getMessage());
}

?>
