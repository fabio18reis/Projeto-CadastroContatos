<?php
//adicionando a conexão do banco 
require "conexao.php";

//variável que pega através do método get o ID do usuário que vem pela URL
$id = $_GET['id'];

//comando sql para deletar o usuário
$sqlDel = "DELETE FROM usuario WHERE idusuario = '$id'";

//condição para verificar a conexão e o comando sql
if(!(mysqli_query($conexao,$sqlDel)))
{
    die('Erro ao excluir o registro: '. mysqli_error($conexao));
}

//comando JS para exibir caixa de diálogo que é exibido quando o usuário é deletado
echo"<script language='javascript' type='text/javascript'>
    
    alert('Usuário Deletado!');window.location ='listarusuario.php'</script>";

    //fecha a conexão
mysqli_close($conexao);
?>  