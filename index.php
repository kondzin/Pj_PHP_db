<!-- Joao victor barletta, joao victor fagundi, lucas spanholo -->

<?php
    include_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <h1>Formulário de Cadastro</h1>
    <form action="index.php" method="post" name="cadastro">
        <div class="form">
            <div class="name">
                <span>Nome:</span>
                <input type="text" name="name" id="name">
            </div>
            <div class="email">
                <span>email:</span>
                <input type="text" name="email" id="email">
            </div>
            <div class="senha">
                <span>senha:</span>
                <input type="text" name="senha" id="senha">
            </div>
            <div class="cpf">
                <span>CPF:</span>
                <input type="text" name="cpf" id="cpf" oninput="maskCPF(this)">
            </div>
            <input type="submit" value="Enviar">
        </div>
    </form>
    
    <?php
        if(isset($_POST['cadastro'])) {
            $name = mysqli_real_escape_string($connection, $_POST['name']);
            $email = mysql_real_escape_string($coneection, $_POST['email']);
            $senha = mysql_real_escape_string($coneection, $_POST['senha']);
            $cpf = mysqli_real_escape_string($connection, $_POST['cpf']);
            
            
            


            $sql = "INSERT INTO user (name, cpf) VALUES ('$name', '$cpf')";

            if(mysqli_query($connection, $sql)) {
                echo 'Success!';
            } else {
                echo 'Error! Could not able to execute $sql' . mysqli_error($connection);
            }
        }

        mysqli_close($connection);
    ?>

    <script>
        function maskCPF(input){
            let cpf = input.value
            
            if(isNaN(cpf[cpf.length - 1])){ // impede entrar outro caractere que não seja número
            input.value = cpf.substring(0, cpf.length-1)
            return
            }
            
            input.setAttribute("maxlength", "14")
            if (cpf.length == 3 || cpf.length == 7) input.value += "."
            if (cpf.length == 11) input.value += "-"
        }
    </script>
</body>
</html>