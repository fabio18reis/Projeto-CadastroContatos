<?php
//adicionando a conexão do banco de dados ao arquivo
    include_once "conexao.php";

//efetuando comandos SQL e verificando através da query
    $sqlSelect = "SELECT idusuario, cpf, usuario_nome, usuario_sobrenome, usuario_email, telefone, sexo FROM usuario";
    $result = mysqli_query($conexao, $sqlSelect) or die ("Erro ao retornar dados");

    //criando um formulário 
    echo "<meta charset='UTF-8'>";
    echo "<center><table border=1>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nome</th>";
    echo "<th>Sobrenome</th>";
    echo "<th>Email</th>";
    echo "<th>Telefone</th>";
    echo "<th>CPF</th>";
    echo "<th>Sexo</th>";
    echo "<th>Deletar</th>";
    echo "<th>Editar Registro</th>";
    echo "</tr>";

    //CONDIÇÃO QUE PERCORRE TODOS OS ITENS ARMAZENADOS NO BANCO E ARMAZENANDO NO ARRYA REGISTRO
    while($registro = mysqli_fetch_array($result))
    {
        //ATRIBUINDO UM ITEM DO ARRAY A UMA VARIÁVEL 
        $id = $registro['idusuario'];
        $nome = $registro['usuario_nome'];
        $email = $registro['usuario_email'];
        $sobrenome = $registro['usuario_sobrenome'];
        $telefone = $registro['telefone'];
        $sexo = $registro['sexo'];
        $cpf = $registro['cpf'];

        //ADICIONANDO MAIS LINHAS E COLUNAS COM OS ITENS DO BANCOS ATRIBUÍDOS AS VARIÁVEIS
        //CONCATENANDO
        echo "<tr>";
        echo "<td>" . $id . "</td>";
        echo "<td>" . $nome . "</td>";
        echo "<td>" . $sobrenome . "</td>";
        echo "<td>" . $email . "</td>";
        echo "<td>" . $telefone . "</td>";
        echo "<td>" . $cpf . "</td>";
        echo "<td>" . $sexo . "</td>";
        //LINKS QUE CHAMAM AS PÁGINAS DE EDITAR E DELETAR REGISTROS
        echo "<td><a href='deletarusuario.php?id=$id'><img src='exc.png' alt='Deletar' title='Deletar registro'></a></td>";
        echo "<td><a href='alterarusuarioform.php?id=$id'><img src='.png alt='Atualizar' title='Editar Registro'></a></td>";
        echo "</br>";
        echo "</tr>";
    }
        //BOTÃO PARA VOLTAR PARA O FORMULÁRIO DE CADASTRO / PÁGINA DE INÍCIO
        echo " <form>
        <button type ='submit' formaction='index.html'>Voltar ao cadastro</button>
            </form>";
    
