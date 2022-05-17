<?php

use function PHPSTORM_META\type;

require_once "conexao.php";
include_once "validacoes.php";

//recebendo as informações digitadas no formulário através do método post

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$sexo = $_POST['sexo'];

//filtragem utilizando sanitize
$nome = filter_input(
    INPUT_POST,
    'nome',
    FILTER_SANITIZE_SPECIAL_CHARS
);
$sobrenome = filter_input(
    INPUT_POST,
    'sobrenome',
    FILTER_SANITIZE_SPECIAL_CHARS
);
$cpf = filter_input(
    INPUT_POST,
    'cpf',
    FILTER_SANITIZE_NUMBER_FLOAT
);
$telefone = filter_input(
    INPUT_POST,
    'telefone',
    FILTER_SANITIZE_NUMBER_INT
);

//apagando qualquer caractere que o usuário digitar que não sejam letras maiúsculas e minúsculas
$nome = preg_replace("/[^a-zA-Z]/", ' ', $nome);
$sobrenome = preg_replace("/[^a-zA-Z]/", ' ', $sobrenome);

//Verificar se o usuário preencheu o campo
if (empty($nome) and empty($sobrenome) and empty($cpf) and empty($email) and empty($telefone) and empty($sexo)) {
    //script JS para exibir caixa de diálogo de confirmação
    echo "<script language='javascript' type='text/javascript'>
        alert('Preencha os Campos!!');window.location ='index.html'</script>";
}
if (empty($nome)) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Digite seu Nome!!');window.location ='index.html'</script>";
} elseif (empty($sobrenome)) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Digite Seu Sobrenome!!');window.location ='index.html'</script>";
} elseif (empty($cpf)) {
    echo "<script language='javascript' type='text/javascript'>
        alert('CPF Vazio!!');window.location ='index.html'</script>";
} elseif (empty($email)) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Digite seu Email!!');window.location ='index.html'</script>";
} elseif (empty($telefone)) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Telefone Vazio!!');window.location ='index.html'</script>";
} elseif (empty($sexo)) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Sexo Vazio!!');window.location ='index.html'</script>";
}
/* elseif(empty($nome) and empty($sobrenome) and empty($cpf) and empty($email) and empty($telefone) and empty($sexo))
        {
             //script JS para exibir caixa de diálogo de confirmação
              echo"<script language='javascript' type='text/javascript'>
                 alert('Campo Vazio!!');window.location ='index.html'</script>"; 
        }*/ else {
    //Verificar a existencia das variaveis
    if (isset($_POST['nome']) and isset($_POST['sobrenome']) and isset($_POST['cpf']) and isset($_POST['email']) and isset($_POST['telefone']) and isset($_POST['sexo'])) {
        if (!empty($_POST['nome']) or ($_POST['sobrenome']) or ($_POST['cpf']) or ($_POST['email']) or ($_POST['telefone']) or ($_POST['sexo'])) {
            //validalções

            //validando cpf
            if (validaCPF($cpf) == false) {
                //script JS para exibir caixa de diálogo de confirmação
                echo "<script language='javascript' type='text/javascript'>
            alert('Digite um CPF Válido!');window.location ='index.html'</script>";
                die;
            }

            //validando informações do campo email
            if (validaremail($email) == false) {

                //script JS para exibir caixa de diálogo de confirmação
                echo "<script language='javascript' type='text/javascript'>
            alert('Digite um Email Válido!');window.location ='index.html'</script>";
                die;
            }

            //validando telefone
            if (validatelefone($telefone) == false) {
                //script JS para exibir caixa de diálogo de confirmação
                echo "<script language='javascript' type='text/javascript'>
            alert('Digite um Telefone Válido!');window.location ='index.html'</script>";
                die;
            }

            //se todas validações = OK
            //insere os dados no banco

            else {
                //inserindo os dados do insert no banco
                $sqlInsert = "INSERT INTO usuario (cpf, usuario_nome, usuario_sobrenome, usuario_email, telefone, sexo)
    VALUES ('$cpf', '$nome', '$sobrenome' , '$email', '$telefone', '$sexo')";

                //query para verificar os comandos SQL e a conexão
                $rs = mysqli_query($conexao, $sqlInsert) or die("Erro ao cadastrar dados");

                //script JS para exibir caixa de diálogo de confirmação

                echo "<script language='javascript' type='text/javascript'>
    alert('Usuário cadastrado com sucesso!');window.location ='index.html'</script>";
            }
        }
    }
}
