<?php
//adicionando a conexão do banco de dados ao arquivo
include_once "conexao.php";


//variável que armazena oq o usuário digitou no campo de pesquisa
$nomepesquisa = $_POST['pesquisar'];

if (empty($nomepesquisa)) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Digite um nome para pesquisar um indice');window.location ='listarusuario.php'</script>";
}
//efetuando comandos SQL e verificando através da query
$sqlSelectButton = "SELECT idusuario, cpf, usuario_nome, usuario_sobrenome, usuario_email, telefone, sexo FROM usuario WHERE usuario_nome LIKE '$nomepesquisa'";
$result = mysqli_query($conexao, $sqlSelectButton) or die("Erro ao retornar dados");

//verificando se existe algum cadastro com o nome digitado
if (mysqli_num_rows($result) < 1) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Nenhum Indice Encontrado');window.location ='listarusuario.php'</script>";
}



//criando um formulário 
echo "<meta charset='UTF-8'>";
echo "<center><h1>Registros Encontrados<?h1></center>";
echo "<center><table <style border=1; border-collapse = collapse></style>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nome</th>";
echo "<th>Sobrenome</th>";
echo "<th>Email</th>";
echo "<th>Telefone</th>";
echo "<th>CPF</th>";
echo "<th>Sexo</th>";
echo "<th>Deletar</th>";
echo "<th>Editar</th>";
echo "</tr>";


//CONDIÇÃO QUE PERCORRE TODOS OS ITENS ARMAZENADOS NO BANCO E ARMAZENANDO NO ARRYA REGISTRO
while ($registro = mysqli_fetch_array($result)) {

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
    echo "<tr border = 1>";
    echo "<td>" . $id . "</td>";
    echo "<td>" . $nome . "</td>";
    echo "<td>" . $sobrenome . "</td>";
    echo "<td>" . $email . "</td>";
    echo "<td>" . $telefone . "</td>";
    echo "<td>" . $cpf . "</td>";
    echo "<td>" . $sexo . "</td>";
    //LINKS QUE CHAMAM AS PÁGINAS DE EDITAR E DELETAR REGISTROS
    echo "<td><a href='deletarusuario.php?id=$id'><img src='excluir.png' alt='Deletar' title='Deletar' style width='40px'></a></td>";
    echo "<td><a href='alterarusuarioform.php?id=$id'><img src='edita.png' alt='Atualizar' title='Editar' style width='40px'></a></td>";
    echo "</br>";
    echo "</tr>";
}

echo "</table>";
//BOTÃO PARA VOLTAR PARA O FORMULÁRIO DE CADASTRO / PÁGINA DE INÍCIO
echo " <form>
        <button type ='submit' formaction='listarusuario.php'>Voltar</button>
            </form>";
?>