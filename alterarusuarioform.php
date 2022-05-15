<?php
//adicionando conexâo do banco de dados ao arquivo
require "conexao.php";

//adicionando o ID utilizando o método get, pegando da URL
$idusuario = $_GET['id'];

//comando SQL para realizar a pesquisa de dados cadastrados, de acordo com o valor da variável idusuario, contendo o valor que veio da URL
$sqlselect ="SELECT idusuario, cpf, usuario_nome, usuario_sobrenome, usuario_email, telefone, sexo FROM usuario WHERE idusuario = $idusuario";

//query para verificar a conexão e o comando SQL
$result = mysqli_query($conexao,$sqlselect);

//adicionado os dados obtidos através do comando sql, em um array 
$registro = mysqli_fetch_assoc($result);

//adicionando cada um dos items do array em uma variável
$id = $registro['idusuario'];
$nome = $registro['usuario_nome'];
$email = $registro['usuario_email'];
$sobrenome = $registro['usuario_sobrenome'];
$telefone = $registro['telefone'];
$sexo = $registro['sexo'];
$cpf = $registro['cpf'];




?>
<?php
//FORMULÁRIO QUE ATRIBUI AS INFORMAÇÕES OBTIDAS PELO USUARIO NA LISTAGEM AOS RESPECTIVOS CAMPOS
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="hfunttps://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet"> 
    <script>
        //funçao que cria uma máscara para o campo CPF adicionando pontos
        function mascaracpf(){
            var cpf = document.getElementById('cpf')
            if(cpf.value.length == 3 || cpf.value.length == 7)
            {
                cpf.value+= "."
            }
            else if(cpf.value.length == 11)
            {
            cpf.value+= "."
            }
        }
    </script>
    <style>
        input[type=text], select
         {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid rgb(0, 4, 254);
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=number], select
         {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid rgb(0, 4, 254);
            border-radius: 4px;
            box-sizing: border-box;
        }
    
        input[type=e-mail], select
         {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid rgb(0, 4, 254);
            border-radius: 4px;
            box-sizing: border-box;
        }
    
        button{
         width: 18%;
         background-color: #ff0909;
         color: white;
         padding: 14px 20px;
         margin: 8px 0;
         border: none;
         border-radius: 4px;
         cursor: pointer;
         font-size: 18px;
         font-family: 'Koulen', cursive;
    }
    
    fieldset
    {
      background-color:rgb(38, 78, 104);
        border:2px solid rgb(12, 112, 193);
        -moz-border-radius:8px;
        -webkit-border-radius:8px;	
        border-radius:8px;	
    }
    h1, legend
    {
      font-family: 'Bebas Neue', cursive;
      font-size: 30px;
      margin-bottom:0px;
      margin-left:16px;
      border:2px solid rgb(0, 0, 0);
      background-color: azure;
      width: 20%;
      justify-content: center;
    }
    
    label{
        font-size: 18px;
        font-family: 'Koulen', cursive;
        color: azure;
    }
    
            </style>
    <title>Alterar Dados</title>
</head>
<body>
    <div>
        <center><h1>Editar Contato</h1></center>
       
        <form method="post" action="alterarusuariocode.php" name="dados" onSubmit="return enviardados();">
            <fieldset>
             <legend>EDITAR</legend>
                <div>
                    <label for="nome" required style="font-size: 25px;">ID:</label>
                    <input type="text" readonly name= "id" id="id" value="<?php echo "$id"; ?>">

                    <label for="nome" required style="font-size: 25px;">Nome:</label>
                    <br>
                    <input type="text" name= "nome" id="nome" value="<?php echo "$nome" ?>">
                </div>
                <div>
                    <label for="sobrenome" required style="font-size: 25px;" >Sobrenome:</label>
                    <br>
                    <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $sobrenome ?>">
                </div>
                <div>
                    <label for="cpf" required style="font-size: 25px;">CPF:</label>
                    <br>
                    <input type="text" name="cpf" id="cpf" maxlength="14" onkeyup="mascaracpf()" value="<?php echo $cpf ?>">
                </div>
                <div>
                    <label for="email" required style="font-size: 25px;">Email:</label>
                    <br>
                    <input type="e-mail" name="email" id="email" value="<?php echo $email ?>">
                </div>
                <div>
                    <label for="telefone" required style="font-size: 25px;">Telefone:</label>
                    <br>
                    <input type="number" name="telefone" id="telefone" value="<?php echo $telefone ?>">
                </div>
                <div>
                    <label for="sexo" required style="font-size: 25px;">Sexo:</label>
                    <select name="sexo" id="sexo">
                        <option selected value="<?php echo $sexo ?>">Selecione</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
                <br>
                <div>
                    <span>
                    <button type="submit" formaction="alterarusuariocode.php">Confirmar Edição</button>
                    </span>
                    <span>
                        <button type ="reset">Limpar Campos</button>
                    </span>
                    <span>
                        <button type ="submit" formaction="alterarcancela.php">Cancelar</button>
                    </span>
                    
                </div>
            </fieldset>

           
        </form>
          
        
    </div>
    
</body>
</html>