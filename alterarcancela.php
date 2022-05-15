<?php
include_once "conexao.php";

    echo"<script language='javascript' type='text/javascript'>
        alert('Cancelando operação!!');window.location ='listarusuario.php'</script>";     


mysqli_close($conexao);



?>