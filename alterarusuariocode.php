<?php 
//incluindo as validaçõees
include_once "validacoes.php";
//chamando a conexão
require_once "conexao.php";

//atribuindo as variáveis através do método post
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

//caso o usuário digite um caracter que não seja letra maiúscula ou minúscula, é substituído por espaço 
$nome = preg_replace("/[^a-zA-Z]/", ' ' ,$nome);
//é feito a mesma coisa para o campo de sobrenome
$sobrenome = preg_replace("/[^a-zA-Z]/", ' ' ,$sobrenome);
  
    //Verificar se o usuário preencheu o campo
if(empty($nome) or empty($sobrenome) or empty($cpf) or empty($email) or empty($telefone) or empty($sexo))
{
    //comando JS para exibir uma caixa de diálogo e redirecionando o usuário ao formulário de edição
    echo"<script language='javascript' type='text/javascript'>
        alert('Campo Vazio!!');window.location ='alterarusuarioform.php'</script>";     
}
//se não
else{    
//Verificar a existencia das variaveis
  if(isset($_POST['nome'])and isset($_POST['sobrenome']) and isset($_POST['cpf']) and isset($_POST['email']) and isset($_POST['telefone']) and isset($_POST['sexo'])){
      //se o usuário preencher os campos é feito uma série de virificações
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
}
?>