<?php
/*
//recebendo os dados de telefone do formulário

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados['cadastrar'])) {
        foreach($dados['telefone'] as $chave => $tel);
        $idtel = $chave;
        $telefoneadicional = $tel;


        $sqlInserttelefone = "INSERT INTO telefone(qtdtelefone,telefone,telefoneprincipal)
        values('$telefone', '$idtel', '$telefoneadicional')";

        $rs = mysqli_query($conexao, $sqlInserttelefone) or die("Erro ao cadastrar dados");

}*/