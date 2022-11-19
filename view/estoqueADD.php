<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary">
<?php
include_once("../model/produtos.php");

if(         isset($_POST['NomeProduto']) 
            && isset($_POST['Preço'])
            && isset($_POST['Quantidade'])
            && isset($_POST['Validade'])
){
    $produtoASerCadastrado = new Produto;
    $produtoASerCadastrado->setNomeDoProduto($_POST['NomeProduto']);
    $produtoASerCadastrado->setValidade($_POST['Validade']);
    $produtoASerCadastrado->setQuantidade($_POST['Quantidade']);
    $produtoASerCadastrado->setPreço($_POST['Preço']);
    $resultado = $produtoASerCadastrado->InserirItemNoEstoque();
    
}
 
?>
<-- FAVOR COLAR O HEADER AQUI XD -->        
<center>
<div class="bg-dark text-white p-5 pl-5 m-5 mx-m-auto" style="width: 490px; height: 450px;" >
    <form method="POST" action="estoqueADD.php" class="text-white form-group">
    <h2>Novo Item</h2>
    <?php
    if(isset($resultado)){
        if($resultado){
            echo '<div class="alert-success rounded">Produto Cadastrado com Sucesso</div>';
        }else{
            echo '<div class="alert-danger rounded">Não foi Possível cadastrar o Produto</div>';
        }
    }
    ?>      
                <label>Nome do Produto</label> <br>
                    <input name="NomeProduto" type="text" class="form-input" placeholder=""> <br> 
                <label>Preço</label> <br>
                    <input name="Preço" type="number" class="form-input" placeholder=""> <br>
                <label>Quantidade (Unidade)</label> <br>
                    <input name="Quantidade" type="number" min="0" class="form-input" placeholder=""> <br>
                <label>Validade</label> <br>
                    <input name="Validade" type="date" class="form-input" placeholder=""> <br>
                <br>
                <br>
                <input type="submit" value="Cadastrar">
        </fieldset>
    </form>
</div>


</center>
</body>
</html>