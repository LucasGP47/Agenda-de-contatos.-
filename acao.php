<?php



$nome = isset($_POST['botton'])?$_POST['botton']:'';
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
if (isset($_POST['botton'])){

    echo 'Olá '.$_POST['botton'].'. Seu contato esta no arquivo txt na pasta do projeto!';

}
else
   
    header('location: contato_1.html');

    $dados = array('Nome'=> $nome,'Email' => $email, 'Telefone' => $telefone, 'Idade' => $idadetotal, 'Sexo' => $sexo, 'Parente?' => $parente, );

   $arquivo = fopen('contatos1.txt','w+');
   fwrite($arquivo,json_encode($dados));
   fclose($arquivo);

?>