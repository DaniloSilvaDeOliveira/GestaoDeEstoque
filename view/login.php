<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary">
<?php
    session_start();
    if(isset($_POST['usuario']) && isset($_POST['senha'])){
        session_start();
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        include_once("../model/usuario.php");
        $Usuario_Obj = new Usuário;
        $LoginError = $Usuario_Obj->Login($usuario,$senha);

    }
?>
    <center>
        <h1 class="text-white">BEAVERBOX</h1>
        <h2 class="text-white">SISTEMA DE GERENCIAMENTO DE ESTOQUE</h2>
    </center>
    <center>
        <div class="bg-dark p-5 mt-5 mx-m-auto" style="width: 290px;">
            <form method="POST" action="login.php" class="text-white form-group">
                <h3>LOGIN</h3>
                <?php
                    if(isset($LoginError)){
                        echo '<div class="alert-danger m-1 p-1 rounded">Login ou Senha Inválidos</div>';
                    }else{
                        echo "";
                    }
                ?>
                <div class="mb-1">
                    <label class="form-label">Usuário</label><br>
                    <input type="text" name="usuario">
                </div>
                <div class="mb-1">
                    <label class="form-label">Senha</label><br>
                    <input type="password" name="senha">
                </div>
                <input class="btn btn-primary" type="submit" value="Entrar">
                
            </form>
        </div>
    </center>
</body>
</html>