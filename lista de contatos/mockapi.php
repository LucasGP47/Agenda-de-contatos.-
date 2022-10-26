<?php

define('JSON','dados.json');
define('ListaApi','https://63544294e64783fa8282329d.mockapi.io/lista');

function VetorDados(){
    $destino = '';
    if (isset($_FILES['foto'])){
        $destino = 'imagens/'.$_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'],$destino);
    }

   
    $dados = array('id' => isset($_POST['id'])?$_POST['id']:'',  
                    'nome' => isset($_POST['nome'])?$_POST['nome']:'',
                    'email' => isset($_POST['email'])?$_POST['email']:'',
                    'idade' => isset($_POST['ano'])?$_POST['ano']:'',
                    'parente' => isset($_POST['parente'])?$_POST['parente']:'',
                    'sexo' => isset($_POST['sexo'])?$_POST['sexo']:'',
                );


    return $dados; 

}

function idas($dados){
    $id = intval($dados[count($dados)-1]->id);

    return (++$id);
}


function excluir($id){
    echo "cheguei aqui";
    $dados = Dados();

    $i = 0;
    foreach($dados as $contato){
        if ($contato['id'] == $id)
            break;
        else
        $i++;
    }
    array_splice($dados,$i,1);
    salvaDadosNoArquivo($dados);
}

function salvaDadosNoArquivo($dados){
    file_put_contents(JSON,json_encode($dados));    
}



function alterar($alterado){
    $dados = Dados();
    $i = 0;
    foreach($dados as $contato){
        if ($contato['id'] == $alterado['id'])
            break;
        else
        $i++;
    }
    array_splice($dados,$i,1,array($alterado));
    inserir($dados);  
}


function SalvaDados($id, $nome, $email, $ano, $parente, $sexo){
    $novosdados = array('id'=>$id,
                        'nome'=>$nome,
                        'email'=>$email,
                        'datanasc'=>$ano,
                        'parente'=>$parente,
                        'sexo'=>$sexo);

    return $novosdados;

}


function inserir($dados){
    $arquivo = fopen('dados.json','a+');
    fwrite($arquivo,json_encode($dados));
    fclose($arquivo);
}

function BuscaDeDados(){

    $conteudo = file_get_contents(ListasApi);
    $dados = json_decode($conteudo);
    return $dados;

}

function Dados(){
    
        $conteudo = file_get_contents(ListaApi);
        $contatos = json_decode($conteudo, true);

        return $contatos;

}

$id = isset($_GET['id'])?$_GET['id']:'';

$nome = isset($_POST['nome'])&&(strlen($_POST['nome'])>3)?$_POST['nome']:'';

$email = isset($_POST['email'])?$_POST['email']:'';

$ano = isset($_POST['ano'])?$_POST['ano']:'';

$parente = isset($_POST['parente'])?$_POST['parente']:'';

$sexo = isset($_POST['sexo']);

$dados = array();
$novosdados = array();

$acao = isset($_POST['enviar'])?$_POST['enviar']:"";
if($acao == "salvar"){
    $dados = BuscaDeDados();
    $id = idas($dados);
    $novosdados = SalvaDados($nome, $email, $ano, $parente, $sexo, $id);
    array_push($dados,$novosdados);
    inserir($dados);
    
}


$pesquisa = (isset($_POST['pesquisa'])?$_POST['pesquisa']:'');
    if($pesquisa == 'procurar'){
        $resultadoPesquisa = $_POST['busca'];
       
    }




function buscaContato($id){
    $dados = Dados();  
    foreach($dados as $contato){
       
        if ($contato['id'] == $id){
            echo "Passou no buscaContato"; 
            return $contato;
        }
    }
}

$acao = isset($_POST['acao'])?$_POST['acao']:'';

if ($acao =='salvar'){
    $contato = VetorDados();
    if ($contato['id'] == 0){
        if (inserir($contato))
            header('location: puxadados.php');
    }else{    
        alterar($contato);
        header('location: puxadados.php');

    }
}

else{

    $acao = isset($_GET['acao'])?$_GET['acao']:'';
    $id = isset($_GET['id'])?$_GET['id']:'';


    if ($acao == 'excluir'){
        excluir($id);
    }else if($acao == 'editar'){
        //echo "Ai";
        $contato = buscaContato($id);
        print_r($contato);
        echo "aqui";        
    }
}

if(!empty($_GET['id'])){
    
    $id = $_GET['id'];
    $result = "a"; 

}


?>