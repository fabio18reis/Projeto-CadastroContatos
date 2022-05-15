<?php 
include_once "validacoes.php";
require "conexao.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$sexo = $_POST['sexo'];

//filtragem utilizando sanitize
$nome = filter_input(INPUT_POST, 'nome',
FILTER_SANITIZE_SPECIAL_CHARS);
$sobrenome = filter_input(INPUT_POST, 'sobrenome',
FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST , 'cpf',
FILTER_SANITIZE_NUMBER_FLOAT	);
$telefone = filter_input(INPUT_POST, 'telefone',
FILTER_SANITIZE_NUMBER_INT);

$nome = preg_replace("/[^a-zA-Z]/", ' ' ,$nome);
$sobrenome = preg_replace("/[^a-zA-Z]/", ' ' ,$sobrenome);
  
    //Verificar se o usuário preencheu o campo
if(empty($nome) or empty($sobrenome) or empty($cpf) or empty($email) or empty($telefone) or empty($sexo))
{
    echo"<script language='javascript' type='text/javascript'>
        alert('Campo Vazio!!');window.location ='alterarusuarioform.php'</script>";     
}
else{    
//Verificar a existencia das variaveis
  if(isset($_POST['nome'])and isset($_POST['sobrenome']) and isset($_POST['cpf']) and isset($_POST['email']) and isset($_POST['telefone']) and isset($_POST['sexo'])){
    if(!empty($_POST['nome']) or ($_POST['sobrenome']) or ($_POST['cpf']) or ($_POST['email']) or($_POST['telefone']) or ($_POST['sexo']))
    {
    
        }
       if(validaCPF($cpf) == false){

            echo"<script language='javascript' type='text/javascript'>
            alert('Digite um CPF Válido!');window.location ='alterarusuarioform.php'</script>";   
        }

        if(!validaremail($email)){
            echo"<script language='javascript' type='text/javascript'>
            alert('Digite um Email Válido!');window.location ='alterarusuarioform.php'</script>";    
        }

        if(validatelefone($telefone) == false)
        {
            echo"<script language='javascript' type='text/javascript'>
            alert('Digite um Telefone Válido!');window.location ='alterarusuarioform.php'</script>";    
        }
        
    }        
        else{
$sqlUpdate= "UPDATE usuario SET usuario_nome = '$nome', usuario_email = '$email', usuario_sobrenome = '$sobrenome', telefone = '$telefone' WHERE idusuario = $id";
$result = mysqli_query($conexao, $sqlUpdate) or die ("Erro ao retornar dados");


if($result == true)
{
echo"<script language='javascript' type='text/javascript'>
    alert('Usuario Alterado!');window.location ='listarusuario.php'</script>";
}
else{
    echo"<script language='javascript' type='text/javascript'>
    alert('Erro!');window.location ='alterarusuarioform'</script>";
}
        }
    }

?>