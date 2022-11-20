<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<script src="../controller/produtosControllers.js">
    
</script>
<body class="bg-secondary">
<?php
    include_once("../model/produtos.php");
    $BD = new Produto;
    if(isset($_POST['Editar'])){
        $BD->EditarProduto($_POST['Editar'],$_POST['Preco'],$_POST['Quantidade'],$_POST['Validade'],$_POST['Nome']);
    }else if(isset($_POST['Excluir'])){
        $BD->ExcluirProduto($_POST['Excluir']);
    }
    
    include_once("../controller/header.php");
?>
    <div class="d-flex">
        <div class="w-25 bg-dark m-1 overflow-auto">
            <?php
                $BD->GerarEditorProduto();
            ?>
    </div>
    <div class="w-100">
        <div class="bg-dark m-1 p-2">
            <form class="d-inline" action="estoque.php" method="POST">
                <div class="input-group mb-3">
                    <a href="estoqueADD.php" class="mx-1 btn btn-outline-light">Adicionar Produto</a>
                    <input type="text" class="form-control" name="nomePesquisar" placeholder="Nome do produto">
                    <button class="btn btn-outline-light" name="Pesquisar" type="submit">Pesquisar</button>
                </div>
            </form>
            <div class="m-1 bg-dark">
                <table class="table table-dark table-striped">
                    <tr>
                        <td>ID</td>
                        <td>Nome do Produto</td>
                        <td>Preço</td>
                        <td>Quantidade (unid)</td>
                        <td>Validade</td>
                        <td>Editar</td>
                    </tr>
                        <?php
                            $BD->MostrarProdutos();
                        ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>