<?php

include 'mockapi.php';



$id = isset($_POST['id'])?$_POST['id']:'';

$nome = isset($_POST['nome'])?$_POST['nome']:'';
if($nome === ''){
    $nome = "Invalido";
}
$email = isset($_POST['email'])?$_POST['email']:'';
if($email === ''){
    $email = "Invalido";
}
$telefone = isset($_POST['telefone'])?$_POST['telefone']:'';
if($telefone === ''){
    $telefone = "Invalido";
}
$idade = isset($_POST['ano'])?$_POST['ano']:'';
if($idade === ''){
    $idadetotal = "Invalido";
}
else {
$idadeint = intval($idade);
$ano = 2022 - $idadeint;
$idadetotal = strval($ano);
}

$dados = array ();

if(isset($_POST['sexo'])){
    $sexo = $_POST['sexo'];
    if($sexo == 1){
        $sexo = 'Masculino';
    }
    else{
        if($sexo == 2){
            $sexo = 'Feminino';
        }
        else{
            $sexo = 'Outros';
        }
    }
}

if(isset($_POST['parente'])){
    $parente = $_POST['parente'];
    if($parente == 1){
        $parente = 'Sim';
    }
    if($parente == 2){
        $parente = 'Nao';
    }
}
if (isset($_POST['nome'])){

    echo 'Olá '.$_POST['nome'].'. Seu contato esta no arquivo json na pasta do projeto!';
    header('location: puxadados.php');

}
else
   
    header('location: contato_1.html');

    $dados = array('ID' => $id, 'Nome'=> $nome,'Email' => $email, 'Telefone' => $telefone, 'Idade' => $idadetotal, 'Sexo' => $sexo, 'Parente?' => $parente);

   $arquivo = fopen('dados.json','a+','<br>'.'<br>');

   fwrite($arquivo,json_encode($dados)."\r\n");
   ?>