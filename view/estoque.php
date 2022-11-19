<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary">
<?php
    session_start();
    include_once('../model/usuario.php');

?>
    <header class="bg-dark text-white p-2 align-middle">
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
    </svg>
    <label>Danilo</label>
    </header>
    <div class="d-flex">
        <div class="w-25 bg-dark m-1 overflow-auto">
            <div class="bg-light m-3 p-1">
                <div class="border-bottom border-dark">
                    <label>Nome do Produto</label>
                </div>
                <form>
                    <label>Preço</label>
                    <input class="form-control" type="text"><br>
                    <Label>Quantidade</Label>
                    <input class="form-control" type="number"><br>
                    <Label>Validade</Label>
                    <input class="form-control" type="date"><br>
                    <button class="btn btn-outline-secondary" type="submit">Editar</button>
                    <button class="btn btn-outline-secondary" type="excluir">Excluir</button>
                </form>
            </div>
            <div class="bg-light m-3 p-1">
                <div class="border-bottom border-dark">
                    <label>Nome do Produto</label>
                </div>
                <form>
                    <label>Preço</label>
                    <input class="form-control" type="text"><br>
                    <Label>Quantidade</Label>
                    <input class="form-control" type="number"><br>
                    <Label>Validade</Label>
                    <input class="form-control" type="date"><br>
                    <button class="btn btn-outline-secondary" type="submit">Editar</button>
                    <button class="btn btn-outline-secondary" type="excluir">Excluir</button>
                </form>
            </div>
    </div>
    <div class="w-100">
        <div class="bg-dark m-1 p-2">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nome do produto">
                <button class="btn btn-outline-light" type="button">Pesquisar</button>
            </div>
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
                    <tr>
                        <td>1</td>
                        <td>Arroz</td>
                        <td>29,90</td>
                        <td>29</td>
                        <td>10/01/2025</td>
                        <td><input class="form-check-input" type="checkbox"></td>
                    </tr>
                </table>
            </div>
            <a href="estoqueADD.php" class="btn btn-outline-light">Adicionar Produto</a>
        </div>
    </div>
</body>
</html>