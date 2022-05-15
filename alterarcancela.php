<?php
//chamando a conexâo com o banco de dados
include_once "conexao.php";

//script JS para chamar uma caixa de diálogo e redirecionar o usuário para o formulário com os contatos cadastrados
    echo"<script language='javascript' type='text/javascript'>
        alert('Cancelando operação!!');window.location ='listarusuario.php'</script>";     

//fechando a conexão
mysqli_close($conexao);



?>